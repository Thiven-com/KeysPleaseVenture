<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentalRequirmentsEnquiry;

class RentalRequirmentsEnquiryController extends Controller
{
    /**
     * Display all rental requirements enquiries.
     */
    public function index()
    {
        $enquiries = RentalRequirmentsEnquiry::latest()->get();

        return view(
            'admin.rentalrequirments.all',
            compact('enquiries')
        );
    }


    /**
     * Delete rental requirements enquiry.
     */
    public function destroy($id)
    {
        $enquiry = RentalRequirmentsEnquiry::findOrFail($id);

        $enquiry->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Rental enquiry deleted successfully.'
            );
    }
}