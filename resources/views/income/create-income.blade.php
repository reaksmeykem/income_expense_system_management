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
                            <li><a href="{{ route('manage_income') }}">គ្រប់គ្រងចំណូល</a></li>
                            <li><a>>></a></li>
                            <li><a>បន្ថែមចំណូលថ្មី</a></li>
                        </ul>
                    </div>
                    <div>
                        <div class="mb-3">
                            <h2>បន្ថែមចំណូលថ្មី</h2>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('store_income') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label">ប្រភេទ</label>
                                            <a style="font-weight:500;color:rgb(44, 97, 212); text-decoration:none;" href="{{ route('manage_category') }}">បន្ថែមប្រភេទ</a>
                                        </div>
                                        
                                        <select class="form-control" name="income_category">
                                            <option selected disabled>ជ្រើសរើសប្រភេទ</option>
                                            @foreach($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->category }}</option>
                                            @endforeach
                                        </select>
                                        @error('income_category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ចំនួនទឹកប្រាក់</label>
                                        <input type="text" class="form-control" name="income_amount" placeholder="បញ្ចូលចំនួនទឹកប្រាក់គិតជាដុល្លារ" value="{{ old('income_amount') }}">
                                        @error('income_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">កាលបរិច្ឆេទ</label>
                                        <input type="datetime-local" class="form-control" name="income_date" placeholder="Enter income date" value="{{ old('income_date') }}">
                                        @error('income_date')
                                                <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">ការពិពណ៌នា</label>
                                        <textarea name="income_description" placeholder="បញ្ចូលការពិពណ៌នា" class="form-control" rows="5">{{ old('income_description') }}</textarea>
                                        @error('income_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="m-1">
                                            <a data-toggle="tooltip" title="Back" href="{{ route('manage_income') }}" class="btn btn-secondary"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                        </div>
                                        <div class="m-1">
                                            <button data-toggle="tooltip" title="Save" type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/add.png') }}" width="24px" alt=""></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>

@endsection