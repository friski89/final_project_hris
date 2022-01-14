<div class="page-main-header">
  <div class="main-header-right row m-0">
    <div class="main-header-left">
      <div class="logo-wrapper"><a href="{{ route('home') }}"><img class="img-fluid" style="height: 40px;" src="{{asset('assets/images/logo.png')}}" alt=""></a></div>
      <div class="dark-logo-wrapper"><a href="{{ route('home') }}"><img class="img-fluid" style="height: 40px;" src="{{asset('assets/images/logo.png')}}" alt=""></a></div>
      @can('roles', 'admin')
          <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="align-center" id="sidebar-toggle">    </i></div>
      @endcan
    </div>
    <div class="left-menu-header col">
      <ul>
        <li>
          <form class="form-inline search-form">
            <div class="search-bg"><i class="fa fa-search"></i>
              <input class="form-control-plaintext" placeholder="Search here.....">
            </div>
          </form>
          <span class="d-sm-none mobile-search search-bg"><i class="fa fa-search"></i></span>
        </li>
      </ul>
    </div>
    <div class="nav-right col pull-right right-menu p-0">
      <ul class="nav-menus">
        <li><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
        <li class="onhover-dropdown">
          <div class="notification-box"><i data-feather="bell"></i><span class="dot-animated"></span></div>
          <ul class="notification-dropdown onhover-show-div">
            <li>
              <p class="f-w-700 mb-0">You have Notifications<span class="pull-right badge badge-primary badge-pill">{{ $employees->count() }}</span></p>
            </li>
            {{-- <li class="noti-primary">
              <div class="media">
                <span class="notification-bg bg-light-primary"><i data-feather="activity"> </i></span>
                <div class="media-body">
                  <p>Delivery processing </p>
                  <span>10 minutes ago</span>
                </div>
              </div>
            </li>
            <li class="noti-secondary">
              <div class="media">
                <span class="notification-bg bg-light-secondary"><i data-feather="check-circle"> </i></span>
                <div class="media-body">
                  <p>Order Complete</p>
                  <span>1 hour ago</span>
                </div>
              </div>
            </li>
            <li class="noti-success">
              <div class="media">
                <span class="notification-bg bg-light-success"><i data-feather="file-text"> </i></span>
                <div class="media-body">
                  <p>Tickets Generated</p>
                  <span>3 hour ago</span>
                </div>
              </div>
            </li> --}}
            @can('employeeExpired')

                    <li class="noti-danger">
                        <a href="{{ route('employeeExpired.index') }}">
                        <div class="media">
                            <span class="notification-bg bg-light-danger"><i data-feather="user-check"> </i></span>
                            <div class="media-body">
                            <p>Karyawan Habis Kontrak</p>
                            <span>{{ $employees->count() }}</span>
                            </div>
                        </div>
                        </a>
                    </li>

            @endcan

          </ul>
        </li>
        <li class="onhover-dropdown p-0">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();"  class="btn btn-primary-light" type="button"><i data-feather="log-out"></i>{{ __('Logout') }}</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
      </ul>
    </div>
    <div class="d-lg-none mobile-toggle pull-right w-auto"><i data-feather="more-horizontal"></i></div>
  </div>
</div>
