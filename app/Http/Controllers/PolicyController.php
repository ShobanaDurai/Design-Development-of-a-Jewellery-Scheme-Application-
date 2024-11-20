<?php

namespace App\Http\Controllers;
use App\Models\Terms;
use App\Models\Privacy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function showTerms()
    {
        // Retrieve the terms data from the database
        $terms = Terms::latest()->first(); // Assuming you want the most recent entry

        return view('terms', compact('terms'));

    }
    public function showPrivacy()
    {
        // Retrieve the terms data from the database
        $privacy = Privacy::latest()->first(); // Assuming you want the most recent entry

        return view('privacy', compact('privacy'));

    }
}
