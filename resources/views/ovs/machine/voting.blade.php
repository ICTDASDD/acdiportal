@extends('ovs.machine.layouts.app') 

@section('sidebar')
@include('ovs.machine.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.machine.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
      <div class="container-fluid">
        <div class="col-md-10 col-12 mr-auto ml-auto">
          <!--      Wizard container        -->
          <div class="wizard-container">
            <div class="card card-wizard" data-color="blue" id="wizardProfile">
              <form action="" method="">
                <!--        You can switch " data-color="primary" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                <div class="card-header text-center">
                  <h3 class="card-title">
                    ACDI-MPC SAGA 2022
                  </h3>
                  <h5 class="card-description">Welcome, {{Auth::user()->name}} {{Auth::user()->lname}} of {{Auth::user()->brCode}} (AFSN)</h5>
                </div>
                <div class="wizard-navigation">
                  <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" href="#candidate" data-toggle="tab" role="tab">
                        Board of Director
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#committee" data-toggle="tab" role="tab">
                        Committee
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                        Elecom Officer
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#address" data-toggle="tab" role="tab">
                        Amendments
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">

                  <div class="tab-content">

                    <!-- candidate -->
                    <div class="tab-pane active" id="candidate">
                      <h5 class="info-text"> Select (7) Board of Directors</h5>
                      <br>
                      <div class="row justify-content-center">
                        
                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #4caf50;">
                            <div class="card-avatar" style="border:4px solid #4caf50; background-color:#4caf50; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves...
                              </p>
                              <button class="btn btn-success  btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>                        

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999; width:250px;">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                    <!-- comittee -->
                    <div class="tab-pane" id="committee">
                      <h5 class="info-text"> What are you doing? (checkboxes) </h5>
                      <div class="row justify-content-center">
                        
                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #4caf50;">
                            <div class="card-avatar" style="border:4px solid #4caf50; background-color:#4caf50">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves...
                              </p>
                              <button class="btn btn-success  btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>                        

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="card card-profile" style="border:4px solid #999999;">
                            <div class="card-avatar" style="border:4px solid #999999; background-color:#999999">
                              <a href="#pablo">
                                <img class="img" src="{{ asset('material/img/user/') . '/'. Auth::user()->avatar}}" >
                              </a>
                            </div>
                            <div class="card-body">
                              <h4 class="card-title">Alec Thompson</h4>
                              <p class="card-description">
                                Don't be scared of the truth because we need to restart the human foundation in truth And I love you like the back is...
                              </p>
                              <button class="btn btn-default btn-round">
                                <i class="material-icons">star</i> VOTE
                              </button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="tab-pane" id="address">
                      <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <h5 class="info-text"> Are you living in a nice area? </h5>
                        </div>
                        <div class="col-sm-7">
                          <div class="form-group">
                            <label>Street Name</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label>Street No.</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-5">
                          <div class="form-group select-wizard">
                            <label>Country</label>
                            <select class="selectpicker" data-size="7" data-style="select-with-transition" title="Single Select">
                              <option value="Afghanistan"> Afghanistan </option>
                              <option value="Albania"> Albania </option>
                              <option value="Algeria"> Algeria </option>
                              <option value="American Samoa"> American Samoa </option>
                              <option value="Andorra"> Andorra </option>
                              <option value="Angola"> Angola </option>
                              <option value="Anguilla"> Anguilla </option>
                              <option value="Antarctica"> Antarctica </option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="mr-auto">
                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Previous">
                  </div>
                  <div class="ml-auto">
                    <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Next">
                    <input type="button" class="btn btn-finish btn-fill btn-rose btn-wd" name="finish" value="Finish" style="display: none;">
                  </div>
                  <div class="clearfix"></div>
                </div>
              </form>
            </div>
          </div>
          <!-- wizard container -->
        </div>
      </div>
    </div>
    @endsection



<!--side filter -->
@section('sidefilter')
@include('ovs.machine.layouts.sidefilter')
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
@include('ovs.machine.layouts.plugins.adminplugin')
@parent
@endsection
<!--   Script Plugins -->

<!--   Wizard Plugins -->
@section('pageplugin')
@include('ovs.machine.layouts.wizard')
@parent
@endsection
<!--   Script Plugins -->