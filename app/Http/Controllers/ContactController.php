<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        // dd($contact);
        return view('admin.Contact.index', compact('contact'));
    }

    public function storeOrUpdate(Request $request)
    {
        // Validate the request data
        $request->validate([
            'content' => 'required|string',
            'map' => 'required|string',
            'headquarters' => 'required|string',
            'contact_number' => 'required|string',
            'email' => 'required|email',
            'monday_friday_open' => 'required',
            'monday_friday_close' => 'required',
            'weekend_open' => 'nullable',
            'weekend_close' => 'nullable',
        ]);

        // Check if contact data exists
        $contact = Contact::first();

        if ($contact) {
            // If contact data exists, update it
            $contact->update([
                'content' => $request->input('content'),
                'map' => $request->input('map'),
                'headquarters' => $request->input('headquarters'),
                'contact_number' => $request->input('contact_number'),
                'email' => $request->input('email'),
                'monday_friday_open' => $request->input('monday_friday_open'),
                'monday_friday_close' => $request->input('monday_friday_close'),
                'weekend_open' => $request->input('weekend_open'),
                'weekend_close' => $request->input('weekend_close'),
            ]);
        } else {
            // If contact data doesn't exist, create a new record
            Contact::create([
                'content' => $request->input('content'),
                'map' => $request->input('map'),
                'headquarters' => $request->input('headquarters'),
                'contact_number' => $request->input('contact_number'),
                'email' => $request->input('email'),
                'monday_friday_open' => $request->input('monday_friday_open'),
                'monday_friday_close' => $request->input('monday_friday_close'),
                'weekend_open' => $request->input('weekend_open'),
                'weekend_close' => $request->input('weekend_close'),
            ]);
        }

        return back()->with('success', 'Contact details have been saved.');
    }



}
