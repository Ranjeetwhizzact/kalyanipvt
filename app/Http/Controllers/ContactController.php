<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display all contacts
     */
    public function index()
    {
        $contacts = Contact::latest('created_at')->paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Create page
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store contact
     */
    public function store(Request $request)
    {
        $request->validate([
            'contact_number' => 'nullable',
            'whatsapp_number' => 'nullable',
            'mail' => 'nullable',
            'status' => 'required|in:active,inactive,pending',
        ]);

        Contact::create([
            'contact_number' => $request->contact_number,
            'whatsapp_number' => $request->whatsapp_number,
            'mail' => $request->mail,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Edit page
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update contact
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_number' => 'required',
            'whatsapp_number' => 'nullable',
            'mail' => 'required|email',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $contact = Contact::findOrFail($id);

        $contact->update([
            'contact_number' => $request->contact_number,
            'whatsapp_number' => $request->whatsapp_number,
            'mail' => $request->mail,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact updated successfully.');
    }

    /**
     * Delete contact
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Contact deleted successfully.');
    }
}
