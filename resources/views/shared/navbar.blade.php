<nav class="navbar navbar-expand-lg" style="background-color: #FF6464;">
    <div class="container">
      @if(Auth::guard('web')->user())
        <a class="navbar-brand mt-2" href="{{ route('dashboard') }}"><h1 style="text-transform:uppercase;color:#fff;">ប្រព័ន្ធគ្រប់គ្រងចំណូលចំណាយ</h1></a>
      @else
        <a class="navbar-brand mt-2" href="{{ route('login') }}"><h1 style="text-transform:uppercase;color:#fff;">ប្រព័ន្ធគ្រប់គ្រងចំណូលចំណាយ</h1></a>
      @endif
      <button class="navbar-toggler" style="border:0;outline:0;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        
        <div class="d-flex justify-content-between">
          @if(!Auth::guard('web')->user())
          <div>
            <a href="{{ route('login') }}" class="btn btn-secondary btn-sm m-1">ចូល</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm m-1">ចុះឈ្មោះ</a>
          </div>
          @else
            <div class="ml-2 nav-item dropdown d-flex justify-content-end">
                <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="nav-link m-2 text-white" style="font-weight: 600;">{{ Auth::guard('web')->user()->name }}</a>
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @if(Auth::guard('web')->user()->avatar)
                      <img src="{{ asset('uploads/avatars/'.Auth::guard('web')->user()->avatar)  }}" class="rounded-circle" style="width:40px;" alt="Avatar" />
                  @else
                    <img src="{{ asset('uploads/user.png')  }}" class="rounded-circle" style="width:40px;" alt="Avatar" />
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('view_profile') }}"><span class="mdi mdi-account"></span> ប្រវត្តិរូប</a></li>
                  <li><a class="dropdown-item" href="{{ route('logout') }}"><span class="mdi mdi-logout"></span> ចាកចេញ</a></li>
                </ul>
            </div>
          @endif
        </div>
      </div>
    </div>
  </nav>