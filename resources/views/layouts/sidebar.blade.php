<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{ asset("assets/img/logo.png") }}" alt="logo sekolah" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">Inventori Barang</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset("assets/img/profile.jpg") }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ auth()->user()->username }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('barang.index') }}" class="nav-link {{ request()->routeIs('barang.index') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-boxes-stacked"></i>
            <p>
              Data Barang
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('data_peminjam.index') }}" class="nav-link {{ request()->routeIs('data_peminjam.index') ? 'active' : '' }}">
            <i class="nav-icon fa-solid fa-user"></i>
            <p>
              Data Peminjam
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('peminjaman_barang.index') }}" class="nav-link {{ request()->routeIs('peminjaman_barang.index') ? 'active' : '' }}">
            <i class="nav-icon fa-regular fa-file"></i>
            <p>
              Peminjaman Barang
            </p>
          </a>
        </li>
      
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa-solid fa-right-from-bracket"></i>
            <p>
              Logout
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>