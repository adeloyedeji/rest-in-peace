@extends('layouts.app')

@section('title')
  | Dashboard
@endsection

@section('content')
@if(Auth::User()->hasRole('superadmin'))

             @include('layouts.dashboards.admin_dashboard')

@elseif(Auth::User()->hasRole('po'))

            @include('layouts.dashboards.po_dashboard')

@elseif(Auth::User()->hasRole('vocet'))


             @include('layouts.dashboards.vocet_dashboard')

@elseif(Auth::User()->hasRole('vos'))

            @include('layouts.dashboards.vos_dashboard')

@elseif(Auth::User()->hasRole('mco'))

            @include('layouts.dashboards.mco_dashboard')
@endif
@endsection
