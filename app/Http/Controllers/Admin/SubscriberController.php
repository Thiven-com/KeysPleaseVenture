<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function index()
{
    $subscribers = Subscriber::latest()
        ->paginate(10)
        ->withQueryString();

    return view('admin.subscribers.all', compact('subscribers'));
}

    public function destroy($id)
    {
        $subscriber = Subscriber::findOrFail($id);

        $subscriber->delete();

        return redirect()
            ->back()
            ->with('success', 'Subscriber deleted successfully.');
    }
}