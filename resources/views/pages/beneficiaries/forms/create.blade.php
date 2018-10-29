@extends('layouts.app')

@section('title')
  | Create Beneficiary
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- Basic form steps wizard -->
				<div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">New Beneficiary Form</div>
                    </div>

                    @if(session::has('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert bg-success alert-styled-left">
                                <span class="text-semibold">Success!</span> {{Session::get('success')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session::has('warning'))
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="alert bg-warning alert-styled-left">
                                    <span class="text-semibold">Warning!</span> {{Session::get('warning')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session::has('error'))
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="alert bg-danger alert-styled-left">
                                    <span class="text-semibold">Warning!</span> {{Session::get('error')}}
                                </div>
                            </div>
                        </div>
                    @endif

                    <input type="hidden" name="marker" id="marker" value="{{session('step')}}">
                    <input type="hidden" name="bid" id="bid" value="{{$id}}">

                    <div class="form-basics" style="padding:40px;">
                        @if (session('step') == 1)
                            @include('pages.beneficiaries.forms.partials.basic')
                        @elseif(session('step') == 2)
                            @include('pages.beneficiaries.forms.partials.contact')
                        @elseif(session('step') == 3)
                            @include('pages.beneficiaries.forms.partials.dependants')
                        @elseif(session('step') == 4)
                            @include('pages.beneficiaries.forms.partials.biometrics')
                        @endif
                    </div>

                </div>
                <!-- /Basic form steps wizard -->
            </div>
        </div>
    </div>
</section>

@endsection