<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserDetailsController extends Controller
{
    public function customerindex(Request $request)
    {
        $search = $request->input('search');

        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('id', $search);
        })->paginate(5);

        return view('admin.customer.index', compact('users'));
    }

    public function customerdestroy(Request $request)
    {
        $user = User::where('id',$request->id)->first();
        $user->delete();
        return redirect()->route('admin_customer_index')->with('success', 'User deleted successfully.');
    }
}
