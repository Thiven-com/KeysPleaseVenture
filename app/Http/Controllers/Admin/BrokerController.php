<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Broker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BrokerController extends Controller
{
    public function index(Request $request)
    {
        $query = Broker::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('mobile', 'like', "%{$search}%")
                    ->orWhere('agency_name', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $brokers = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.brokers.all', compact('brokers'));
    }

    public function show($id)
    {
        $broker = Broker::findOrFail($id);

        return view('admin.brokers.show', compact('broker'));
    }

    /**
     * Approve broker
     */
    public function approve($id)
    {
        $broker = Broker::findOrFail($id);

        $broker->status = 'approved';
        $broker->rejection_reason = null;
        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker approved successfully.');
    }


    /**
     * Reject broker
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:1000',
        ]);

        $broker = Broker::findOrFail($id);

        $broker->status = 'rejected';
        $broker->rejection_reason = $request->rejection_reason;
        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker rejected successfully.');
    }

    public function edit($id)
    {
        $broker = Broker::findOrFail($id);

        return view('admin.brokers.edit', compact('broker'));
    }


    public function update(Request $request, $id)
    {
        $broker = Broker::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                'unique:brokers,email,' . $broker->id,
            ],

            'mobile' => 'required|string|max:20',

            'broker_type' => 'required|string|max:100',

            'agency_name' => 'nullable|string|max:255',

            'license_number' => 'nullable|string|max:255',

            'address' => 'required|string',

            'city' => 'required|string|max:100',

            'state' => 'required|string|max:100',

            'pincode' => 'required|string|max:10',

            'status' => 'required|in:pending,approved,rejected,inactive',

            'rejection_reason' => 'nullable|string|max:1000',
        ]);

        $broker->name = $request->name;
        $broker->email = $request->email;
        $broker->mobile = $request->mobile;
        $broker->broker_type = $request->broker_type;
        $broker->agency_name = $request->agency_name;
        $broker->license_number = $request->license_number;
        $broker->address = $request->address;
        $broker->city = $request->city;
        $broker->state = $request->state;
        $broker->pincode = $request->pincode;
        $broker->status = $request->status;
        $broker->rejection_reason = $request->rejection_reason;

        // If broker is not rejected, clear rejection reason
        if ($broker->status !== 'rejected') {
            $broker->rejection_reason = null;
        }

        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker updated successfully.');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        $broker = Broker::findOrFail($id);

        $broker->password = Hash::make($request->password);
        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker password changed successfully.');
    }



    // Activate Broker
    public function activate($id)
    {
        $broker = Broker::findOrFail($id);

        $broker->status = 'approved';
        $broker->rejection_reason = null;
        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker activated successfully.');
    }


    // Deactivate Broker
    public function deactivate($id)
    {
        $broker = Broker::findOrFail($id);

        $broker->status = 'inactive';
        $broker->save();

        return redirect()
            ->route('admin.brokers.show', $broker->id)
            ->with('success', 'Broker deactivated successfully.');
    }

    // Delete Broker
    public function destroy($id)
    {
        $broker = Broker::findOrFail($id);

        $broker->delete();

        return redirect()
            ->route('admin.brokers.index')
            ->with('success', 'Broker deleted successfully.');
    }

    public function create()
    {
        return view('admin.brokers.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',

        'email' => 'required|email|unique:brokers,email',

        'mobile' => 'required|string|max:20',

        'broker_type' => 'required|string|max:100',

        'agency_name' => 'nullable|string|max:255',

        'license_number' => 'nullable|string|max:255',

        'address' => 'required|string',

        'city' => 'required|string|max:100',

        'state' => 'required|string|max:100',

        'pincode' => 'required|string|max:10',

        'password' => 'required|string|min:6|confirmed',

        'status' => 'required|in:pending,approved,inactive',
    ]);

    Broker::create([
        'name' => $request->name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'broker_type' => $request->broker_type,
        'agency_name' => $request->agency_name,
        'license_number' => $request->license_number,
        'address' => $request->address,
        'city' => $request->city,
        'state' => $request->state,
        'pincode' => $request->pincode,

        'password' => Hash::make($request->password),

        'status' => $request->status,

        'rejection_reason' => null,
    ]);

    return redirect()
        ->route('admin.brokers.index')
        ->with('success', 'Broker account created successfully.');
}
}