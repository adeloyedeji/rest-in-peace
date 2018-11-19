@extends('layouts.app')

@section('title')
  | Capture Property - Crop and Economic Trees
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-9">
                <!-- Basic form steps wizard -->
				<div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">Beneficiary Crop and Economic Trees Property Enrollment Form</div>
                    </div>

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
                                    <span class="text-semibold">Warning!</span> {{Session::get('error')}}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-basics" style="padding:40px;">
                        @include('pages.properties.forms.crops-and-economic-trees.partials.prelim')
                    </div>
                </div>
                <!-- /Basic form steps wizard -->
            </div>
            <div class="col-md-3">
                <!-- User thumbnail -->
                <div class="card card-block">
                    <div class="thumb thumb-rounded">
                        <img src="{{ $beneficiary->household_head_photo }}" alt="" style="height:150px;">
                    </div>
                    <div class="caption text-center">
                        <h3 class="m-t-20">
                            {{ $beneficiary->name }}
                            <small class="display-block m-t-10">{{ $beneficiary->occupation }}</small>
                        </h3>
                    </div>
                </div>
                <!-- /user thumbnail -->
                <a class="btn btn-primary btn-block" target="_blank" href="{{route('beneficiaries.show', ['id' => $beneficiary->id])}}">view profile</a>
            </div>
        </div>
    </div>
</section>

@endsection