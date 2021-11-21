<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container">
      <a class="navbar-brand" href="{{url('/')}}" style="font-weight:1000; font-size:27px;">Glone</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto my-2 position-relative" style="font-weight:1000; font-size:17px; text-align: center">
          <li class="nav-item px-3" >
            <a class="nav-link {{ ($title === "Home") ? 'active' : ''}}"  href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item px-3" >
            <a class="nav-link  {{Request::is('about') ? 'active' : ''}}" href="{{url('/about')}}">About</a>
          </li>
          <li class="nav-item px-3" >
            <a class="nav-link {{ ($title === "Posts") ? 'active' : ''}}" href="{{url('/blog')}}">Blogs</a>
		  </li>
		  <li class="nav-item px-3" >
            <a class="nav-link {{ ($title === "Need Some Helps?") ? 'active' : ''}}" href="{{url('/help')}}">Help</a>
		  </li>
		  <li class="nav-item px-3" >
            <a class="nav-link  {{Request::is('product') ? 'active' : ''}}" href="{{url('/product')}}">Product</a>
          </li>
		</ul>

		<ul class="navbar-nav  my-2 position-relative" style="font-weight:1000; font-size:17px; text-align: center">
			@auth
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				  Welcome back, {{auth()->user()->name}}
				</a>
				<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
				  <li><a class="dropdown-item" href="{{ url('/dashboard') }}"><i class="bi bi-layout-wtf"></i> My Dashboard</a></li>
				  <li><hr class="dropdown-divider"></li>
				  <li>
					  <form action="{{ url('/logout') }}" method="POST">
						@csrf
						  <button type="submit" class="dropdown-item" ><i class="bi bi-door-closed-fill"></i> Logout</button>
					  </form>
					  
				  </li>
				</ul>
			  </li>
			@else
		
			<li class="nav-item ">
				<a class="nav-link {{ ($title === "Login") ? 'active' : ''}}"  href="{{url('/login')}}"><i class="bi bi-door-open-fill"></i> Login</a>
			</li>
		
			@endauth
		</ul>


		
      </div>
    </div>
  </nav>

