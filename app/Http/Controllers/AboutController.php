<?php

namespace App\Http\Controllers;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('admin.About.index', compact('aboutUs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'offices' => 'required|integer',
            'employees' => 'required|integer',
            'customers' => 'required|integer',
        ]);

        // Check if a record exists
        $aboutUs = AboutUs::first();

        if ($aboutUs) {
            // Update the existing record
            $aboutUs->update([
                'content' => $request->content,
                'offices' => $request->offices,
                'employees' => $request->employees,
                'customers' => $request->customers,
            ]);
        } else {
            // Create a new record
            AboutUs::create([
                'content' => $request->content,
                'offices' => $request->offices,
                'employees' => $request->employees,
                'customers' => $request->customers,
            ]);
        }

        return redirect()->back()->with('success', 'About Us updated successfully!');
    }
}
