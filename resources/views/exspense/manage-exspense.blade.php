@extends('master')

@section('main-content')

<div class="container">
    <div class="breadcrumb-wrapper">
        <ul>
            <li><a href="{{ route('dashboard') }}">ទំព័រដើម</a></li>
            <li><a>>></a></li>
            <li><a>គ្រប់គ្រងចំណាយ</a></li>
        </ul>
    </div>
    <div>
        <div class="d-flex justify-content-between">
            <h2>ចំណាយសរុបប្រចាំខែ: {{ $total_exspenses }} $</h2>
            <div>
                <a data-toggle="tooltip" title="Create New" href="{{ route('create_exspense') }}" class="btn btn-primary"><img src="{{ asset('assets/icon/add1.png') }}" width="24px" alt=""></a>
            </div>
        </div>
        <div class="income-container">
            <div class="row">
                <div class="col-lg-12 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead>
                                      <tr>
                                        <th>ការពិពណ៍នា</th>
                                        <th>ប្រភេទ</th>
                                        <th>ចំនួនទឹកប្រាក់</th>
                                        <th>កាលបរិច្ឆេទ</th>
                                        <th>ស្ថានភាព</th>
                                        <th>ប៊ូតុង</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exspenses as $item)
                                        <tr>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->rCategory->category }}</td>
                                            <td>${{ $item->amount }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <small class="btn btn-sm btn-success py-0 px-1">Active</small>
                                                @else
                                                    <small class="btn btn-sm btn-danger">Disable</small>
                                                @endif
                                            </td>
                                            <td >
                                                <div class="d-flex justify-content-end">
                                                    <div style="margin-right: 20px;">
                                                        <a data-toggle="tooltip" title="Edit" href="{{ route('edit_exspense', $item->id) }}" class="btn btn-primary btn-sm mr-2 text-white"><img src="{{ asset('assets/icon/edit.png') }}" width="24px" alt=""></a>
                                                    </div>
                                                    <div style="margin-right: 20px;">
                                                        <a data-toggle="tooltip" title="Delete" href="{{ route('delete_exspense', $item->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm mr-2"><img src="{{ asset('assets/icon/delete.png') }}" width="24px" alt=""></a>
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

                    {{-- <div class="card">
                        <div class="card-header py-0 pt-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>{{ $item->date }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="mx-1">
                                        <a href="{{ route('delete_exspense', $item->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><span class="mdi mdi-delete"></span></a>
                                    </div>
                                    <div class="mx-1">
                                        <a href="{{ route('edit_exspense', $item->id) }}" class="btn btn-primary btn-sm"><span class="mdi mdi-circle-edit-outline"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>{{ $item->description }}</p>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>{{ $item->amount }} $</h4>
                                </div>
                                <div>
                                    <p style="font-weight: bold;" class="text-primary mt-1">{{ $item->rCategory->category }}</p>
                                </div>
                            </div>
                            
                        </div>
                    </div> --}}
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection