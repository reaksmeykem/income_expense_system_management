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
                            <li><a>ធ្វើបច្ចប្បន្នភាពចំណូល</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="d-flex justify-content-center my-3">
                                <h2>ធ្វើបច្ចប្បន្នភាពចំណូល</h2>
                            </div>
                            <form action="{{ route('update_income', $income_detail->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label">ការពិពណ៌នា</label>
                                  <textarea name="income_description" placeholder="បញ្ចូលការពិពណ៌នា" class="form-control" rows="5">{{ $income_detail->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ប្រភេទ</label>
                                    <select class="form-control" name="income_category">
                                        <option selected disabled>ជ្រើសរើសប្រភេទ</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $income_detail->category_id) selected @endif>{{ $item->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">ចំនួនទឹកប្រាក់</label>
                                  <input type="text" class="form-control" name="income_amount" placeholder="បញ្ចូលចំនួនទឹកប្រាក់គិតជាដុល្លារ" value="{{ $income_detail->amount }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">កាលបរិច្ឆេទ</label>
                                    <input type="datetime-local" class="form-control" name="income_date" placeholder="Enter income date" value="{{ $income_detail->date }}">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="m-1">
                                        <a data-toggle="tooltip" title="Back" href="{{ route('manage_income') }}" class="btn btn-secondary"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                    </div>
                                    <div class="m-1">
                                        <button data-toggle="tooltip" title="Update" type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/update.png') }}" width="24px" alt=""></button>
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

@endsection