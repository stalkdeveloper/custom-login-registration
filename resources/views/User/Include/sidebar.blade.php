<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{url('/user/dashboard')}}">
          <i class="typcn typcn-device-desktop menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="auth">
          <i class="typcn typcn-user-add-outline menu-icon"></i>
          <span class="menu-title">User</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="user">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('getAllUser')}}"> All User </a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>