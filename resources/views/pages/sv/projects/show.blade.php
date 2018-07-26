@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="jumbo-header text-center">
        <form action="#" class="form-horizontal">
            <div class="form-group">

                <div class="input-group input-group-rounded input-group-lg">
                    <div class="input-group-addon"><i class="icon-search4 icon-1x"></i></div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search Beneficiaries By Name, Date of Birth etc.">
                </div>

            </div>
        </form>
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