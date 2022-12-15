@extends('master')

@section('main-content')

<div class="container">
    
    <div>
        <div class="income-container" >
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8 my-3">
                    <div class="breadcrumb-wrapper">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
                            <li><a>>></a></li>
                            <li><a href="{{ route('manage_exspense') }}">គ្រប់គ្រងចំណាយ</a></li>
                            <li><a>>></a></li>
                            <li><a>បន្ថែមចំណាយថ្មី</a></li>
                        </ul>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center my-3">
                                <h2>បន្ថែមចំណាយថ្មី</h2>
                            </div>
                            <form action="{{ route('store_exspense') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">ប្រភេទ</label>
                                        <a style="text-decoration: none; font-weight:500;" href="{{ route("manage_category") }}">បន្ថែមប្រភេទ</a>
                                    </div>
                                    <select class="form-control" name="exspense_category">
                                        <option selected disabled>ជ្រើសរើសប្រភេទ</option>
                                        @foreach($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category }}</option>
                                        @endforeach
                                    </select>
                                    @error('exspense_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">ចំនួនទឹកប្រាក់</label>
                                  <input type="text" class="form-control" name="exspense_amount" placeholder="បញ្ចូលចំនួនទឹកប្រាក់គិតជាដុល្លារ" value="{{ old('exspanse_amount') }}">
                                  @error('exspense_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">កាលបរិច្ឆេទ</label>
                                    <input type="datetime-local" class="form-control" name="exspense_date" placeholder="Enter income date" value="{{ old('exspense_date') }}">
                                    @error('exspense_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ការពិពណ៌នា</label>
                                    <textarea name="exspense_description" placeholder="បញ្ចូលការពិពណ៌នា" class="form-control" rows="5">{{ old('exspanse_description') }}</textarea>
                                    @error('exspense_description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="m-1">
                                        <a data-toggle="tooltip" title="Back" href="{{ route('manage_exspense') }}" class="btn btn-secondary"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                    </div>
                                    <div class="m-1">
                                        <button data-toggle="tooltip" title="Save"  type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/add.png') }}" width="24px" alt=""></button>
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