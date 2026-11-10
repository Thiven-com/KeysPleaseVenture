<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RentalPropertyReport;

class RentalPropertyReportController extends Controller
{
    /**
     * Display all property reports.
     */
    public function index()
    {
        $reports = RentalPropertyReport::with([
            'propertyDetails.user'
        ])
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'admin.rentalpropertyreports.all',
            compact('reports')
        );
    }

    /**
     * Delete a property report.
     */
    public function destroy($id)
    {
        $report = RentalPropertyReport::findOrFail($id);

        $report->delete();

        return redirect()
            ->back()
            ->with('success', 'Property report deleted successfully.');
    }
}