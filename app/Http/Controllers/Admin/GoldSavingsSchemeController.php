<?php

namespace App\Http\Controllers\Admin;
use App\Models\GoldSavingsScheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoldSavingsSchemeController extends Controller
{
    public function index()
    {
        $schemegold = GoldSavingsScheme::first();
        return view('admin.schemes.GoldSavings.index', compact('schemegold'));
    }

    public function storeOrUpdateGold(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

        $schemegold = GoldSavingsScheme::firstOrNew([]);
        $schemegold->title = $request->input('title');
        $schemegold->short_description = $request->input('short_description');
        $schemegold->image = $request->input('image');
        $schemegold->description = $request->input('description');
        $schemegold->save();
        return redirect()->route('admin.gold-savings-scheme.index')->with('success', 'Scheme has been saved successfully!');
    }

   

}


