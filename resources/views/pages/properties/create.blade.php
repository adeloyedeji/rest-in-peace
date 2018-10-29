@extends('layouts.app')

@section('title')
  | Beneficiary Property
@endsection

@section('content')
<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Beneficiary Property
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{route('beneficiaries.index')}}" id="">Beneficiaries</a></li>
                <li class="active">Beneficiary Property</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">
        @if(Session::has('success'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-success alert-styled-left">
                        <span class="text-semibold">Success!</span> {{Session::get('success')}}
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('warning'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-warning alert-styled-left">
                        <span class="text-semibold">Warning!</span> {{Session::get('warning')}}
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-danger alert-styled-left">
                        <span class="text-semibold">Error!</span> {{Session::get('error')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3 col-sm-4">

                <!-- User thumbnail -->
                <div class="card card-block">
                    <div class="thumb thumb-rounded">
                        <img src="{{ $beneficiary->household_head_photo }}" alt="" style="height:150px;">
                    </div>
                    <div class="caption text-center">
                        <h3 class="m-t-20">
                            {{ $beneficiary->fname . " " . $beneficiary->lname }}
                            <small class="display-block m-t-10">{{ $beneficiary->occupation }}</small>
                        </h3>
                    </div>
                </div>
                <!-- /user thumbnail -->

                <!-- Navigation -->
                <div class="list-group list-group-lg m-b-20">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="icon-briefcase position-left"></i>Projects
                            <span class="pull-right">
                                <a href="#editBeneficiary" data-toggle="modal" data-target="#addToProject">
                                    <i class="fa fa-edit position-left"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    @forelse($assignedProjects as $project)
                        @foreach($project->project as $p)
                            <li class="list-group-item justify-content-between">
                                {{ $p->title}}<small>{{ $p->code }}</small>
                            </li>
                        @endforeach
                    @empty
                        <li class="list-group-item justify-content-between">
                            <b>{{ $beneficiary->fname . " " . $beneficiary->lname }}</b> has not been assigned to any project.
                        </li>
                    @endforelse
                </div>
                <!-- /navigation -->
                @php
                    $p = explode("/", $beneficiary->household_head_photo);
                    $p = end($p);
                @endphp
                @if ($p == 'PENDING')
                    <a href="{{url('beneficiaries/create?stage=4')}}" class="btn btn-info btn-block">Face Capture</a>
                @else
                    @if (count($bioMetrics) <= 0)
                        <a href="{{route('beneficiaries.finger-print-upload', ['id' => $beneficiary->id])}}" class="btn btn-info btn-block">Enroll Beneficiary Bio-metrics</a>
                    @endif
                @endif
                <a class="btn btn-primary btn-block" target="_blank" href="{{route('beneficiaries.show', ['id' => $beneficiary->id])}}">view profile</a>
            </div>
            <div class="col-lg-9 col-sm-8">
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-user position-left"></i>Property Information
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form class="step no-mb" method="POST" enctype="multipart/form-data" action="{{route('properties.store')}}">
                                    <h3 class="form-wizard-title text-uppercase">
                                        <span class="form-wizard-count">1</span>
                                        Property Information
                                        <small class="display-block">Beneficiary Property Information</small>
                                    </h3>
                                    @csrf
                                    <input type="hidden" name="bid" id="bid" value="{{$beneficiary->id}}">
                                    @if (\Auth::user()->role_id == 7)
                                        {{-- crops --}}
                                        <input type="hidden" name="type" id="type" value="1">
                                    @elseif (\Auth::user()->role_id == 9)
                                        {{-- structures --}}
                                        <input type="hidden" name="type" id="type" value="2">
                                    @elseif(\Auth::user()->role_id == 1)
                                        {{-- super admin can select which type of property --}}
                                        <div class="form-group row">
                                            <label for="type" class="control-label col-lg-3">Property Type*</label>
                                            <select name="type" id="type" class="form-control col-lg-9">
                                                <option value="1">Crops &amp; Economic Trees</option>
                                                <option value="2">Structures</option>
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <label for="property_code" class="control-label col-lg-3">Property Code*</label>
                                        <input type="text" class="form-control col-lg-9 {{ $errors->has('property_code') ? '  has-danger has-feedback' : '' }}" id="property_code" name="property_code" placeholder="E.g. FCDA/DRC/2018/..." value="{{old('property_code') ? old('property_code') : 'FCDA/DRC/' . date('Y') . '/' }}" required>
                                        @if ($errors->has('property_code'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('property_code') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="project_id" class="control-label col-lg-3">Associated Project*</label>
                                        <select name="project_id" id="project_id" class="form-control col-lg-9">
                                            @forelse($assignedProjects as $project)
                                                @foreach($project->project as $p)
                                                    <option value="{{$p->id}}">{{$p->title}} / {{$p->code}}</option>
                                                @endforeach
                                            @empty
                                                <option value="nop">No projects assigned!</option>
                                            @endforelse
                                        </select>
                                        @if ($errors->has('project_id'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('project_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label for="ownership" class="control-label col-lg-3">Ownership*</label>
                                        <input type="text" class="form-control col-lg-9 {{ $errors->has('ownership') ? '  has-danger has-feedback' : '' }}" id="ownership" name="ownership" placeholder="Property Ownership" value="{{old('ownership')}}" required>
                                        @if ($errors->has('ownership'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('ownership') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Approved*:</label>
                                        <div class="col-lg-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="approved" class="styled" checked="checked" id="yes" value="1">
                                                Yes
                                            </label>

                                            <label class="radio-inline">
                                                <input type="radio" name="approved" class="styled" id="no" value="2">
                                                No
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="plan" class="control-label col-lg-3">Property Plan</label>
                                        <input type="file" class="form-control col-lg-9 {{ $errors->has('plan') ? '  has-danger has-feedback' : '' }}" id="plan" name="plan">
                                    </div>
                                    <div class="form-group row">
                                        <label for="others1" class="control-label col-lg-3">Others 1</label>
                                        <input type="text" class="form-control col-lg-9 {{ $errors->has('others1') ? '  has-danger has-feedback' : '' }}" id="others1" name="others1" placeholder="Other information" value="{{old('others1')}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="others2" class="control-label col-lg-3">Others 2</label>
                                        <input type="text" class="form-control col-lg-9 {{ $errors->has('others2') ? '  has-danger has-feedback' : '' }}" id="others2" name="others2" placeholder="Other information" value="{{old('others2')}}">
                                    </div>
                                    <div class="form-group row">
                                        <label for="others3" class="control-label col-lg-3">Others 3</label>
                                        <input type="text" class="form-control col-lg-9 {{ $errors->has('others3') ? '  has-danger has-feedback' : '' }}" id="others3" name="others3" placeholder="Other information" value="{{old('others3')}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input class="btn btn-info pull-right" id="basic-next" value="Submit" type="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.beneficiaries.add-to-project')
</section>
@endsection