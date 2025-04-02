<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all(); // Fetch all contacts from the database
        return view('contacts', compact('contacts')); // Pass contacts to the view
    }
}
