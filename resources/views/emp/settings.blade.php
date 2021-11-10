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
      <div class="container-fluid">
        
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

<!--   Wizard Plugins -->
@section('pageplugin')
@include('emp.layouts.wizard')
@parent
@endsection
<!--   Script Plugins -->