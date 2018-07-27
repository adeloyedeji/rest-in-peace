@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="jumbo-header text-center">
        <project-beneficiaries-search :id="{{$id}}"></project-beneficiaries-search>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-8">
                <beneficiaries-by-project :id="{{$id}}" :p="'{{csrf_token()}}'"></beneficiaries-by-project>
            </div>
            <div class="col-md-4">
                <view-project-sidebar :id="{{$id}}"></view-project-sidebar>
                <view-project :id="{{$id}}"></view-project>
                <edit-project :id="{{$id}}"></edit-project>
                <delete-project :id="{{$id}}"></delete-project>
            </div>
        </div>
        <add-structure-beneficiary :pk="'{{csrf_token()}}'"></add-structure-beneficiary>
    </div>
</section>
@endsection