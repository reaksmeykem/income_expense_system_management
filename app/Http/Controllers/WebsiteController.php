<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Income;
use App\Models\Exspense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function view_profile(){
        return view('profile.home');
    }

    public function edit_profile($id){
        $user_detail = User::where('id', $id)->first();
        return view('profile.edit-profile', compact('user_detail'));
    }

    public function update_profile($id, Request $request){
        $user = User::where('id', $id)->first();

        $request->validate([
            'name' => 'required'
        ]);

        if($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'image|mimes:jpg,png,gif,jpeg|max:2048'
            ]);

            $ext = $request->file('avatar')->extension();
            $final_name = date('YmdHist').'.'.$ext;
            $request->file('avatar')->move(public_path('uploads/avatars/'), $final_name);

            $user->avatar = $final_name;
        }

        $user->name = $request->name;
        if($user->email != $request->email){
            $user->email = $request->email;
        }
        

        $user->update();

        return redirect()->route('view_profile')->with('success', 'Updated Successfully.');
    }

    public function manage_report(){
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->get();
        
        $exspenses = Exspense::select('category_id', DB::raw('SUM(amount) AS total_exspense_by_category'))
            ->where('user_id', Auth::guard('web')->user()->id)
            ->groupBy('category_id')
            ->with(['rCategory'])
            ->orderBy('category_id')
            ->whereMonth('date', Carbon::now()->month)
            ->get();

        $incomes = Income::select('category_id', DB::raw('SUM(amount) AS total_income_by_category'))
            ->where('user_id', Auth::guard('web')->user()->id)
            ->groupBy('category_id')
            ->with(['rCategory'])
            ->orderBy('category_id')
            ->whereMonth('date', Carbon::now()->month)
            ->get();

        $total_income = Income::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->whereMonth('date', Carbon::now()->month)->sum('amount');
        $total_exspense = Exspense::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->whereMonth('date', Carbon::now()->month)->sum('amount');
        $total_balance = $total_income - $total_exspense;

        return view('report.manage-report', compact(
            'total_income',
            'total_exspense',
            'total_balance',
            'exspenses',
            'incomes'
        ));
    }

    public function filter_report(Request $request){
        $filter = Exspense::orderBy('id', 'desc');

        if($request->txt_search_by_month != ''){
            $filter = $filter->where('date', 'like', '%'.$request->txt_search_by_month. '%');
        }
        if($request->txt_search_by_year != ''){
            $filter = $filter->where('date', $request->txt_search_by_year);
        }


        foreach($filter as $item){
            dd($item->id);
        }

        return view('report.filter-report', compact('filter'));

    }
}
