<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @can('project-list')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('projects.index')}}" class="nav-link">DỰ ÁN</a>
      </li>
      @endcan
      @can('job-list')
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('jobs.index')}}" class="nav-link">CÔNG VIỆC</a>
      </li>
      @endcan
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <div class="dropdown">
          <button class="dropbtn">ỨNG VIÊN</button>
          <div class="dropdown-content">
            <a href="{{route('candidates.index')}}">Danh sách ứng viên</a>
            <a href="{{route('applied')}}">Danh sách ứng viên đã ứng tuyển</a>
            <a href="#">Link 3</a>
          </div>
        </div>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <ul class="dropdown">
          <button class="dropbtn">ỨNG VIÊN</button>
          <div class="dropdown-content">
            <li class="dropdown-submenu">
              <a class="test" href="{{route('candidates.index')}}">Danh sách ứng viên<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="test"><a tabindex="-1" href="{{route('applied')}}">Danh sách ứng viên đã ứng tuyển</a></li>
                <!-- <li class="test"><a tabindex="-1" href="">aaa</a></li> -->
                <!-- <li class="dropdown-submenu">
                  <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">3rd level dropdown</a></li>
                    <li><a href="#">3rd level dropdown</a></li>
                  </ul>
                </li> -->
              </ul>
            </li>
            <li class="test"><a tabindex="-1" href="{{route('cv.index')}}">Danh sách cv</a></li>
            <!-- <li class="test"><a tabindex="-1" href="#">CSS</a></li> -->
          </div>
        </ul> 
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('recruitment')}}" class="nav-link">TUYỂN DỤNG</a>
      </li>
    </ul>

    <!-- <div class="dropdown">
      <button class="dropbtn">Dropdown</button>
      <div class="dropdown-content">
        <a href="#">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
      </div>
    </div> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        @if(Auth::check())
        <!-- Sidebar user (optional) -->
        <div class="user-panel d-flex">
          <div class="image">
            <img src="{{URL::asset('upload/avatar/'.Auth::user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
          </div>
        </div>
        @endif
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          @if(Auth::check())
            {{Auth::user()->username}}
          @endif
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Tùy chọn</span>
          <div class="dropdown-divider"></div>
          <a href="{{route('profile')}}" class="dropdown-item">
            <i class="fas fa-id-card-alt"></i> Cài đặt thông tin
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <i class="fas fa-sign-out-alt"></i>  Đăng xuất
          </a>
        </div>
      </li>
      
      
    </ul>
</nav>
<!-- /.navbar -->