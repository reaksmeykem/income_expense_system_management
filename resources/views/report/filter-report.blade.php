@extends('master')

@section('main-content')
<div class="container">

    <div class="my-5">
        <div class="d-flex justify-content-between">
            <h2>ចំណូលសរុបប្រចាំខែ: </h2>
            <div>
                <a href="{{ route('create_income') }}" class="btn btn-primary">បន្ថែមថ្មី</a>
            </div>
        </div>
        <div class="income-container">
            <div class="row">
                @foreach($filter as $item)
                <div class="col-lg-4 my-3">
                    <div class="card">
                        <div class="card-header py-0 pt-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p>{{ $item->date }}</p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="mx-1">
                                        <a href="{{ route('delete_income', $item->id) }}" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger btn-sm"><span class="mdi mdi-delete"></span></a>
                                    </div>
                                    <div class="mx-1">
                                        <a href="{{ route('edit_income', $item->id) }}" class="btn btn-primary btn-sm"><span class="mdi mdi-circle-edit-outline"></span></a>
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
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection