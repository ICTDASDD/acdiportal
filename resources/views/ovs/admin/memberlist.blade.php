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
                <h4 class="card-title">DataTables.net</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch Registered</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCCNO</th>
                        <th style="text-align: center">PIN</th>
                        <th style="text-align: center">PASSCODE</th>
                        <th style="text-align: center">Voted</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: left">Name</th>
                        <th style="text-align: center">Branch Registered</th>                            
                        <th style="text-align: center">AFSN</th>
                        <th style="text-align: center">SCCNO</th>
                        <th style="text-align: center">PIN</th>
                        <th style="text-align: center">PASSCODE</th>
                        <th style="text-align: center">Voted</th>
                      </tr>
                    </tfoot>

                    <tbody>

                      <tr>
                        <td style="text-align: left">Aron Rocillo</td>
                        <td style="text-align: center">Fort Bonifacio</td>                            
                        <td style="text-align: center">*-***********</td>
                        <td style="text-align: center">*-***********</td>                        
                        <td style="text-align: center">****</td>                        
                        <td style="text-align: center">******</td>
                        <td style="text-align: center" class="text-success">Yes</td>                        
                      </tr> 

                      <tr>
                        <td style="text-align: left">Mark Lester Dimapilis</td>
                        <td style="text-align: center">GHQ</td>                            
                        <td style="text-align: center">*-***********</td>
                        <td style="text-align: center">*-***********</td>                        
                        <td style="text-align: center">****</td>                        
                        <td style="text-align: center">******</td>
                        <td style="text-align: center" class="text-warning">No</td>                        
                      </tr> 

                    </tbody>

                    
                  </table>
                </div>
              </div>
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
          <!-- end col-md-12 -->
        </div>
        <button class="btn btn-danger btn-round" data-toggle="modal" data-target="#AddCandidate">
          <i class="material-icons">add</i> Late Registration Form
        </button>
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