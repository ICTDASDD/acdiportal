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
  <img src="{{ asset('material/img/faces/ict.jpg')}}" />
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
        <a class="nav-link" href="{{route('OVSAdminProfile')}}">
          <span class="sidebar-mini"> MP </span>
          <span class="sidebar-normal"> My Profile </span>
        </a>
      </li>
      <li class="nav-item {{ $title == 'Admin Settings' ? ' active' : '' }}">
        <a class="nav-link" href="{{route('OVSAdminSettings')}}">
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

  <li class="nav-item {{ $activeparents == 'Monitoring' ? ' active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#dashboardMenu">
      <i class="material-icons">visibility</i>
      <p> Monitoring
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse {{ $activeparents == 'Monitoring' ? ' show' : '' }}" id="dashboardMenu">
      <ul class="nav">
        <li class="nav-item {{ $title == 'Branch Status' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminBstatus')}}">
            <span class="sidebar-mini"><i class="material-icons">
                analytics
            </i></span>
            <span class="sidebar-normal"> Branch Status </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'System Log' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminSystemLog')}}">
            <span class="sidebar-mini"><i class="material-icons">
                receipt_long
            </i></span>
            <span class="sidebar-normal"> System Log</span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'General Request' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminRequest')}}">
            <span class="sidebar-mini"><i class="material-icons">
                question_answer
            </i></span>
            <span class="sidebar-normal"> Request </span>
          </a>
        </li>
      </ul>
    </div>
  </li>
  
  <li class="nav-item {{ $title == 'User List' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('users.layout')}}">
      <i class="material-icons">people</i>
      <p> Users </p>
    </a>
  </li>

  <li class="nav-item {{ $activeparents == 'BODs & Amendments' ? ' active' : '' }} user">
    <a class="nav-link" data-toggle="collapse" href="#forBODAmend">
      <i class="material-icons">groups</i>
      <p> BODs & Amendments
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse {{ $activeparents == 'BODs & Amendments' ? ' show' : '' }}" id="forBODAmend">
      <ul class="nav">
          <li class="nav-item {{ $title == 'Candidate List' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('candidate.layout')}}">
              <span class="sidebar-mini"><i class="material-icons">
                manage_accounts
              </i></span>
            <span class="sidebar-normal"> Candidate List </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'Amendment List' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminAmendmentList')}}">
              <span class="sidebar-mini"><i class="material-icons">
                ballot
              </i></span>
            <span class="sidebar-normal"> Amendment List </span>
          </a>
        </li> 
      </ul>
    </div>
  </li>

  <li class="nav-item {{ $activeparents == 'Voting Tools' ? ' active' : '' }}">
    <a class="nav-link" data-toggle="collapse" href="#forVotingTolls">
      <i class="material-icons">settings_suggest</i>
      <p> Voting Tools
        <b class="caret"></b>
      </p>
    </a>
    <div class="collapse {{ $activeparents == 'Voting Tools' ? ' show' : '' }}" id="forVotingTolls">
      <ul class="nav">
          <li class="nav-item {{ $title == 'Branch Blocking' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminBranchBlocking')}}">
              <span class="sidebar-mini"><i class="material-icons">
                lock
              </i></span>
            <span class="sidebar-normal"> Branch Locking </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'Entry Blocking' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('OVSAdminEntryBlocking')}}">
              <span class="sidebar-mini"><i class="material-icons">
                block
              </i></span>
            <span class="sidebar-normal"> Entry Blocking </span>
          </a>
        </li>
        <li class="nav-item {{ $title == 'Voting Configuration' ? ' active' : '' }}">
          <a class="nav-link" href="{{route('votingConfiguration.layout')}}">
              <span class="sidebar-mini"><i class="material-icons">
                checklist_rtl
              </i></span>
            <span class="sidebar-normal"> Voting Configuration</span>
          </a>
        </li>  
      </ul>
    </div>
  </li>

  <hr>

  <li class="nav-item {{ $title == 'Voting Member List' ? ' active' : '' }}">
    <a  class="nav-link" href="{{route('OVSAdminMemberList')}}">
      <i class="material-icons">list</i>
      <p class="text-danger"> Voting Member List</p>
    </a>
  </li>


</ul>
</div>


<div class="sidebar-background"></div>
</div>