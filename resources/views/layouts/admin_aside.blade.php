  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin') }}" class="brand-link">
      <img src="{{ asset('public/assets/image/art_logo1.JPG') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">mrbullyfx</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/assets/image/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">mrbullyfx</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-header">EXAMPLES</li>

          <li class="nav-item" style="display: none;">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Manage Videos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('createVideo') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Video</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('listVideos') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Videos</p>
                </a>
              </li>
            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Manage Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{-- <li class="nav-item">
                <a href="{{ route('createVideo') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upload Video</p>
                </a>
              </li> --}}
              <li class="nav-item">
                <a href="{{ route('listUsers') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Users</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview" style="display: none;">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
