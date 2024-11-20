<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // public function index()
    // {
    //     $feedback = Feedback::latest()->first();
    //     return view('home', compact('feedback'));
    // }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'thoughts' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Feedback::create([
            'name' => $request->input('name'),
            'occupation' => $request->input('occupation'),
            'thoughts' => $request->input('thoughts'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}

