@extends('layouts.applayouts.sa_app') 

@section('sidebar')
@include('layouts.salayout.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('layouts.salayout.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">people</i>
                  </div>
                  <h4 class="card-title">Registered Admin</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Person In-charge</th>
                          <th>Role</th>
                          <th class="text-right">Last Active</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1-653</td>
                          <td>Mark Lester Dimapilis</td>
                          <td>Administrator</td>
                          <td class="text-right">April 21, 2021</td>
                          <td class="td-actions text-right">
                            <button type="button" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">person</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </button>
                            <button type="button" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">close</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                            <td class="text-center">1-653</td>
                            <td>Mark Lester Dimapilis</td>
                            <td>Acccess Admin</td>
                            <td class="text-right">April 21, 2021</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td class="text-center">1-653</td>
                            <td>Mark Lester Dimapilis</td>
                            <td>Benifits Admin</td>
                            <td class="text-right">April 21, 2021</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">person</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">manage_accounts</i>
                  </div>
                  <h4 class="card-title">Registered Emp User</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th></th>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Qty</th>
                          <th class="text-right">Price</th>
                          <th class="text-right">Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center">1</td>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                          <td>Moleskine Agenda</td>
                          <td>Office</td>
                          <td>25</td>
                          <td class="text-right">&euro; 49</td>
                          <td class="text-right">&euro; 1,225</td>
                        </tr>
                        <tr>
                          <td class="text-center">2</td>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                          <td>Stabilo Pen</td>
                          <td>Office</td>
                          <td>30</td>
                          <td class="text-right">&euro; 10</td>
                          <td class="text-right">&euro; 300</td>
                        </tr>
                        <tr>
                          <td class="text-center">3</td>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="" checked>
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                          <td>A4 Paper Pack</td>
                          <td>Office</td>
                          <td>50</td>
                          <td class="text-right">&euro; 10.99</td>
                          <td class="text-right">&euro; 109</td>
                        </tr>
                        <tr>
                          <td class="text-center">4</td>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                          <td>Apple iPad</td>
                          <td>Meeting</td>
                          <td>10</td>
                          <td class="text-right">&euro; 499.00</td>
                          <td class="text-right">&euro; 4,990</td>
                        </tr>
                        <tr>
                          <td class="text-center">5</td>
                          <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                          <td>Apple iPhone</td>
                          <td>Communication</td>
                          <td>10</td>
                          <td class="text-right">&euro; 599.00</td>
                          <td class="text-right">&euro; 5,999</td>
                        </tr>
                        <tr>
                          <td colspan="5"></td>
                          <td class="td-total">
                            Total
                          </td>
                          <td class="td-price">
                            <small>&euro;</small>12,999
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Shopping Cart Table</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-shopping">
                      <thead>
                        <tr>
                          <th class="text-center"></th>
                          <th>Product</th>
                          <th class="th-description">Color</th>
                          <th class="th-description">Size</th>
                          <th class="text-right">Price</th>
                          <th class="text-right">Qty</th>
                          <th class="text-right">Amount</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="img-container">
                              <img src="../../assets/img/product1.jpg" alt="...">
                            </div>
                          </td>
                          <td class="td-name">
                            <a href="#jacket">Spring Jacket</a>
                            <br />
                            <small>by Dolce&Gabbana</small>
                          </td>
                          <td>
                            Red
                          </td>
                          <td>
                            M
                          </td>
                          <td class="td-number text-right">
                            <small>&euro;</small>549
                          </td>
                          <td class="td-number">
                            1
                            <div class="btn-group btn-group-sm">
                              <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                              <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                            </div>
                          </td>
                          <td class="td-number">
                            <small>&euro;</small>549
                          </td>
                          <td class="td-actions">
                            <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                              <i class="material-icons">close</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="img-container">
                              <img src="../../assets/img/product2.jpg" alt="..." />
                            </div>
                          </td>
                          <td class="td-name">
                            <a href="#pants">Short Pants</a>
                            <br />
                            <small>by Pucci</small>
                          </td>
                          <td>
                            Purple
                          </td>
                          <td>
                            M
                          </td>
                          <td class="td-number">
                            <small>&euro;</small>499
                          </td>
                          <td class="td-number">
                            2
                            <div class="btn-group btn-group-sm">
                              <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                              <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                            </div>
                          </td>
                          <td class="td-number">
                            <small>&euro;</small>998
                          </td>
                          <td class="td-actions">
                            <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                              <i class="material-icons">close</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <div class="img-container">
                              <img src="../../assets/img/product3.jpg" alt="...">
                            </div>
                          </td>
                          <td class="td-name">
                            <a href="#nothing">Pencil Skirt</a>
                            <br />
                            <small>by Valentino</small>
                          </td>
                          <td>
                            White
                          </td>
                          <td>
                            XL
                          </td>
                          <td class="td-number">
                            <small>&euro;</small>799
                          </td>
                          <td class="td-number">
                            1
                            <div class="btn-group btn-group-sm">
                              <button class="btn btn-round btn-info"> <i class="material-icons">remove</i> </button>
                              <button class="btn btn-round btn-info"> <i class="material-icons">add</i> </button>
                            </div>
                          </td>
                          <td class="td-number">
                            <small>&euro;</small>799
                          </td>
                          <td class="td-actions">
                            <button type="button" rel="tooltip" data-placement="left" title="Remove item" class="btn btn-link">
                              <i class="material-icons">close</i>
                            </button>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="5"></td>
                          <td class="td-total">
                            Total
                          </td>
                          <td colspan="1" class="td-price">
                            <small>&euro;</small>2,346
                          </td>
                          <td></td>
                        </tr>
                        <tr>
                          <td colspan="6"></td>
                          <td colspan="2" class="text-right">
                            <button type="button" class="btn btn-info btn-round">Complete Purchase <i class="material-icons">keyboard_arrow_right</i></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('layouts.salayout.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('layouts.salayout.sidefilter')
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
    @include('layouts.salayout.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   Wizard Plugins -->
@section('pageplugin')
@include('layouts.salayout.wizard')
@parent
@endsection
<!--   Script Plugins -->