


<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center bg-primary" href="{{ url('/') }}" style="font-weight: 1000; font-size: 25px">Glone</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="text-left pt-3 mb-3">
      <a class="h2 text-white text-decoration-none" href="{{ url('/dashboard/profil') }}" style="font-weight: 1000; font-size: 22px">Welcome back, {{ auth()->user()->username }}</a>
  </div>
    {{-- <input class="form-control form-control-dark form-control::-webkit-input-placeholder-color { color: #999;} w-100 mx-3 " style="border-radius: 25px; border:2px solid white" type="text" placeholder="Search" aria-label="Search"> --}}
    <div class="navbar-nav">
      <div class="nav-item text-nowrap" >
        <form action="{{ url('/logout') }}" method="POST">
          @csrf
            <button type="submit" class="nav-link px-5 bg-primary border-0" style="font-weight: 1000; font-size: 15px;">Logout  <span data-feather="log-out"></span></button>
        </form>
      </div>
    </div>
  </header>
  