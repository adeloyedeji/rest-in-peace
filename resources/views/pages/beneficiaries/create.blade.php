@extends('layouts.app')

@section('title')
  | New Beneficiary
@endsection

@section('content')
<style>
    @media screen and (min-width: 1024px){
        .menu-container.screen{
            display: inherit;
        }
        .menu-container.handheld{
            display: none;
        }
    }
    @media screen and (max-width: 1023px){
        .menu-container.screen{
            display: none;
        }
        .menu-container.handheld{
            display: inherit;
        }
    }
</style>
<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> New Beneficiary
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Beneficiaries</li>
                <li class="active">Create new beneficiary</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">
        <!-- Basic form steps wizard -->
        <div class="card card-inverse">
            <div class="card-header">
                <div class="card-title">Create a new beneficiary wizard.</div>
            </div>

            <div class="card-group card-group-control accordion" id="accordion-control">
                <input type="hidden" id="pk" value="{{csrf_token()}}">

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group4" id="step4head">Set working project</a>
                        </div>
                    </div>
                    <div id="accordion-control-group4" class="card-collapse collapse show">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-to-project-section')
                        </div>
                    </div>
                </div>

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group1" id="acc1a">Beneficiary Personal Information #1</a>
                        </div>
                    </div>
                    <div id="accordion-control-group1" class="card-collapse collapse" id="step1acc">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-personal-section')
                        </div>
                    </div>
                </div>

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group2" id="step2head">Beneficiary Household details #2</a>
                        </div>
                    </div>
                    <div id="accordion-control-group2" class="card-collapse collapse" id="">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-household-section')
                        </div>
                    </div>
                </div>

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group3" id="step3head">Beneficiary contact details #3</a>
                        </div>
                    </div>
                    <div id="accordion-control-group3" class="card-collapse collapse">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-contact-section')
                        </div>
                    </div>
                </div>

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group5" id="step5head">Beneficiary Dependents #4</a>
                        </div>
                    </div>
                    <div id="accordion-control-group5" class="card-collapse collapse">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-dependents-section')
                        </div>
                    </div>
                </div>

                <div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-control" href="#accordion-control-group6" id="step6head">Bio-metrics #5</a>
                        </div>
                    </div>
                    <div id="accordion-control-group6" class="card-collapse collapse">
                        <div class="card-block">
                            @include('pages.beneficiaries.forms.beneficiary-bio-section')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Basic form steps wizard -->
    </div>
</section>
@endsection