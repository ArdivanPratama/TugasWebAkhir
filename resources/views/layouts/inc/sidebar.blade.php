  <aside class="main-sidebar bg-pink elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('Template')}}/index3.html" class="brand-link">
      <img src="{{asset('Template')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Fashion Store</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt text-white"></i>
              <p class="text-white">
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('barang')}}" class="nav-link {{ Request::is('barang*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th text-white"></i>
              <p class="text-white">
                Barang
              </p>
            </a>
          </li>

            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>