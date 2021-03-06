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
        <div class="content">
          <div class="container-fluid">
            
            
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">weekend</i>
                    </div>
                    <p class="card-category">ACTIVE USER</p>
                    <h3 class="card-title">3</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons text-danger">warning</i>
                      <a href="#pablo">Get More Space...</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-rose card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">equalizer</i>
                    </div>
                    <p class="card-category">ACCESS REQUEST</p>
                    <h3 class="card-title">75.521</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">local_offer</i> Tracked from Google Analytics
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Revenue</p>
                    <h3 class="card-title">$34,245</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">date_range</i> Last 24 Hours
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="fa fa-twitter"></i>
                    </div>
                    <p class="card-category">Followers</p>
                    <h3 class="card-title">+245</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> Just Updated
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-rose" data-header-animation="true">
                      <div class="ct-chart" id="websiteViewsChart"></div>
                    </div>
                    <div class="card-body">
                      <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                          <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                          <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                          <i class="material-icons">edit</i>
                        </button>
                      </div>
                      <h4 class="card-title">Website Views</h4>
                      <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-success" data-header-animation="true">
                      <div class="ct-chart" id="dailySalesChart"></div>
                    </div>
                    <div class="card-body">
                      <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                          <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                          <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                          <i class="material-icons">edit</i>
                        </button>
                      </div>
                      <h4 class="card-title">Daily Sales</h4>
                      <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> updated 4 minutes ago
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card card-chart">
                    <div class="card-header card-header-info" data-header-animation="true">
                      <div class="ct-chart" id="completedTasksChart"></div>
                    </div>
                    <div class="card-body">
                      <div class="card-actions">
                        <button type="button" class="btn btn-danger btn-link fix-broken-card">
                          <i class="material-icons">build</i> Fix Header!
                        </button>
                        <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                          <i class="material-icons">refresh</i>
                        </button>
                        <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                          <i class="material-icons">edit</i>
                        </button>
                      </div>
                      <h4 class="card-title">Completed Tasks</h4>
                      <p class="card-category">Last Campaign Performance</p>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons">access_time</i> campaign sent 2 days ago
                      </div>
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
    @include('layouts.salayout.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('layouts.salayout.plugins.dplugin')
@parent
@endsection
<!--   Script Plugins -->