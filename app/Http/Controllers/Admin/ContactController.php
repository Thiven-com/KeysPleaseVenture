<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display all contact enquiries.
     */
    public function index()
    {
        $enquiries = Contact::latest()->get();

        return view('admin.contacts.all', compact('enquiries'));
    }

    /**
     * Delete contact enquiry.
     */
    public function destroy($id)
    {
        $enquiry = Contact::findOrFail($id);

        $enquiry->delete();

        return redirect()
            ->back()
            ->with('success', 'Contact enquiry deleted successfully.');
    }
}