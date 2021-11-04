@extends('ahris.access.layouts.app') 

@section('sidebar')
@include('ahris.access.layouts.sidebar')
@parent
@endsection


     <!-- Navbar -->
     @section('navbar')
     @include('ahris.access.layouts.navbar')
     @parent
     @endsection
     <!-- End Navbar -->

    @section('main-content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                  <i class="material-icons">perm_identity</i>
                </div>
                <h4 class="card-title">Person In Charge
                  
                </h4>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">EMP-ID</label>
                        <input type="text" class="form-control" value="{{Auth::user()->emp_id}}" disabled>
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" value="{{Auth::user()->name}} {{Auth::user()->lname}}" disable>
                        </div>
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Department</label>
                        <input type="text" class="form-control" value="ICTD" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Section</label>
                        <input type="text" class="form-control" value="Application Software Development Department" disabled>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="bmd-label-floating">Position</label>
                        <input type="text" class="form-control" value="Sr. Web Developer" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About the admin</label>
                        <div class="form-group">
                          <label class="bmd-label-floating">Super Admin is temporarily assigned by the developer of the WebApp.</label>
                          <textarea class="form-control" rows="5" disabled></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-rose pull-right">Turnover</button>
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="#">
                  <img class="img" src="{{ asset('material/img/faces/marc.jpg')}}"  />
                </a>
              </div>
              <div class="card-body">
                <h6 class="card-category text-gray">AHRIS ACCESS MANAGER</h6>
                <h4 class="card-title"> {{Auth::user()->name}} {{Auth::user()->lname}}</h4>
                <p class="card-description">
                  Super Administrator is responsible for assigning administrator access and role for each webapp. Generaly it controls and monitor active administrator in the system.
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('ahris.access.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ahris.access.layouts.sidefilter')
    @parent
    @endsection
    <!-- side filter -->

    <!--   Core JS Files   -->
    @section('corejs')
    @include('layouts.corejs')
    @parent
    @endsection
<!--   Core JS Files   -->

<!--   Script Plugins -->
    @section('adminplugin')
    @include('ahris.access.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->