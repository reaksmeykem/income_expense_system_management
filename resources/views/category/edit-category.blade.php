@extends('master')

@section('main-content')

<div class="container">
    <div class="breadcrumb-wrapper">
        <ul>
            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
            <li><a>>></a></li>
            <li><a href="{{ route('manage_category') }}">គ្រប់គ្រងប្រភេទ</a></li>
            <li><a>>></a></li>
            <li><a>ធ្វើបច្ចប្បន្នភាពប្រភេទ</a></li>
        </ul>
    </div>
    <div>
        <div class="d-flex justify-content-between">
            <h2>ធ្វើបច្ចប្បន្នភាពប្រភេទ </h2>
        </div>
        <div class="income-container">
            <div class="row">
                <div class="col-lg-8 my-3">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('update_category', $category_detail->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">ឈ្មោះប្រភេទ</label>
                                   <input type="text" class="form-control" value="{{ $category_detail->category }}" name="category" placeholder="បញ្ចូលប្រភេទ">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="m-1">
                                        <a data-toggle="tooltip" title="Back" href="{{ route('manage_category') }}" class="btn btn-secondary"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                    </div>
                                    <div class="m-1">
                                        <button data-toggle="tooltip" title="Update" type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/update.png') }}" width="24px" alt=""></button>
                                    </div>

                                    {{-- <div class="m-1">
                                        <a data-toggle="tooltip" title="Back" href="{{ route('manage_exspense') }}" class="btn btn-secondary"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                    </div>
                                    <div class="m-1">
                                        <button data-toggle="tooltip" title="Update" type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/update.png') }}" width="24px" alt=""></button>
                                    </div> --}}
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

@section('javascript')
{{-- datable --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

{{-- tooltip --}}
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
@endsection