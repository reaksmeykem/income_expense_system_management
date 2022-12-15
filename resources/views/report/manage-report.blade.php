@extends('master')

@section('main-content')
<div class="container">
    <div class="breadcrumb-wrapper">
        <ul>
            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
            <li><a>>></a></li>
            <li><a>គ្រប់គ្រងរបាយការណ៍</a></li>
        </ul>
    </div>
    <div>
        <div class="d-flex justify-content-between">
            <div>
                <h2>គ្រប់គ្រងរបាយការណ៍ប្រចាំខែ</h2>
            </div>
            <div class="d-flex justify-content-between">
                <form action="{{ route('filter_report') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-end">
                        <div style="width: 50%;">
                            <select name="txt_search_by_year"class="form-control" >
                                <option value="">ជ្រើសរើសឆ្នាំ</option>
                                <option value="">2022</option>
                                <option value="">2021</option>
                            </select>
                        </div>
                        <div class="mx-3" style="width: 50%;">
                            <select name="txt_search_by_month" class="form-control">
                                <option value="">ជ្រើសរើសខែ</option>
                                <option value="">2022</option>
                                <option value="">2021</option>
                            </select>
                        </div>
                        <div class="ml-3">
                            <button class="btn btn-primary">ទាញយក</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="income-container my-3" >
            <div class="row">
                <div class="col-lg-4 my-3">
                    <div class="card"  style="background-color: #3AB4F2;">
                        <div class="card-body">
                            <h4>ចំណូលសរុប</h4>
                            <div>
                                <h1>{{ $total_income }}$</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="card" style="background-color:#EB4747;">
                        <div class="card-body">
                            <h4>ចំណាយសរុប</h4>
                            <div>
                                <h1>{{ $total_exspense }}$</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-3">
                    <div class="card" style="background-color:#3CCF4E;" >
                        <div class="card-body">
                            <h4>សមតុល្យសរុប</h4>
                            <div>
                                <h1>{{ $total_balance }}$</h1>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="income-container">
                        <div class="row">
                            <div class="col-lg-6 my-3">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h1>{{ $exspense_chart->options['chart_title'] }}</h1> --}}
                                        <h4>របាយការណ៍ចំណូលប្រចាំថ្ងៃគិតជាដុល្លារ</h4>
                                        {!! $income_chart_by_amount->renderHtml() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 my-3">
                                <div class="card">
                                    <div class="card-body">
                                        {{-- <h1>{{ $exspense_chart->options['chart_title'] }}</h1> --}}
                                        <h4>របាយការណ៍ចំណាយប្រចាំថ្ងៃ</h4>
                                        {!! $exspense_chart->renderHtml() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>ចំណូលតាមប្រភេទសរុប</h4>
                            <div>
                                @foreach($incomes as $item)
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <div>
                                       {{ $item->rCategory->category }} 
                                    </div>
                                    <div>
                                        ${{ $item->total_income_by_category }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h4>ចំណាយតាមប្រភេទសរុប</h4>
                            @foreach($exspenses as $item)
                            <hr>
                            <div class="d-flex justify-content-between">
                                
                                <div>
                                   {{ $item->rCategory->category }} 
                                </div>
                                <div>
                                    ${{ $item->total_exspense_by_category }}
                                </div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div>

                
            </div>
        </div>
    </div>
</div>

@endsection

@section('javascript')
{!! $exspense_chart->renderChartJsLibrary() !!}
{!! $exspense_chart->renderJs() !!}

{!! $exspense_chart_by_description->renderChartJsLibrary() !!}
{!! $exspense_chart_by_description->renderJs() !!}

{!! $income_chart_by_amount->renderChartJsLibrary() !!}
{!! $income_chart_by_amount->renderJs() !!}
@endsection