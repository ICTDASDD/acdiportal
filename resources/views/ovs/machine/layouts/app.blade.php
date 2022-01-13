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

    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material/css/material-dashboard.css?v=2.2.2') }}" rel="stylesheet" />
    <link href="{{ asset('material/css/jqbtk.css') }}" rel="stylesheet" />
    
    <title>ACDIMPC EPORTAL</title>

    <style>
        .voting-selected {
            border:4px solid #4caf50;
        }
        .voting-selected-photo {
            border:4px solid #4caf50; background-color:#4caf50; width:250px;
        }
        .voting-not-selected {
            border:4px solid #999999;
        }
        .voting-not-selected-photo {
            border:4px solid #999999; background-color:#999999; width:250px;
        }
    </style>
    </head>

    <body class="sidebar-mini"  style="background-image: url({{ asset('material/img/login.jpg')}} ); background-size: cover; background-position: top center;">
        
        <div class="wrapper ">
            @section('sidebar')
            @show
            <div class="main-panel">
                @section('navbar')
                @show
                @yield('main-content')
                @section('footer')
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