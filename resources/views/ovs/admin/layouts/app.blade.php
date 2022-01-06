<!--
=========================================================
Material Dashboard PRO - v2.2.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard-pro
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('material/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material/css/material-dashboard.css?v=2.2.2') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('material/css/select2.min.css') }}">

    <title>ACDIMPC EPORTAL</title>
    </head>

    <body class="">
        
        <div class="wrapper ">
            @section('sidebar')
            @show
            <div class="main-panel">
                @section('navbar')
                @show
                @yield('main-content')
                @section('footer')
                @show
                @section('sidefilter')
                @show
                @section('corejs')
                @show
                @section('adminplugin')
                @show
                @section('pageplugin')
                @show
            </div>
        </div>

    </body>
</html>