<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search'); // Capture the search input

        $faq = Faq::latest()
            ->when($search, function ($query, $search) {
                return $query->where('question', 'like', "%{$search}%")
                             ->orWhere('answer', 'like', "%{$search}%");
            })
            ->paginate(3); // Adjust the number (10) as needed for the number of FAQs per page

        return view('admin.faq.index', compact('faq', 'search'));
    }


    public function create()
    {
        return view('admin.faq.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);
        $faq = new Faq();
        $faq->question    = $request->question;
        $faq->answer      = $request->answer;
        $faq->status = 1;
        $faq->save();
        Session::flash('success','FAQ Created Successfully');
        return redirect()->route('faq.index');
    }

    public function edit(string $id)
    {
        $faq = Faq::findOrFail(decrypt($id));
        return view('admin.faq.edit',compact('faq'));


    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);
        $faq = Faq::findOrFail(decrypt($id));
        $faq->question    = $request->question;
        $faq->answer      = $request->answer;

        $faq->save();
        Session::flash('success','FAQ Updated Successfully');
        return redirect()->route('faq.index');
    }


    public function destroy(Request $request)
        {
            $faq = Faq::where('id',$request->id)->first();
            $faq->delete();
            return redirect()->route('faq.index')->with('success', 'User deleted successfully.');
        }

}
