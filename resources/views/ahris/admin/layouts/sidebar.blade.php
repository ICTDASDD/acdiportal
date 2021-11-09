<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
<div class="logo"><a href="{{route('dashboard')}}" class="simple-text logo-mini">
EP
</a>
<a href="{{route('dashboard')}}" class="simple-text logo-normal">
ACDIMPC HRIS
</a></div>
<div class="sidebar-wrapper">
<div class="user">
<div class="photo">
  <img src="{{ asset('material/img/faces/marc.jpg')}}" />
</div>
<div class="user-info">
  <a data-toggle="collapse" href="#collapseExample" class="username">
    <span>
        {{Auth::user()->name}} {{Auth::user()->lname}}
      <b class="caret"></b>
    </span>
  </a>
  <div class="collapse {{ $activeparents == 'Profile' ? ' show' : '' }}" id="collapseExample">
    <ul class="nav">
      <li class="nav-item {{ $title == 'Admin Profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AhrisAdminProfile')}}">
          <span class="sidebar-mini"> MP </span>
          <span class="sidebar-normal"> My Profile </span>
        </a>
      </li>
      <li class="nav-item {{ $title == 'Admin Settings' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AhrisAdminSettings')}}">
          <span class="sidebar-mini"> S </span>
          <span class="sidebar-normal"> Settings </span>
        </a>
      </li>
    </ul>
  </div>
</div>
</div>
<ul class="nav">
  <li class="nav-item {{ $activeparents == 'Dashboard' ? ' active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#dashboardMenu">
      <i class="material-icons">dashboard</i>
      <p> Dashboard
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse {{ $activeparents == 'Dashboard' ? ' show' : '' }}" id="dashboardMenu">
      <ul class="nav">
        <li class="nav-item {{ $title == 'Monitoring' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('dashboard')}}">
            <span class="sidebar-mini"><i class="material-icons">
                analytics
            </i></span>
            <span class="sidebar-normal"> Monitoring </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'Reports' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('AhrisAdminReports')}}">
            <span class="sidebar-mini"><i class="material-icons">
                receipt_long
            </i></span>
            <span class="sidebar-normal"> Reports </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'Freedom Wall' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('AhrisAdminFreedomwall')}}">
            <span class="sidebar-mini"><i class="material-icons">
                question_answer
            </i></span>
            <span class="sidebar-normal"> Freedom Wall </span>
          </a>
        </li>
      </ul>
    </div>
  </li>


  <li class="nav-item {{ $activeparents == 'User' ? ' active' : '' }} user">
  <a class="nav-link" data-toggle="collapse" href="#formsExamples">
    <i class="material-icons">people</i>
    <p> Users
      <b class="caret"></b>
    </p>
  </a>
  <div class="collapse {{ $activeparents == 'User' ? ' show' : '' }}" id="formsExamples">
    <ul class="nav">
        <li class="nav-item {{ $title == 'Active User' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AhrisAdminUsers')}}">
            <span class="sidebar-mini"><i class="material-icons">
               manage_accounts
            </i></span>
          <span class="sidebar-normal"> Active User </span>
        </a>
      </li>
      <li class="nav-item {{ $title == 'Add User' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AhrisAdminAdduser')}}">
            <span class="sidebar-mini"><i class="material-icons">
                person_add
             </i></span>
          <span class="sidebar-normal"> Add User </span>
        </a>
      </li>
      <li class="nav-item {{ $title == 'Access Request' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('AhrisAdminAccessrequest')}}">
            <span class="sidebar-mini"><i class="material-icons">
                person_pin
             </i></span>
          <span class="sidebar-normal"> Access Request </span>
        </a>
      </li>    
    </ul>
  </div>
  </li>

</ul>
</div>


<div class="sidebar-background"></div>
</div>