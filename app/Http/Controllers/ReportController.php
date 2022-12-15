<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Exspense;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ReportController extends Controller
{
    public function manage_report(){
        $users_id = Auth::guard('web')->user()->id;

        $chart_options = [
            'chart_title' => 'Exspense by days',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Exspense',
            'group_by_field' => 'date',
            'group_by_period' => 'day',

            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',
            'where_raw' => 'user_id ='.$users_id,

            'chart_type' => 'bar',
            'chart_color' => '59, 154, 225',
            'filter_field' => 'created_at',
            'filter_period' => 'month',
        ];

        $exspense_chart = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Income by Descriptions',
            'report_type' => 'group_by_relationship',
            'model' => 'App\Models\Exspense',
            'group_by_field' => 'category_id',
            'chart_type' => 'pie',
            
            'relationship_name' => 'rCategory', // represents function user() on Transaction model
            'group_by_field' => 'category',
            'where_raw' => 'user_id = '.$users_id,
            'chart_color' => '59, 154, 225',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show users only registered this month
        ];
    
        $exspense_chart_by_description = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Total of Amount',
            'chart_type' => 'line',
            'chart_color' => '59, 154, 225',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Income',
            'where_raw' => 'user_id = '.$users_id,
            'group_by_field' => 'date',
            'group_by_period' => 'day',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'amount',

            'filter_field' => 'created_at',
            'filter_days' => 30, // show only transactions for last 30 days
            'filter_period' => 'week', // show only transactions for this week
            'continuous_time' => true, // show continuous timeline including dates without data
        ];

        $income_chart_by_amount = new LaravelChart($chart_options);

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
            'exspense_chart',
            'exspense_chart_by_description',
            'income_chart_by_amount',
            'total_income',
            'total_exspense',
            'total_balance',
            'exspenses',
            'incomes'
        ));
    
    }
}
