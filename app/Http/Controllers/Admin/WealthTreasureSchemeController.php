<?php

namespace App\Http\Controllers\Admin;
use App\Models\WealthTreasureScheme;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WealthTreasureSchemeController extends Controller
{
    public function index()
    {
        $schemewealth = WealthTreasureScheme::first();
        return view('admin.schemes.WealthTreasure.index', compact('schemewealth'));
    }

    public function storeOrUpdateWealth(Request $request)
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

        $schemewealth = WealthTreasureScheme::firstOrNew([]);
        $schemewealth->title = $request->input('title');
        $schemewealth->short_description = $request->input('short_description');
        $schemewealth->image = $request->input('image');
        $schemewealth->description = $request->input('description');
        $schemewealth->save();
        return redirect()->route('admin.wealth-treasure-scheme.index')->with('success', 'Scheme has been saved successfully!');
    }
}
