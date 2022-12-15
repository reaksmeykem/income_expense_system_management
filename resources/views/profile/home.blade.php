@extends('master')

@section('main-content')

<div class="container">
    
    <div>
        
        <div class="income-container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 my-3">
                    <div class="breadcrumb-wrapper">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
                            <li><a>>></a></li>
                            <li><a>ប្រវត្តិរូបសង្ខេប</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body" style="padding:60px 40px;">
                            <div>
                                <h2>ប្រវត្តិរូបសង្ខេប</h2>
                            </div>
                                <div class="text-center mb-3">
                                    @if(Auth::guard('web')->user()->avatar)
                                    <img src="{{ asset('uploads/avatars/'.Auth::guard('web')->user()->avatar) }}" class="rounded-circle" style="width:180px;"
                                    alt="Avatar" />
                                    @else
                                    <img src="{{ asset('uploads/user.png') }}" class="rounded-circle" style="width:180px;"
                                    alt="Avatar" />
                                    @endif
                                    
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <div  style="margin-right: 10px;">
                                        ឈ្មោះ៖ 
                                    </div>
                                    <div style="font-weight: 600;">
                                        {{ Auth::guard('web')->user()->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <div  style="margin-right: 10px;">
                                        អ៊ីម៉ែល៖ 
                                    </div>
                                    <div style="font-weight: 600;">
                                        {{ Auth::guard('web')->user()->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mb-2">
                                    <div style="margin-right: 10px;">
                                        ស្ថានភាព៖ 
                                    </div>
                                    <div style="font-weight: 600;">
                                        
                                        @if(Auth::guard('web')->user()->status == 1)
                                            <div class="text-warning">Pending</div>
                                        @elseif(Auth::guard('web')->user()->status == 2)
                                            <div class="text-success">Active</div>
                                        @else
                                            <div class="text-danger">Disable</div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="d-flex justify-content-center mb-2">
                                    <a data-toggle="tooltip" title="Edit" href="{{ route('edit_profile', Auth::guard('web')->user()->id) }}" class="btn btn-primary"><img src="{{ asset('assets/icon/edit.png') }}" width="24px" alt=""></a>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endsection