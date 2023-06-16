<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kairos || @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="{{asset('storage/icon/logo_kairos.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg bg-info sticky-top">
      <div class="container-fluid">
        <img src="{{asset('storage/icon/logo_kairos_svg.png')}}" width="auto" height="50" class="navbar-brand" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="#">Info</a>
            </li>
          </ul>
          <div class="d-flex ms-1">
            <a href="profile_admin" class="btn btn-outline-primary text-dark"><i class="bi bi-person-circle"></i></a>
          </div>
        </div>
      </div>
    </nav>
    {{-- endnavbar --}}

    {{-- sidebar --}}
    <section>
      <div class="row" >
        <div class="col-lg-3 bg-secondary collapse d-lg-block" id="navbarSupportedContent">
          <div class="container p-3">
            <ul class="navbar-nav d-block">
              @if (Auth::user()->role_id == 1)
                <li class="nav-item mb-3" >
                  <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="nav-link text-light bg-primary active" 
                  @endif class="nav-link text-light">
                  <i class="bi bi-border-width m-2"></i>
                  <span class="p-2">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item mb-3" >
                  <a href="/users" @if (request()->route()->uri == 'users') class="nav-link text-light bg-primary active" 
                  @endif href="/users" class="nav-link text-light">
                  <i class="bi bi-people-fill p-2"></i>
                    <span class="p-2">Users</span>
                  </a>
                </li>
                <li class="nav-item mb-3" >
                  <a href="/lagu" @if (request()->route()->uri == 'lagu') class="nav-link text-light bg-primary active" 
                  @endif class="nav-link text-light">
                  <i class="bi bi-music-note-list p-2"></i>
                    <span class="p-2">Lagu</span>
                  </a>
                </li>
                <li class="nav-item mb-3" >
                  <a href="/categories" @if (request()->route()->uri == '/categories') class="nav-link text-light bg-primary active" 
                  @endif class="nav-link text-light">
                  <i class="bi bi-box2-fill p-2"></i>
                    <span class="p-2">Category</span>
                  </a>
                </li>
              @else
              <li class="nav-item mb-3" >
                <a href="/profile" @if (request()->route()->uri == '/profile') class="nav-link text-light bg-primary active" 
                @endif class="nav-link text-light">
                  <span class="p-2">Profile</span>
                </a>
              </li>
              <li class="nav-item mb-3" >
                <a href="lagu" @if (request()->route()->uri == 'lagu') class="nav-link text-light bg-primary active" 
                @endif class="nav-link text-light">
                  <span class="p-2">Lagu</span>
                </a>
              </li>

              @endif
              <li class="nav-item">
                <a href="logout" class="text-decoration-none fs-6 text-light">
                  Logout
                  <i class="bi bi-arrow-right-square p-2"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        {{-- endsidebar --}}


        {{-- content --}}
        <div class="col-lg-9 bg-light scrollspy-example bg-body-tertiary p-3 rounded-2">
          <div class="row">
            @yield('content')
          </div>
        </div>
      </div>
    </section>
    {{-- endcontent --}}

    {{-- Footer --}}

    
    {{-- EndFooter --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    
  </body>
</html>