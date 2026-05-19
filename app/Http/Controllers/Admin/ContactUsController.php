<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $source = $request->input('source');

        $contacts = ContactUs::when($search, function ($query, $search) {
                return $query->where('Firstname', 'LIKE', "%{$search}%")
                             ->orWhere('Lastname', 'LIKE', "%{$search}%")
                             ->orWhere('EmailAddress', 'LIKE', "%{$search}%")
                             ->orWhere('Phoneno', 'LIKE', "%{$search}%")
                             ->orWhere('Message', 'LIKE', "%{$search}%");
            })
            ->when($source, function ($query, $source) {
                if ($source === 'Careers') {
                    return $query->where('source', 'LIKE', 'Careers%');
                }
                return $query->where('source', $source);
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(ContactUs $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function destroy($id)
    {
        ContactUs::where('contactid', $id)->delete();
        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
