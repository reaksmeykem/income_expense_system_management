@extends('master')

@section('main-content')

<div class="container">
    <div class="my-5 w-100 m-auto">
        <div class="d-flex justify-content-between">
            <h2>បន្ថែមប្រភេទថ្មី</h2>
        </div>
        <div class="income-container">
            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="mb-3 mt-2">
                                <h4>ការចំណាយ</h4>
                            </div> --}}
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ឈ្មោះប្រភេទ</label>
                                    <textarea name="exspense_description" placeholder="បញ្ចូលការពិពណ៌នា" class="form-control" rows="5">{{ old('exspanse_description') }}</textarea>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="m-1">
                                        <a href="{{ route('manage_income') }}" class="btn btn-secondary">ត្រឡប់ក្រោយ</a>
                                    </div>
                                    <div class="m-1">
                                        <button type="submit" class="btn btn-success">រក្សាទុក</button>
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