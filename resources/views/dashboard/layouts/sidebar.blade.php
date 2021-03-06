<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-5" style="font-size: 15px">
      <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted">
        <span> -- Administration -- </span>
      </h6>
      <ul class="nav flex-column" style=" text-align: center">
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ url("/dashboard") }}">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  {{Request::is('dashboard/profile*') ? 'active' : ''}}" href="{{ url("/dashboard/profile") }}">
            <span data-feather="user-check"></span>
            My Profile
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/allposts*') ? 'active' : ''}}" href="{{ url("/dashboard/allposts") }}">
            <span data-feather="file-text"></span>
            All Posts
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/allhelps*') ? 'active' : ''}}" href="{{ url("/dashboard/allhelps") }}">
              <span data-feather="file-text"></span>
              All Helps
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/allproducts*') ? 'active' : ''}}" href="{{ url("/dashboard/allproducts") }}">
              <span data-feather="truck"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{Request::is('dashboard/allleaders*') ? 'active' : ''}}" href="{{ url("/dashboard/allleaders") }}">
              <span data-feather="users"></span>
              Leaders
            </a>
          </li>     
        
      {{-- kalo pengen nambah list disini--}}
      </ul>
      @can('superAdmin')
      <h6 class="sidebar-heading d-flex justify-content-center align-items-center px-3 mt-4 mb-1 text-muted">
        <span>-- Super Admin Only -- </span>
      </h6>
      <ul class="nav flex-column" style=" text-align: center">
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/allusers*') ? 'active' : ''}}" href="{{ url("/dashboard/allusers") }}">
            <span data-feather="tool"></span>
            All Admin
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/allcategories*') ? 'active' : ''}}" href="{{ url("/dashboard/allcategories") }}">
            <span data-feather="file-text"></span>
            Post Category
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('dashboard/allcategoryHelps*') ? 'active' : ''}}" href="{{ url("/dashboard/allcategoryHelps") }}">
            <span data-feather="file-text"></span>
            Help Category
          </a>
        </li>
      </ul>
      @endcan
    </div>
  </nav>