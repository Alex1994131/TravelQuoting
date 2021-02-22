<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-brand-center @if($configData['navbarBgColor'] !== 'bg-white' )) {{$configData['navbarBgColor']}} @else {{'bg-primary'}} @endif
@if($configData['navbarType'] === 'navbar-static') {{'navbar-static-top'}} @else {{'fixed-top'}} @endif
@if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif">
  <div class="navbar-header d-xl-block d-none d-flex" style = "position: static; margin-left: 50px;">
    <ul class="nav navbar-nav flex-row">
      <li class="nav-item">
      <a class="navbar-brand" href="{{asset('/')}}">
          <div class="brand-logo">
          <img src="{{asset('images/logo/logo-light.png')}}" class="logo" alt="">
          </div>
          <h2 class="brand-text mb-0">
            @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
            {{$configData['templateTitle']}}
            @else
            Travel Quoting
            @endif
          </h2>
        </a>
      </li>
    </ul>
  </div>
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

        </div>
        <ul class="nav navbar-nav float-right d-flex align-items-center">
          <li class="dropdown dropdown-language nav-item"><a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language d-lg-inline d-none">English</span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">
                <i class="flag-icon flag-icon-us mr-50"></i>English
              </a>
              <a class="dropdown-item" href="{{url('lang/fr')}}" data-language="fr">
                <i class="flag-icon flag-icon-fr mr-50"></i>French
              </a>
              <a class="dropdown-item" href="{{url('lang/de')}}" data-language="de">
                <i class="flag-icon flag-icon-de mr-50"></i>German
              </a>
              <a class="dropdown-item" href="{{url('lang/pt')}}" data-language="pt">
                <i class="flag-icon flag-icon-pt mr-50"></i>Portuguese
              </a>
            </div>
          </li>
          <li class="dropdown dropdown-notification nav-item">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
              <i class="ficon bx bx-bell bx-tada bx-flip-horizontal"></i>
              <span class="badge badge-pill badge-danger badge-up">5</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <div class="dropdown-header px-1 py-75 d-flex justify-content-between">
                  <span class="notification-title">7 new Notification</span>
                  <span class="text-bold-400 cursor-pointer">Mark all as read</span>
                </div>
              </li>
              <li class="scrollable-container media-list">
                <a class="d-flex justify-content-between" href="javascript:void(0)">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-11.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Congratulate Socrates Itumay</span> for work anniversaries</h6><small class="notification-text">Mar 15 12:32pm</small>
                    </div>
                  </div>
                </a>
                <div class="d-flex justify-content-between read-notification cursor-pointer">
                    <div class="media d-flex align-items-center">
                      <div class="media-left pr-0">
                        <div class="avatar mr-1 m-0">
                          <img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" alt="avatar" height="39" width="39">
                        </div>
                      </div>
                      <div class="media-body">
                        <h6 class="media-heading"><span class="text-bold-500">New Message</span> received</h6>
                        <small class="notification-text">You have 18 unread messages</small>
                      </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center py-0">
                    <div class="media-left pr-0">
                      <img class="mr-1" src="{{asset('images/icon/sketch-mac-icon.png')}}" alt="avatar" height="39" width="39">
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Updates Available</span></h6>
                      <small class="notification-text">Sketch 50.2 is currently newly added</small>
                    </div>
                    <div class="media-right pl-0">
                      <div class="row border-left text-center">
                        <div class="col-12 px-50 py-75 border-bottom">
                          <h6 class="media-heading text-bold-500 mb-0">Update</h6>
                        </div>
                        <div class="col-12 px-50 py-75">
                          <h6 class="media-heading mb-0">Close</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-primary bg-lighten-5 mr-1 m-0 p-25"><span class="avatar-content text-primary font-medium-2">LD</span></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New customer</span> is registered</h6><small class="notification-text">1 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="cursor-pointer">
                    <div class="media d-flex align-items-center justify-content-between">
                      <div class="media-left pr-0">
                        <div class="media-body">
                          <h6 class="media-heading">New Offers</h6>
                        </div>
                      </div>
                      <div class="media-right">
                        <div class="custom-control custom-switch">
                          <input class="custom-control-input" type="checkbox" checked id="notificationSwtich">
                          <label class="custom-control-label" for="notificationSwtich"></label>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-danger bg-lighten-5 mr-1 m-0 p-25">
                        <span class="avatar-content"><i class="bx bxs-heart text-danger"></i></span>
                      </div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Application</span> has been approved</h6>
                      <small class="notification-text">6 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between read-notification cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-4.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New file</span> has been uploaded</h6>
                      <small class="notification-text">4 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center">
                    <div class="media-left pr-0">
                      <div class="avatar bg-rgba-danger m-0 mr-1 p-25">
                        <div class="avatar-content"><i class="bx bx-detail text-danger"></i></div>
                      </div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">Finance report</span> has been generated</h6>
                      <small class="notification-text">25 hrs ago</small>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-between cursor-pointer">
                  <div class="media d-flex align-items-center border-0">
                    <div class="media-left pr-0">
                      <div class="avatar mr-1 m-0"><img src="{{asset('images/portrait/small/avatar-s-16.jpg')}}" alt="avatar" height="39" width="39"></div>
                    </div>
                    <div class="media-body">
                      <h6 class="media-heading"><span class="text-bold-500">New customer</span> comment recieved</h6>
                      <small class="notification-text">2 days ago</small>
                    </div>
                  </div>
                </div>
              </li>
              <li class="dropdown-menu-footer">
                <a class="dropdown-item p-50 text-primary justify-content-center" href="javascript:void(0)">Read all notifications</a>
              </li>
            </ul>
          </li>
          <li class="dropdown dropdown-user nav-item" id="mydrop">
            <a class="dropdown-toggle nav-link dropdown-user-link dropdown" href="#" data-toggle="dropdown">
              <div class="user-nav d-lg-flex d-none">
                <span class="user-name">{{Auth::user()->name}}</span>
                <!-- <span class="user-status">Available</span> -->
              </div>
              @if(Auth::user()->get_account_info->avatar_path)
              <span><img class="round" src="{{asset(Auth::user()->get_account_info->avatar_path)}}" alt="avatar" height="40" width="40"></span>
              @else
              <span><img class="round" src="{{asset('assets/img/avatar.png')}}" alt="avatar" height="40" width="40"></span>
              @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a class="dropdown-item" href="../user_profile"><i class="bx bx-user mr-50"></i> Edit Profile</a>
              <a class="dropdown-item" href="{{asset('app-email')}}"><i class="bx bx-envelope mr-50"></i> My Inbox</a>
              <a class="dropdown-item" href="{{asset('app-todo')}}"><i class="bx bx-check-square mr-50"></i> Task</a>
              <a class="dropdown-item" href="{{asset('app-chat')}}"><i class="bx bx-message mr-50"></i> Chats</a>
              <div class="dropdown-divider mb-0"></div>
              <form id="logout-form" name="logout-form" action="{{ route('logout') }}" method="post" style="display:none;">
                @csrf
              </form>
              <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bx bx-power-off mr-50"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>