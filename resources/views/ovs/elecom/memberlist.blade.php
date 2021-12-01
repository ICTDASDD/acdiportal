@extends('ovs.elecom.layouts.app') 

@section('sidebar')
@include('ovs.elecom.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('ovs.elecom.layouts.navbar')
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
                <h4 class="card-title">Branch MIGS List</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: left">SCNO</th>
                        <th style="text-align: left">AFSN</th>                            
                        <th style="text-align: left">Last Name</th>
                        <th style="text-align: left">Given Name</th>
                        <th style="text-align: left">Middle Name</th>
                        <th style="text-align: left">Status</th>
                        <th style="text-align: right">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: left">SCNO</th>
                        <th style="text-align: left">AFSN</th>                            
                        <th style="text-align: left">Last Name</th>
                        <th style="text-align: left">Given Name</th>
                        <th style="text-align: left">Middle Name</th>
                        <th style="text-align: left">Status</th>
                        <th style="text-align: right">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                      <tr>
                        <td style="text-align: left">01-000780</td>
                        <td style="text-align: left">D-734834</td>                            
                        <td style="text-align: left">Dimapilis</td>
                        <td style="text-align: left">Mark Lester</td>                        
                        <td style="text-align: left">Morata</td>                        
                        <td style="text-align: left">--</td>
                        <td style="text-align: right" class="text-success">--</td>                        
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
        
        <!-- end row -->
      </div>
    </div>
    @endsection


    <!--footer -->
    @section('footer')
    @include('ovs.elecom.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('ovs.elecom.layouts.sidefilter')
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
    @include('ovs.elecom.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   Wizard Plugins -->
@section('pageplugin')
@include('ovs.elecom.layouts.plugins.datatables')
@parent
@endsection
<!--   Script Plugins -->