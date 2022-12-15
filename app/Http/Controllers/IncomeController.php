<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Illuminate\Support\Carbon;
use App\Models\Category;
use KhmerDateTime\KhmerDateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function manage(){
        // retrieve all incomes
        $incomes = Income::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->latest()->get();
        // convert date to khmer date
        if(count($incomes) > 0){
            foreach($incomes as $item){
                $item->date =  KhmerDateTime::parse($item->date)->format('LLLL');
            }
        }
        // total income
        $total_incomes = Income::where('user_id', Auth::guard('web')->user()->id)->whereMonth('date', Carbon::now()->month)->sum('amount');
        
        return view('income.manage-income', compact('incomes','total_incomes'));
    }

    public function index(){
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->latest()->get();
        return view('income.create-income', compact('categories'));
    }

    public function store(Request $request){
        $income = New Income();
        
        $request->validate([
            'income_category' => 'required',
            'income_description' => 'required',
            'income_amount' => 'required',
            'income_date' => 'required'
        ]);

        $income->description = $request->income_description;
        $income->amount = $request->income_amount;
        $income->date = $request->income_date;
        $income->category_id = $request->income_category;
        $income->status = 1;
        $income->user_id = Auth::guard('web')->user()->id;
        $income->save();

        return redirect()->route('manage_income')->with('success','Added Successfully.');
    }

    public function edit($id, Request $request){
        $income_detail = Income::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->latest()->get();
        return view('income.edit-income', compact('income_detail','categories'));
    }

    public function update($id, Request $request){
        $income = Income::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        
        $request->validate([
            'income_description' => 'required',
            'income_amount' => 'required',
            'income_date' => 'required'
        ]);

        $income->description = $request->income_description;
        $income->amount = $request->income_amount;
        $income->date = $request->income_date;
        $income->category_id = $request->income_category;
        $income->status = $income->status;
        $income->user_id = $income->user_id;
        $income->update();

        return redirect()->route('manage_income')->with('success','Updated Successfully.');
    }

    public function delete($id){
        $income = Income::where('id', $id)->delete();
        return redirect()->route('manage_income')->with('success', 'Deleted Successfully.');
    }
}
