<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticker;
use Illuminate\Http\Request;

class TickerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tickers = Ticker::when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%");
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.tickers.index', compact('tickers'));
    }

    public function create()
    {
        return view('admin.tickers.create');
    }

    public function store(Request $request)
    {
        $request->validate(['title' => 'required']);
        Ticker::create($request->all());
        return redirect()->route('admin.tickers.index')->with('success', 'Ticker added.');
    }

    public function edit(Ticker $ticker)
    {
        return view('admin.tickers.edit', compact('ticker'));
    }

    public function update(Request $request, Ticker $ticker)
    {
        $ticker->update($request->all());
        return redirect()->route('admin.tickers.index')->with('success', 'Ticker updated.');
    }

    public function destroy(Ticker $ticker)
    {
        $ticker->delete();
        return redirect()->route('admin.tickers.index')->with('success', 'Ticker deleted.');
    }
}
