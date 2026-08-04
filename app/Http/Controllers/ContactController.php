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
            'address' => 'nullable',
            'map_link' => 'nullable',
            'status' => 'required|in:active,inactive,pending',
        ]);

        Contact::create([
            'contact_number' => $request->contact_number,
            'whatsapp_number' => $request->whatsapp_number,
            'mail' => $request->mail,
            'address' => $request->address,
            'map_link' => $request->map_link,
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
            'contact_number' => 'nullable',
            'whatsapp_number' => 'nullable',
            'mail' => 'nullable',
            'address' => 'nullable',
            'map_link' => 'nullable',
            'status' => 'required|in:active,inactive,pending',
        ]);

        $contact = Contact::findOrFail($id);

        $contact->update([
            'contact_number' => $request->contact_number,
            'whatsapp_number' => $request->whatsapp_number,
            'mail' => $request->mail,
            'address' => $request->address,
            'map_link' => $request->map_link,
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

    /**
     * Edit contact settings
     */
    public function editSettings()
    {
        $settings = \App\Models\ContactPageSetting::query()->first();
        if (!$settings) {
            $settings = \App\Models\ContactPageSetting::create([
                'heading' => 'Get In Touch',
                'description' => 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.',
                'call_us_heading' => 'call us',
                'call_us_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis ex repudiandae iure, accusantium beatae minus?',
                'mail_us_heading' => 'Mail Us',
                'mail_us_description' => 'Lorem ipsum is placeholder text commonly used in the graphic,',
            ]);
        }
        return view('admin.contacts.settings', compact('settings'));
    }

    /**
     * Update contact settings
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phone_numbers' => 'nullable|array',
            'phone_numbers.*' => 'nullable|string|max:50',
            'emails' => 'nullable|array',
            'emails.*' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'map_link' => 'nullable|string|url',
            'call_us_heading' => 'nullable|string|max:255',
            'call_us_description' => 'nullable|string',
            'mail_us_heading' => 'nullable|string|max:255',
            'mail_us_description' => 'nullable|string',
        ]);

        $settings = \App\Models\ContactPageSetting::query()->first();
        if (!$settings) {
            $settings = new \App\Models\ContactPageSetting();
        }

        // Clean arrays by removing empty values
        $phone_numbers = array_values(array_filter($request->input('phone_numbers', []) ?? []));
        $emails = array_values(array_filter($request->input('emails', []) ?? []));

        $settings->fill([
            'heading' => $request->heading,
            'description' => $request->description,
            'phone_numbers' => $phone_numbers,
            'emails' => $emails,
            'address' => $request->address,
            'map_link' => $request->map_link,
            'call_us_heading' => $request->call_us_heading,
            'call_us_description' => $request->call_us_description,
            'mail_us_heading' => $request->mail_us_heading,
            'mail_us_description' => $request->mail_us_description,
        ])->save();

        return redirect()
            ->route('admin.contact-settings.edit')
            ->with('success', 'Contact settings updated successfully.');
    }
}
