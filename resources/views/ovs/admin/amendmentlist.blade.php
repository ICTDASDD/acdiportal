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
          <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">assignment</i>
                </div>
                <h4 class="card-title">Amendment List</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: left;  min-width:200px;">Amendment No.</th>
                        <th style="text-align: center  min-width:250px;">Article No.</th>                            
                        <th style="text-align: center">Amendment Details</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: left;">Amendment No.</th>
                        <th style="text-align: center">Article No.</th>                            
                        <th style="text-align: center">Amendment Details</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                      <tr>
                        <td style="text-align: left">01</td>                        
                        <td style="text-align: justify">VII - lorem Ipsum</td>
                        <td style="text-align: justify;" class="text-success"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-info btn-sm">
                              View
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr>
                      
                      <tr>
                        <td style="text-align: left">02</td>                        
                        <td style="text-align: justify">III - lorem Ipsum</td>
                        <td style="text-align: justify;" class="text-success"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-info btn-sm">
                              View
                            </button>
                          </a>
                          <a href="">
                            <button class="btn btn-danger btn-sm">
                              Disable
                            </button>
                          </a>
                        </td>
                      </tr> 

                      

                    </tbody>

                    
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
          <button class="btn btn-success btn-round" data-toggle="modal" data-target="#AddAmendment">
            <i class="material-icons">add</i> Add Amendment
          </button>
          <!-- end col-md-12 -->
        </div>
        <!-- end row -->
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
@include('ovs.admin.layouts.plugins.datatables')
@parent
@endsection
<!--   Script Plugins -->