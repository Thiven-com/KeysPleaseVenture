<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentEnquiry;

class RentEnquiryController extends Controller
{
    public function index()
    {
        $enquiries = RentEnquiry::latest()->get();

        return view('admin.rentenquiry.all', compact('enquiries'));
    }

    public function destroy($id)
    {
        $enquiry = RentEnquiry::findOrFail($id);

        $enquiry->delete();

        return redirect()
            ->route('admin.rent-enquiries.index')
            ->with('success', 'Enquiry deleted successfully.');
    }
}