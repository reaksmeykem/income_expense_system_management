@extends('master')

@section('main-content')
<div class="container">
    
    <div>
        <div class="income-container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="breadcrumb-wrapper">
                        <ul>
                            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
                            <li><a>>></a></li>
                            <li><a>គ្រប់គ្រងប្រភេទ</a></li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h2>គ្រប់គ្រងប្រភេទ </h2>
                    </div>
                    <div class="card">
                        <div class="card-body" >
                            <form action="{{ route('store_category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <label class="form-label">ឈ្មោះប្រភេទ</label>
                                <div>
                                    <div class="mb-3">
                                       <input type="text" class="form-control" name="category" placeholder="បញ្ចូលប្រភេទ">
                                       @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                       @enderror
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <div class="m-1">
                                            <button data-toggle="tooltip" title="Save" type="submit" class="btn btn-primary"><img src="{{ asset('assets/icon/add.png') }}" width="24px" alt=""></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- table --}}
                    <div class="card mt-3">
                        <div class="card-body py-0 pt-3" >
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class="thead-dark">
                                      <tr>
                                        <th>ឈ្មោះប្រភេទ</th>
                                        <th>ប៊ូតុង</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $category->category }}</td>
                                            <td >
                                                <div class="d-flex justify-content-end">
                                                    <div style="margin-right: 20px;">
                                                        <a data-toggle="tooltip" title="Edit" href="{{ route('edit_category', $category->id) }}" class="btn btn-primary btn-sm mr-2 text-white"><img src="{{ asset('assets/icon/edit.png') }}" width="24px" alt=""></a>
                                                    </div>
                                                    <div style="margin-right: 20px;">
                                                        <a data-toggle="tooltip" title="Delete" href="{{ route('delete_category', $category->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm mr-2"><img src="{{ asset('assets/icon/delete.png') }}" width="24px" alt=""></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach                                                                                      
                                    </tbody>
                                  </table>
                                </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>

@endsection
