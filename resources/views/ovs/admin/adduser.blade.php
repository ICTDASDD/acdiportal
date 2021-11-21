@extends('ovs.admin.layouts.app') 

@section('sidebar')
@include('ovs.admin.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.admin.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">login</i>
                </div>
                <h4 class="card-title">Login Info</h4>
              </div>
              <div class="card-body ">
                <form method="#" action="#">
                  <div class="form-group bmd-form-group">
                    <label for="Email" class="bmd-label-floating">Email Address</label>
                    <input type="email" class="form-control" id="">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="Pass" class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" id="">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="RePass" class="bmd-label-floating">Re-Type Password</label>
                    <input type="password" class="form-control" id="">
                  </div>
                  
                </form>
              </div>              
            </div>
          </div>

          <div class="col-md-6">
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">face</i>
                </div>
                <h4 class="card-title">User Information</h4>
              </div>
              <div class="card-body ">
                <form method="#" action="#">
                  <div class="form-group bmd-form-group">
                    <label for="gname" class="bmd-label-floating">Given Name</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="gname" class="bmd-label-floating">Family Name</label>
                    <input type="text" class="form-control" id="">
                  </div>
                  <div class="form-group bmd-form-group">
                    <label for="" class="bmd-label-floating">Middle Name</label>
                    <input type="text" class="form-control" id="examplePass">
                  </div>
                  
                </form>
              </div>              
            </div>
          </div>

          <div class="col-md-4">
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">maps_home_work</i>
                </div>
                <h4 class="card-title">Branch of Operation / User Type</h4>
              </div>
              <div class="card-body ">
                <form method="#" action="#">
                 
                  <div class="dropdown bootstrap-select dropup col-md-6">
                    <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Select Branch" tabindex="-98">
                    <option disabled="" value="">get data from db</option>
                  </select>
                  </div>

                  <div class="dropdown bootstrap-select dropup">
                    <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Select" tabindex="-98">
                    <option value="">Administrator</option>
                    <option value="">Branch Admin</option>
                    <option value="">Canv. Officer</option>
                    <option value="">Elecom Admin</option>
                    <option value="">Gen. Monitoring</option>
                  </select>
                  </div>
                  
                </form>
              </div>              
            </div>
          </div>

          <div class="col-md-4">
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">verified</i>
                </div>
                <h4 class="card-title">Active on Registration</h4>
              </div>
              <div class="card-body ">
                <form method="#" action="#">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-3 mx-auto">
                    
                    <div class="dropdown bootstrap-select dropup">
                      <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Action" tabindex="-98">
                      <option value="">Enable</option>
                      <option value="">Disable</option>
                    </select>
                  </div>
                </div>
              </div>
                </form>
              </div>              
            </div>
          </div>



          <div class="col-md-2">
            <div class="row">
            <div class="card ">
              <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">face</i>
                </div>
                <h4 class="card-title"></h4>
              </div>
              <div class="card-body col-lg-8 col-md-2 col-sm-4 mx-auto">
                <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="{{ asset('material/img/placeholder.jpg')}}"  alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file">
                      <span class="fileinput-new">Add Photo</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="hidden" value="" name="..."><input type="file" name="">
                    <div class="ripple-container"></div></span>
                    <br>
                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 59.0156px; top: 31.6094px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                  </div>
                </div>
                </form>
              </div>              
            </div>
          </div>
          </div>

          <div class="col-md-2">
            <div class="card ">
              <div class="card-body ">
                <form method="#" action="#">
                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 mx-auto">
                    
                    <button class="btn btn-success">
                      <span class="btn-label">
                        <i class="material-icons">check</i>
                      </span>
                      Submit
                    </button>
                    
                  </div>
                </div>
              </div>
                </form>
              </div>              
            </div>
          </div>

          

          
          
          
          
        </div>
      </div>
    </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('ovs.admin.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.admin.layouts.sidefilter')
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
    @include('ovs.admin.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   Wizard Plugins -->
@section('pageplugin')
@include('ovs.admin.layouts.wizard')
@parent
@endsection
<!--   Script Plugins -->