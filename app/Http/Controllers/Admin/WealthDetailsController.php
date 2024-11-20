<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WealthTransaction;
use App\Models\WealthTreasureRegistration;

class WealthDetailsController extends Controller
{

    public function wealthindex(Request $request)
    {
        $search = $request->input('search');

        $wealthdetails = WealthTreasureRegistration::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhere('id', $search);
        })->paginate(5);

        return view('admin.wealthtreasure.index' ,compact('wealthdetails'));
    }

    public function wealthdestroy(Request $request)
    {
        $wealthdetail = WealthTreasureRegistration::where('id',$request->id)->first();
        $wealthdetail->delete();
        return redirect()->route('admin_wealth_index')->with('success', 'User deleted successfully.');
    }

    public function wealthview($id) {
        $wealthdetail = WealthTreasureRegistration::findOrFail($id);

        return view('admin.wealthtreasure.view', compact('wealthdetail'));
    }
    public function show($id)
    {
        $search = request()->query('search');
        $transactions = WealthTransaction::where('user_id', $id)
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('id', 'like', "%{$search}%")
                    ->orWhere('date', 'like', "%{$search}%")
                    ->orWhere('amount', 'like', "%{$search}%");
                });
            })
            ->paginate(4);

        return view('admin.wealthtreasure.transaction', compact('transactions'));
    }
}
