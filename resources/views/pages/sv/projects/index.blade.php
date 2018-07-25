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
                <i class="icon-briefcase position-left"></i> Projects Directory
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Projects</li>
                <li class="active">Projects Directory</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <project-list></project-list>
                <add-project></add-project>
            </div>
        </div>
    </div>
</section>
@endsection