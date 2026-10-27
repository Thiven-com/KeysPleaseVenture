<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = Customer::query();

        // Search customers by name, email, or mobile
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%");
            });
        }

        // Display 15 customers per page
        $customers = $query->latest()->paginate(15)->withQueryString();

        return view('admin.customers.index', compact('customers'));
    }


    public function show($id)
    {
        $customer = \App\Models\Customer::findOrFail($id);

        $enquiries = \App\Models\RentalRequirmentsEnquiry::where(
            'customer_id',
            $customer->id
        )->latest()->get();

        $siteVisits = \App\Models\ScheduleVisitEnquiry::where(
            'customer_id',
            $customer->id
        )
            ->orderByDesc('visit_date')
            ->orderByDesc('visit_time')
            ->get();

        return view('admin.customers.show', compact(
            'customer',
            'enquiries',
            'siteVisits'
        ));
    }

}