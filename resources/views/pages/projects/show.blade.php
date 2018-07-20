@extends('layouts.app')

@section('title')
  | {{ $project->title }}
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Project details
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{ route('projects.index') }}">Projects</a></li>
                <li class="active">{{ $project->title }}</li>
            </ul>
        </div>
    </div>
    <!--/Page Header-->

    <div class="container-fluid page-content">

        <div class="row">
            <div class="col-md-8">

                <!-- Project details -->
                <div class="card no-mb no-bb">
                    <div class="card-header">
                        <div class="card-title text-xlg">
                            {{ $project->title }} 
                            <span class="pull-right">
                                <button class="btn btn-default" data-toggle="modal" data-target="#editProject"><i class="fa fa-edit"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-primary">Assign</button>
                                <button class="btn btn-primary" id="complete" onclick="completeProject({{$project->id}}, 2)">Mark as completed</button>
                                <button class="btn btn-success" id="active" onclick="completeProject({{$project->id}}, 1)">Mark as active</button>
                                <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProject">DELETE PROJECT</button>
                            </div>
                        </div>

                        <div class="row m-t-20">
                            <div class="col-md-12">
                                <h4 class="m-b-10 text-semibold">Project Code</h4>
                                <p class="text-size-large">{{ $project->code }}</p>
                                <p></p>
                                <h4 class="m-b-10 text-semibold">Project Location</h4>
                                <p class="text-size-large">{{ $project->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Project details -->
            </div>

            <div class="col-md-4">
                <div class="card card-inverse card-flat">
                    <div class="card-block">
                        <div class="row m-b-10">
                            <div class="col-md-6">
                                <div class="card-title">Date Created</div>
                            </div>

                            <div class="col-md-6 text-right">
                                <div class="card-title float-right">{{ $project->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-title m-t-0 m-b-15">Assigned to</div>
                                <img src="{{ asset('img/demo/img5.jpg') }}" class="rounded-circle img-fluid img-sm m-r-5 float-left" alt="">
                                <img src="{{ asset('img/demo/img6.jpg') }}" class="rounded-circle img-fluid img-sm m-r-5 float-left" alt="">
                                <img src="{{ asset('img/demo/img7.jpg') }}" class="rounded-circle img-fluid img-sm m-r-5 float-left" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="cipher" id="cipher" value="{{ csrf_token() }}"> 
    </div>
    <edit-project :id="{{$project->id}}"></edit-project>
    <delete-project :id="{{$project->id}}"></delete-project>
</section>
@endsection