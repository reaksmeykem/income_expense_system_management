@extends('master')

@section('main-content')
<div class="container">
    <div class="mt-3">
        {{-- <div class="d-flex justify-content-between">
            <h2>ផ្ទាំងគ្រប់គ្រង</h2>
        </div> --}}
        <div class="breadcrumb-wrapper">
            <ul>
                <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
                <li><a>>></a></li>
                <li><a class="active" href="{{ route('dashboard') }}">ផ្ទាំងគ្រប់គ្រង</a></li>
            </ul>
        </div>
        <div class="dashboard-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between my-2 mt-3">
                                <h5>ចំណូលសរុប</h5>
                                <h5 class="btn btn-primary">{{ $total_income }} $</h5>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-2 mt-3">
                                <h5>ចំណាយសរុប</h5>
                                <h5 class="btn btn-danger">{{ $total_exspense }} $</h5>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between my-3">
                                <h5>សមតុល្យសរុប</h5>
                                <h5 class="btn btn-success">{{ $total_balance }} $</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-6 col-lg-4 my-3 box-menu">
            <a href="{{ route('manage_income') }}" style="text-decoration: none;">
                <div class="box-wrapper">
                    <div class="box">
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/icon/income.png') }}" width="88px" alt="">
                        </div>
                        <div class="text">
                            <h2>គ្រប់គ្រងចំណូល</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4 my-3 box-menu">
            <a href="{{ route('manage_exspense') }}" style="text-decoration: none;">
                <div class="box-wrapper">
                    <div class="box">
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/icon/pay.png') }}" width="88px" alt="">
                        </div>
                        <div class="text">
                            <h2>គ្រប់គ្រងចំណាយ</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4 my-3 box-menu">
            <a href="{{ route('manage_category') }}" style="text-decoration: none;">
                <div class="box-wrapper">
                    <div class="box">
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/icon/categories.png') }}" width="88px" alt="">
                        </div>
                        <div class="text">
                            <h2>គ្រប់គ្រងប្រភេទ</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-8 my-3 box-menu">
            <a href="{{ route('manage_report') }}" style="text-decoration: none;">
                <div class="box-wrapper">
                    <div class="box">
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/icon/report.png') }}" width="88px" alt="">
                        </div>
                        <div class="text">
                            <h2>របាយការណ៍</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4 my-3 box-menu">
            <a href="" style="text-decoration: none;">
                <div class="box-wrapper">
                    <div class="box">
                        <div class="icon mb-3">
                            <img src="{{ asset('assets/icon/info.png') }}" width="88px" alt="">
                        </div>
                        <div class="text">
                            <h2>អំពីយើង</h2>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
