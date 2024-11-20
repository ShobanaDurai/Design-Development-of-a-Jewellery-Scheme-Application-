<?php

namespace App\Http\Controllers;
use App\Models\GoldSavingsScheme;
use App\Models\WealthTreasureScheme;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\Contact;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class SchemeController extends Controller
{
    public function showGoldSavings() {
        $schemegold = GoldSavingsScheme::latest()->first();
        return view('scheme1',compact('schemegold'));
    }

    public function showWealthTreasure() {
        $schemewealth = WealthTreasureScheme::latest()->first();
        return view('scheme2',compact('schemewealth'));
    }
    public function about()
    {
        $aboutUs = AboutUs::first();
        return view('about',compact('aboutUs'));
    }

    public function show(){
        return view('gold-savings-scheme');
    }
    public function create(){
        return view('gold-reg');
    }
    public function index()
    {
        $schemegold = GoldSavingsScheme::latest()->first();
        $schemewealth = WealthTreasureScheme::latest()->first();
        return view('schemes', compact('schemegold','schemewealth'));
    }

    public function faq()
    {
        $faqs = Faq::latest()->get();
        return view('faq',compact('faqs'));
    }
    public function contact()
    {
        $contact = Contact::first();
        return view('contact-us',compact('contact'));
    }

    public function feedback()
    {
        $feedback = Feedback::latest()->get();
        return view('home', compact('feedback'));
    }
}

