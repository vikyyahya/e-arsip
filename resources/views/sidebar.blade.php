<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link primary">
    <!-- <img src="{{asset('lte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <span class="brand-text font-weight-dark">PT Surya Rengo Container</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->

    <!-- Sidebar Menu -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div>
        <img class="rounded-circle img-circle" style="width:40px; height:40px;" src="{{ URL::to('/') }}/uploads/{{Auth::user()->foto}}" alt="User profile picture">
        <!-- <img src="{{ URL::to('/') }}/uploads/{{Auth::user()->foto}}" class="rounded-circle" width="400" height="400" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="/kelolaakun" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="/dashboard" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @if (Auth::user()->level == 1 )
        <li class="nav-item">
          <a href="/users" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Master User
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/divisi" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Master Divisi
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>
        @endif

        @if (Auth::user()->level == 2 )
        <li class="nav-item">
          <a href="/datadokumen" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>
              Dokumen
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>

        @endif


        <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-info-circle"></i>
                <p>
                  Report
                  <span class="right badge badge-danger"></span>
                </p>
              </a>
            </li> -->

        <li class="nav-item">
          <a href="/kelolaakun" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Kelola Akun
              <span class="right badge badge-danger"></span>
            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>