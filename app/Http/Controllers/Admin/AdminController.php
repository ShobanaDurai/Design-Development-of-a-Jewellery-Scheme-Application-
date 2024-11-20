<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Terms;
use App\Models\Privacy;
use App\Models\Feedback;
use Carbon\Carbon;
use App\Models\User;
use App\Models\GoldSavingsRegistration;
use App\Models\WealthTreasureRegistration;
use App\Models\GoldTransaction;
use App\Models\WealthTransaction;




class AdminController extends Controller
{

    public function showDashboard()
    {
        // Fetch monthly data for gold income
        $goldIncome = GoldTransaction::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(amount) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Fetch monthly data for wealth income
        $wealthIncome = WealthTransaction::selectRaw('MONTH(created_at) as month, YEAR(created_at) as year, SUM(amount) as total')
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Prepare labels (months) and data
        $monthlyLabels = array_map(function($month) {
            return date('F', mktime(0, 0, 0, $month, 1)); // Convert month number to month name
        }, range(1, 12)); // Adjust if you need to include all months or specific months

        // Fill data arrays with zeros for missing months
        $goldIncomeData = array_replace(array_fill(1, 12, 0), $goldIncome);
        $wealthIncomeData = array_replace(array_fill(1, 12, 0), $wealthIncome);

        // Fetch total users and users registered for gold and wealth schemes
        $totalUsers = User::count();
        $goldUsers = GoldSavingsRegistration::count();
        $wealthUsers = WealthTreasureRegistration::count();

        // Return view with all necessary data
        return view('admin.dashboard', compact('monthlyLabels', 'goldIncomeData', 'wealthIncomeData', 'totalUsers', 'goldUsers', 'wealthUsers'));
    }


    public function schemeWealth()
    {
        return view('admin.schemes.wealthtreasure.index' );
    }

    public function terms()
    {
        $description = Terms::first();
        return view('admin.policy.terms_condition', compact('description'));
    }

    public function privacy()
    {
        $description = Privacy::first();
        return view('admin.policy.privacy',compact('description'));
    }

    public function feedback(Request $request)
    {
        $search = $request->input('search');

        $feedbackQuery = Feedback::latest();

        // If there is a search query, filter the feedback
        if ($search) {
            $feedbackQuery->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('occupation', 'like', "%{$search}%")
                    ->orWhere('rating', 'like', "%{$search}%");
            });
        }

        // Paginate the results
        $feedback = $feedbackQuery->paginate(5);

        return view('admin.Feedback.index', compact('feedback', 'search'));
    }


public function storeOrUpdateDescription(Request $request)
{
    $request->validate([
        'description' => 'required|string',
    ]);
    $description = Terms::firstOrCreate([]);
    $description->description = $request->input('description');
    $description->save();
    return redirect()->route('admin_terms')->with('success', 'Description has been updated successfully.');
}



public function storeOrUpdateDescriptionPrivacy(Request $request)
{
    $request->validate([
        'description' => 'required',
    ]);
    $description = Privacy::firstOrNew([]);
    $description->description = $request->input('description');
    $description->save();
    return redirect()->route('admin_privacy')->with('success', 'Description has been updated successfully.');
}


public function getRegistrationData()
{
    $userCounts = User::select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
    ->groupBy('month')
    ->orderBy('month')
    ->pluck('count', 'month')
    ->toArray();
$userCounts = array_replace(array_fill(1, 12, 0), $userCounts);

    return view('admin.dashboard', compact('userCounts'));
}


public function getChartData()
{
    // Get the total number of users per month or any other criteria
    $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $allUsersData = [];
    $goldUsersData = [];
    $otherUsersData = [];

    foreach ($months as $month) {
        // Fetch counts for the given month; modify as needed for your criteria
        $startDate = now()->startOfMonth()->subMonthNoOverflow()->format('Y-m-d');
        $endDate = now()->endOfMonth()->subMonthNoOverflow()->format('Y-m-d');

        $allUsersData[] = \App\Models\User::whereBetween('created_at', [$startDate, $endDate])->count();
        $goldUsersData[] = \App\Models\GoldSavingsRegistration::where('is_gold_user', true)->whereBetween('created_at', [$startDate, $endDate])->count();
        $otherUsersData[] = \App\Models\WealthTreasureRegistration::where('is_gold_user', false)->whereBetween('created_at', [$startDate, $endDate])->count();
    }

    $data = [
        'all_users' => $allUsersData,
        'gold_users' => $goldUsersData,
        'other_users' => $otherUsersData,
    ];

    return response()->json($data);
}


public function showIncomeExpenseSummary() {
    $goldIncome = GoldTransaction::sum('amount');
    $wealthIncome = WealthTransaction::sum('amount');

    return view('admin.dashboard', compact('goldIncome', 'wealthIncome'));
}


// public function session()
// {
//     $totalUsers = User::count();
//     $goldUsers = GoldSavingsRegistration::count();
//     $wealthUsers = WealthTransaction::count();

//     return view('admin.dashboard', compact('totalUsers', 'goldUsers', 'wealthUsers'));
// }




}
