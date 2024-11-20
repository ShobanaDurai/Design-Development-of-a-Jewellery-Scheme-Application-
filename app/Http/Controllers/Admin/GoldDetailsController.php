<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GoldSavingsRegistration;
use App\Models\GoldTransaction;
use Illuminate\Support\Facades\Auth;

class GoldDetailsController extends Controller
{

    public function goldindex(Request $request)
    {
        $search = $request->input('search');

        $golddetails = GoldSavingsRegistration::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('id', $search);
        })->paginate(5);

        return view('admin.goldsavings.index' ,compact('golddetails'));
    }

    public function golddestroy(Request $request)
    {
        $golddetail = GoldSavingsRegistration::where('id',$request->id)->first();
        $golddetail->delete();
        return redirect()->route('admin_gold_index')->with('success', 'User deleted successfully.');
    }

    public function goldview($id) {
        $golddetail = GoldSavingsRegistration::findOrFail($id); // Fetch the data based on the ID

        return view('admin.goldsavings.view', compact('golddetail')); // Pass the data to the view
    }


    public function show($id)
    {
        $search = request()->query('search');
        $transactions = GoldTransaction::where('user_id', $id)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%")
                    ->orWhere('date', 'like', "%{$search}%")
                    ->orWhere('amount', 'like', "%{$search}%");
                });
            })
            ->paginate(4);

            $graphData = GoldTransaction::select('date', 'amount')
                                    ->where('user_id', $id)
                                    ->get();



        return view('admin.goldsavings.transaction', compact('transactions','graphData'));
    }



}
