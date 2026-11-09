<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SiteSettingController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = SiteSetting::find($id);
        return view('admin.site_settings.all', compact('data'));
    }
    public function site()
    {
        $site = SiteSetting::firstOrCreate([]);

        return view('admin.settings.site.company', compact('site'));
    }



public function company_setting_update(Request $request)
{
    // Validate company contact fields
    $request->validate([
        'company' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:255',
        'customer_care_no' => 'nullable|string|max:255',
        'address' => 'nullable|string',
        'gst' => 'nullable|string|max:255',
    ]);

    // Get existing settings or create a new model
    $site = SiteSetting::firstOrNew([]);

    // Update normal input fields
    $site->fill($request->except([
        '_token',
        '_method',
        'logo',
        'site_logo',
        'favicon',
        'admin_logo',
        'image'
    ]));

    // Upload logo
    if ($request->hasFile('logo')) {
        $site->logo = $request->file('logo')->store('site', 'public');
    }

    // Upload site logo
    if ($request->hasFile('site_logo')) {
        $site->site_logo = $request->file('site_logo')->store('site', 'public');
    }

    // Upload favicon
    if ($request->hasFile('favicon')) {
        $site->favicon = $request->file('favicon')->store('site', 'public');
    }

    // Upload admin logo
    if ($request->hasFile('admin_logo')) {
        $site->admin_logo = $request->file('admin_logo')->store('site', 'public');
    }

    // Upload image
    if ($request->hasFile('image')) {
        $site->image = $request->file('image')->store('site', 'public');
    }

    // Save settings
    $site->save();

    Alert::success('Updated', 'Site settings updated successfully');

    return redirect()->back();
}



    public function destroy($id)
    {
        //
    }

}
