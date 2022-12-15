@extends('master')

@section('main-content')

<div class="container">
    <div class="my-5">
        
        <div class="income-container" >
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center my-3">
                                <h2>បញ្ចូលគណនី</h2>
                            </div>
                            <form action="{{ route('login_submit') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                  <label class="form-label">អ៊ីម៉ែល</label>
                                  <input type="text" class="form-control" name="email" placeholder="បញ្ចូលអ៊ីម៉េល" value="{{ old('email') }}">
                                  @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                  @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ពាក្យសម្ងាត់</label>
                                    <input type="password" class="form-control" name="password" placeholder="បញ្ចូលលេខពាក្យសម្ងាត់" value="{{ old('password') }}">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="width: 100%">
                                    <div class="m-1">
                                        <button style="width: 100%;" type="submit" class="btn btn-primary">ចូល</button>
                                    </div>
                                    <div class="mb-2 mt-3 text-center">
                                        <div>ត្រូវការគណនីមួយ? <a href="{{ route('register') }}">បង្កើតគណនី</a></div>
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