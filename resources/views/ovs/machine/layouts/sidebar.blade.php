<div class="sidebar ps" data-color="azure" data-background-color="white" data-image="{{ asset('material/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
<div class="logo"><a href="{{route('dashboard')}}" class="simple-text logo-mini">
VM
</a>
<a href="{{route('dashboard')}}" class="simple-text logo-normal">
Voting Machine
</a></div>
<div class="sidebar-wrapper">
    <div class="user">
          <div class="photo">
            <img src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}"  />
          </div>
          <div class="user-info">
                  <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>
                        {{Auth::user()->name}} {{Auth::user()->lname}} (M.O)
                      
                    </span>
                  </a>
                
          </div>
    </div>
    
      <ul class="nav user">
        <li class="nav-item {{ $title == 'Onine Voting System' ? ' active' : '' }}">
          <a  class="nav-link" href="{{route('dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p> Members Login </p>
          </a>
        </li>
      </ul>

     
      <ul class="nav user">
        <li class="nav-item">
          <a  class="nav-link" href="{{ route('logout') }}">
            <i class="material-icons">logout</i>
            <p> Logout</p>
          </a>
        </li>
      </ul>

   




    

</div>


<div class="sidebar-background"></div>
</div>