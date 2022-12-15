<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Exspense;
use Illuminate\Support\Carbon;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\User;
use KhmerDateTime\KhmerDateTime;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class DashboardController extends Controller
{
    public function dashboard(){

        $total_income = Income::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->whereMonth('date', Carbon::now()->month)->sum('amount');
        $total_exspense = Exspense::where('user_id', Auth::guard('web')->user()->id)->with('rCategory')->whereMonth('date', Carbon::now()->month)->sum('amount');

        $count_income = Income::where('user_id', Auth::guard('web')->user()->id)->whereMonth('date', Carbon::now()->month)->count();
        $count_exspense = Exspense::where('user_id', Auth::guard('web')->user()->id)->whereMonth('date', Carbon::now()->month)->count();
        $count_category = Category::where('user_id', Auth::guard('web')->user()->id)->count();

        $total_balance = $total_income - $total_exspense;
        
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

        return view('dashboard', compact(
            'total_income', 
            'total_exspense', 
            'total_balance',
            'count_income',
            'count_exspense',
            'exspense_chart',
            'exspense_chart_by_description',
            'income_chart_by_amount',
            'count_category'
        ));
    }
}
