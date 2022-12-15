<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exspense;
use Illuminate\Support\Carbon;
use App\Models\Category;
use KhmerDateTime\KhmerDateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ExspenseController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->latest()->get();
        return view('exspense.create-exspense', compact('categories'));
    }

    public function manage(){
        $exspenses = Exspense::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->latest()->get();
        if($exspenses){
            foreach($exspenses as $item){
                $item->date =  KhmerDateTime::parse($item->date)->format('LLLL');
            }
        }

        $total_exspenses = Exspense::where('user_id', Auth::guard('web')->user()->id)->whereMonth('date', Carbon::now()->month)->sum('amount');

        return view('exspense.manage-exspense', compact('exspenses','total_exspenses'));
    }

    public function store(Request $request){
        $exspense = new Exspense();
        
        $request->validate([
            'exspense_category' => 'required',
            'exspense_description' => 'required',
            'exspense_amount' => 'required',
            'exspense_date' => 'required'
        ]);

        $exspense->description = $request->exspense_description;
        $exspense->amount = $request->exspense_amount;
        $exspense->date = $request->exspense_date;
        $exspense->category_id = $request->exspense_category;
        $exspense->status = 1;
        $exspense->user_id = Auth::guard('web')->user()->id;

        $exspense->save();
        return redirect()->route('manage_exspense')->with('success','Added successfully.');
    }

    public function edit($id){
        $exspense_detail = Exspense::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        $categories = Category::where('user_id', Auth::guard('web')->user()->id)->latest()->get();
        return view('exspense.edit-exspense', compact('exspense_detail','categories'));
    }

    public function update($id, Request $request){
        $exspense = Exspense::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();

        $request->validate([
            'exspense_description' => 'required',
            'exspense_amount' => 'required',
            'exspense_date' => 'required',
            'exspense_category' => 'required'
        ]);

        $exspense->description = $request->exspense_description;
        $exspense->amount = $request->exspense_amount;
        $exspense->date = $request->exspense_date;
        $exspense->category_id = $request->exspense_category;
        $exspense->status = $exspense->status;
        $exspense->user_id = $exspense->user_id;

        $exspense->update();
        return redirect()->route('manage_exspense')->with('success','Updated successfully.');
    }

    public function delete($id){
        $exspense = Exspense::where('user_id', Auth::guard('web')->user()->id)->where('id', $id)->first();
        $exspense->forceDelete();
        return redirect()->route('manage_exspense')->with('success', 'Deleted successfully.');
    }
}
