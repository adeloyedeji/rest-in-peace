<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>



    <!-- Styles -->

    @include('layouts.css')
    <!-- /Styles -->
</head>
<body id="top">
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">
            <div class="loader"></div>
        </div>
    </div>
    <!-- /Preloader -->

    <div id="body-wrapper" class="body-container">
        <!-- Main navigation header -->
        @include('layouts.nav-header')
        <!-- /Main navigation header -->

        <!-- Left sidebar -->
        @include('layouts.left-sidebar')
        <!-- /Left sidebar -->

        <!-- Page container begins -->
        @yield('content')
        <!-- /Page Container ends -->
    </div>


    <!-- Right side bar -->
    @include('layouts.right-sidebar')
    <!-- /Right side bar -->
    

    <!-- Layout settings -->
    @include('layouts.layout-settings')
    <!-- /Layout settings -->
    
    <!-- Javascript files -->
    @include('layouts.scripts')

    @yield('pagescript')
    <!-- /Javascript files -->
</body>
</html>
