<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ACDI-MPC EPORTAL') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>


        <!-- KW -->
        <link rel="stylesheet" href="{{ asset('build/css/tailwind.css') }}"/>
        <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>



    </head>
    <body class="font-sans antialiased">
        <!-- KW -->
        <div x-data="setup()" x-init="$refs.loading.classList.add('hidden'); setColors(color);" :class="{ 'dark': isDark}">
        <!-- KW -->
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">

            
            @if(Auth::user()->hasRole('superadministrator'))
            @include('layouts.salayout.desktop_nav')
            @else
            @include('layouts.aside')
            @endif


            @include('layouts.navigation2')

            <!-- Main content -->
            {{ $header}}
            {{ $main }}
        


            @include('layouts.footer')


        </div>
            
        </div>


        <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->
        <!-- KW -->
        @include('layouts.kwfiles')
    <!-- KW -->

    </body>
</html>
