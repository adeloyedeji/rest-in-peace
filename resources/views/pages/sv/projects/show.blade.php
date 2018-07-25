@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Project Data
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{ route('structure-valuations.projects.index') }}">Projects</a></li>
                <li class="active">Projects Data</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-8">
                <view-project :id="{{$id}}"></view-project>
                <edit-project :id="{{$id}}"></edit-project>
                <delete-project :id="{{$id}}"></delete-project>
            </div>
            <div class="col-md-4">
                <view-project-sidebar :id="{{$id}}"></view-project-sidebar>
            </div>
        </div>
        <add-structure-beneficiary :pk="'{{csrf_token()}}'"></add-structure-beneficiary>
    </div>
</section>
@endsection