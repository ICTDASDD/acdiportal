@extends('emp.layouts.app') 

@section('sidebar')
@include('emp.layouts.sidebar')
@parent
@endsection


    <!-- Navbar -->
    @section('navbar')
    @include('emp.layouts.navbar')
    @parent
    @endsection
    <!-- End Navbar -->

    @section('main-content')
    <div class="content">
        <div class="content">
          <div class="container-fluid">
            
            

            <div class="header text-center ml-auto mr-auto">
              <h3 class="title">List of Benefits</h3>
              <p class="category">As of:</p>
            </div>
            
            




            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">assignment</i>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="toolbar">
                      <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="material-datatables">
                      <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                          <tr>
                            
                            <th>Benefits Title</th>
                            <th class="text-center">Eligible</th>
                            <th class="text-center">Date Approved/Acquired</th>
                            <th class="text-center">Status</th>                            
                            <th class="text-center">Recurring</th>
                            <th class="text-center">Amount</th>
                            <th class="text-right">View Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Housing Allowance</td>
                            <td class="text-center text-success">Yes</td>
                            <td class="text-center">05/11/2016</td>
                            <td class="text-center text-info">Consumable</td>
                            <td class="text-center">Monthly</td>
                            <td class="text-center">3,000</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>Grocery Allowance</td>
                            <td class="text-center text-success">Yes</td>
                            <td class="text-center">05/11/2015</td>
                            <td class="text-center text-info">Consumable</td>
                            <td class="text-center">Monthly</td>
                            <td class="text-center">3,000</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>Food Allowance</td>
                            <td class="text-center text-success">Yes</td>
                            <td class="text-center">05/11/2015</td>
                            <td class="text-center text-info">Consumable</td>
                            <td class="text-center">Daily</td>
                            <td class="text-center">150</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>HMO (Medicard)</td>
                            <td class="text-center text-success">Yes</td>
                            <td class="text-center">05/11/2015</td>
                            <td class="text-center text-info">Consumable</td>
                            <td class="text-center">Yearly</td>
                            <td class="text-center">200,000</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
                            </td>
                          </tr>

                          <tr>
                            <td>Eye Glass Benefits</td>
                            <td class="text-center text-success">Yes</td>
                            <td class="text-center">05/11/2015</td>
                            <td class="text-center text-danger">Consumed</td>
                            <td class="text-center">Yearly</td>
                            <td class="text-center">8,000</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" class="btn btn-info">
                                <i class="material-icons">visibility</i>
                              </button>
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
              <!-- end col-md-12 -->
            </div>


            

            

          </div>

        </div>
    </div>
    @endsection

    <!--footer -->
    @section('footer')
    @include('emp.layouts.footer')
    @parent
    @endsection
    <!--footer -->

    <!--side filter -->
    @section('sidefilter')
    @include('emp.layouts.sidefilter')
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
    @include('emp.layouts.plugins.adminplugin')
    @parent
    @endsection
<!--   Script Plugins -->

<!--   dashboard Plugins -->
@section('pageplugin')
@include('emp.layouts.plugins.dplugin')


<script>
  $(document).ready(function() {
    $('#datatables').DataTable({
      "pagingType": "full_numbers",
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      responsive: true,
      language: {
        search: "INPUT",
        searchPlaceholder: "Search records",
      }
    });

    var table = $('#datatables').DataTable();

    // Edit record

    table.on('click', '.edit', function() {
      $tr = $(this).closest('tr');

      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      var data = table.row($tr).data();
      alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
    });

    // Delete a record

    table.on('click', '.remove', function(e) {
      $tr = $(this).closest('tr');

      if ($($tr).hasClass('child')) {
        $tr = $tr.prev('.parent');
      }

      table.row($tr).remove().draw();
      e.preventDefault();
    });

    //Like record

    table.on('click', '.like', function() {
      alert('You clicked on Like button');
    });
  });
</script>


@parent
@endsection
<!--   Script Plugins -->