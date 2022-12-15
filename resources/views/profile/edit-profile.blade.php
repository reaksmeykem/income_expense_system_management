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
                            <li><a href="{{ route('view_profile') }}">ប្រវត្តិរូបសង្ខេប</a></li>
                            <li><a>>></a></li>
                            <li><a>ធ្វើបច្ចប្បន្នប្រវត្តិរូប</a></li>
                        </ul>
                    </div>
                    <div class="card">
                        <div class="card-body" style="font-size: 22px;padding:20px 40px;">
                            <div class="my-3">
                                <h2>ធ្វើបច្ចប្បន្នភាពប្រវត្តិរូប</h2>
                            </div>
                            <form action="{{ route('update_profile', $user_detail->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="">រូបថត<span style="font-size:18;color:red;">*</span></label>
                                    <div class="file-upload">
                                        <div class="image-upload-wrap">
                                            <input name="avatar" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                            <div class="drag-text">
                                                @if($user_detail->avatar)
                                                <img src="{{ asset('uploads/avatars/'.$user_detail->avatar) }}" class="rounded-circle" style="width:180px;"
                                                    alt="Avatar" />
                                                @else
                                                <h3>Drag and drop a file or select add Image</h3>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="file-upload-content">
                                            <img class="file-upload-image" src="#" alt="your image" />
                                            <div class="image-title-wrap">
                                                <button type="button" onclick="removeUpload()" class="remove-image">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                    @error('avatar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ឈ្មោះ (ត្រកូល​ និងនាមខ្លួន)</label>
                                    <input type="text" class="form-control" name="name" placeholder="បញ្ចូលឈ្មោះ" value="{{ $user_detail->name }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">អ៊ីម៉ែល</label>
                                  <input type="text" class="form-control" name="email" placeholder="បញ្ចូលអ៊ីម៉េល" value="{{ $user_detail->email }}">
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="width: 100%;margin-top:15px;" class="d-flex justify-content-end">
                                    <div class="m-1 w-10">
                                        <a data-toggle="tooltip" title="Back" href="{{ route('view_profile') }}" class="btn btn-secondary w-100"><img src="{{ asset('assets/icon/back.png') }}" width="24px" alt=""></a>
                                    </div>
                                    <div class="m-1 w-10">
                                        <button data-toggle="tooltip" title="Update" type="submit" class="btn btn-primary w-100"><img src="{{ asset('assets/icon/update.png') }}" width="24px" alt=""></button>
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

@include('shared.input-image')