@extends('master')

@section('main-content')

<div class="container">
    <div class="my-5">
        
        <div class="income-container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="my-3 d-flex justify-content-center">
                                <h2>បង្កើតគណនីថ្មី</h2>
                            </div>
                            <form action="{{ route('submit_register') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ឈ្មោះ (ត្រកូល​ និងនាមខ្លួន)</label>
                                    <input type="text" class="form-control" name="name" placeholder="បញ្ចូលឈ្មោះ" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">អ៊ីម៉ែល</label>
                                  <input type="text" class="form-control" name="email" placeholder="បញ្ចូលអ៊ីម៉េល" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ពាក្យសម្ងាត់</label>
                                    <input type="password" class="form-control" name="password" placeholder="បញ្ចូលពាក្យសម្ងាត់" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">បញ្ជាក់ពាក្យសម្ងាត់</label>
                                    <input type="password" class="form-control" name="cpassword" placeholder="បញ្ចូលបញ្ជាក់ពាក្យសម្ងាត់" value="{{ old('cpassword') }}">
                                    @error('cpassword')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="width: 100%;">
                                    <div class="m-1">
                                        <button type="submit" class="btn btn-primary w-100">ចុះឈ្មោះ</button>
                                    </div>
                                    <div class="mb-2 mt-3 text-center">
                                        <div>មានគណនីរួចហើយ? <a href="{{ route('login') }}">ចូល</a></div>
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