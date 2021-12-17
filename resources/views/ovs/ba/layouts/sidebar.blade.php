<div class="sidebar" data-color="azure" data-background-color="white" data-image="{{ asset('material/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
<div class="logo"><a href="{{route('dashboard')}}" class="simple-text logo-mini">
EP
</a>
<a href="{{route('dashboard')}}" class="simple-text logo-normal">
ACDIMPC OVS
</a></div>
<div class="sidebar-wrapper">
<div class="user">
<div class="photo">
  <img src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}"  />
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
        <a class="nav-link" href="{{route('BAprofile.layout')}}">
          <span class="sidebar-mini"> MP </span>
          <span class="sidebar-normal"> My Profile </span>
        </a>
      </li>
      <li class="nav-item {{ $title == 'Admin Settings' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('BAsetting.layout')}}">
          <span class="sidebar-mini"> S </span>
          <span class="sidebar-normal"> Settings </span>
        </a>
      </li>
    </ul>
  </div>
</div>
</div>
<ul class="nav">

  <li class="nav-item {{ $title == 'Dashboard' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('dashboard')}}">
      <i class="material-icons">dashboard</i>
      <p> Dashboard </p>
    </a>
  </li>

  <li class="nav-item {{ $title == 'General Request' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('BArequest.layout')}}">
      <i class="material-icons">question_answer</i>
      <p> Request</p>
    </a>
  </li>

  <!--
  <li class="nav-item {{ $title == 'User List' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('BAusers.layout')}}">
      <i class="material-icons">people</i>
      <p> Users </p>
    </a>
  </li>
-->

  <hr>

  <li class="nav-item {{ $title == 'Voting Member List' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('BAmemlist.layout')}}">
      <i class="material-icons">list</i>
      <p class="small"> Registration </p>
    </a>
  </li>


</ul>
</div>


<div class="sidebar-background"></div>
</div>