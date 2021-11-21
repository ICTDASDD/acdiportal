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
                <h4 class="card-title">Candidate for SAGA 2022</h4>
              </div>
              <div class="card-body">
                <div class="toolbar">
                  <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="material-datatables">
                  <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>
                        <th style="text-align: center">Candidate for</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </thead>

                    <tfoot>
                      <tr>
                        <th style="text-align: center">Picture</th>
                        <th style="text-align: center">Name</th>
                        <th style="text-align: center">Information 1</th>                            
                        <th style="text-align: center">Information 2</th>
                        <th style="text-align: center">Candidate for</th>
                        <th style="text-align: right; max-width:250px;">Action</th>
                      </tr>
                    </tfoot>

                    <tbody>

                      <tr>
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. One (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Two (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate3.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Three (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate4.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Four (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate5.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Five (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate6.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Six (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate7.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Seven (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate8.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Eight (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-success">Board of Director</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate1.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. One (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-info">Committee</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
                        <td style="text-align: center" ><img src="{{ asset('material/img/candidate/candidate2.jpg')}}" style="max-width: 50px;"/></td>
                        <td style="text-align: center">BGEN Candidate N. Two (RET)</td>                            
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center">Lorem Ipsum 123</td>
                        <td style="text-align: center" class="text-info">Committee</td>
                        <td style="text-align: right; max-width:250px;">
                          <a href="">
                            <button class="btn btn-success btn-sm">
                              Update
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
            <button class="btn btn-success btn-round" data-toggle="modal" data-target="#AddCandidate">
              <i class="material-icons">add</i> Add Candidate
            </button>


            <div class="modal fade" id="AddCandidate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">              
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title text-info">Information of Candidate</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="#" action="#">

                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 mx-auto">
                          <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Candidating for">
                            <option value="" class="text-success">Board of Director</option>
                            <option value="" class="text-info">Committee</option>
                          </select>
                        </div>
                      </div>
                      
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <input class="form-control" type="text" name="Fullname" placeholder="Full name of Candidate (ex. Surname, Given Name M.I)" required="true" />
                            </div>
                          </div>
                          <label class="col-sm-3 label-on-right">
                          </label>
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <input class="form-control" type="text" name="info1" placeholder="Information 1" required="true" />
                          </div>
                        </div>
                        <label class="col-sm-3 label-on-right">
                        </label>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="info2" placeholder="Information 2" required="true" />
                        </div>
                      </div>
                      <label class="col-sm-3 label-on-right">
                      </label>
                  </div>


                      <div class="row">
                        
                      </div>
                      <div class="card-body col-lg-5 mx-auto">
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
                      </div> 
                                            
                    </form>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-success">  Submit </button> &nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
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