<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $teams = team::when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                             ->orWhere('designation', 'LIKE', "%{$search}%")
                             ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString();

        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        
        $profilephoto = null;
        if ($request->hasFile('profilephoto')) {
            $profilephoto = time() . '_team_' . $request->profilephoto->getClientOriginalName();
            $request->profilephoto->move(public_path('uploads/team'), $profilephoto);
        }

        team::create(array_merge($request->all(), ['profilephoto' => $profilephoto]));
        return redirect()->route('admin.team.index')->with('success', 'Team member added.');
    }

    public function edit(team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, team $team)
    {
        $data = $request->all();
        if ($request->hasFile('profilephoto')) {
            if ($team->profilephoto && file_exists(public_path('uploads/team/' . $team->profilephoto))) {
                unlink(public_path('uploads/team/' . $team->profilephoto));
            }
            $name = time() . '_team_' . $request->profilephoto->getClientOriginalName();
            $request->profilephoto->move(public_path('uploads/team'), $name);
            $data['profilephoto'] = $name;
        }
        $team->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Team member updated.');
    }

    public function destroy(team $team)
    {
        if ($team->profilephoto && file_exists(public_path('uploads/team/' . $team->profilephoto))) {
            unlink(public_path('uploads/team/' . $team->profilephoto));
        }
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
