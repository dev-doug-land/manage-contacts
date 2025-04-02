<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // Fetch all contacts from the database
        return view('contacts.index', compact('contacts')); // Pass contacts to the view
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        Contact::create($request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:contacts,email'
        ]));

        return redirect()->route('contacts.index')->with('success', 'Contact added successfully!');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully!');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
