<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('users.index')}}" class="brand-link">
      <img style="width: 200px; height: 70px;" src="{{URL::asset('public/images/hoasao/04.-Logo-down.jpg')}}" alt="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{URL::asset('upload/avatar/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->hoten}}</a>
        </div>
      </div>

      <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-address-card"></i>
              <p>
                Quản lý phân quyền
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link active">
                  <i class="far fa-user"></i>
                  <p style="margin-left: 10px;">Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('roles.index')}}" class="nav-link">
                  <i class="fas fa-users-cog"></i>
                  <p style="margin-left: 10px;">Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('permissions.index')}}" class="nav-link">
                  <i class="fas fa-cogs"></i>
                  <p style="margin-left: 10px;">Permissions</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý dữ liệu
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">4</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('positions.index')}}" class="nav-link">
                  <p>Chức danh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('education-levels.index')}}" class="nav-link">
                  <p>Trình độ văn hóa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('sources-job.index')}}" class="nav-link">
                  <p>Nguồn công việc</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('detail-jobs.index')}}" class="nav-link">
                  <p>Chi tiết công việc</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Quản lý trạng thái
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('interview-status.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trạng thái phỏng vấn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('interview-result.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kết quả phỏng vấn</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý quê quán
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('provinces.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tỉnh</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('districts.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Huyện</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('communes.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xã</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Quản lý trắc nghiệm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/data.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /.sidebar -->