<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleVisitEnquiry;

class ScheduleVisitEnquiryController extends Controller
{
    /**
     * Display all schedule visit enquiries.
     */
    public function index()
    {
        $enquiries = ScheduleVisitEnquiry::latest()->get();

        return view(
            'admin.schedulevisitenquiries.all',
            compact('enquiries')
        );
    }

    /**
     * Delete schedule visit enquiry.
     */
    public function destroy($id)
    {
        $enquiry = ScheduleVisitEnquiry::findOrFail($id);

        $enquiry->delete();

        return redirect()
            ->back()
            ->with(
                'success',
                'Schedule visit enquiry deleted successfully.'
            );
    }
}