@extends('layouts.app')

@section('title')
  | Beneficiary Data
@endsection

@section('content')
<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Beneficiary Profile
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Beneficiaries</li>
                <li class="active">Beneficiary Profile</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-lg-3 col-sm-4">

                <!-- User thumbnail -->
                <div class="card card-block">
                    <div class="thumb thumb-rounded">
                        <img src="{{ $beneficiary->household_head_photo }}" alt="" style="height:150px;">
                    </div>
                    <div class="caption text-center">
                        <h3 class="m-t-20">
                            {{ $beneficiary->household_head }}
                            <small class="display-block m-t-10">{{ $beneficiary->occupation->title }}</small>
                        </h3>
                    </div>
                </div>
                <!-- /user thumbnail -->

                <!-- Navigation -->
                <div class="list-group list-group-lg m-b-20">
                    <div class="card-header">
                        <div class="card-title"><i class="icon-briefcase position-left"></i>Projects</div>
                    </div>
                    @forelse($beneficiary->projects as $project)
                            @foreach($project->project as $p)
                                <li class="list-group-item justify-content-between">
                                    {{ $p->title}}<small>{{ $p->code }}</small>
                                </li>
                            @endforeach
                        @empty
                            <li class="list-group-item justify-content-between">
                                {{ $beneficiary->household_head }} has not been assigned to any project.
                            </li>
                        @endforelse
                    {{-- <li class="list-group-item justify-content-between"><a href="#"><i class="icon-user position-left"></i> My profile</a></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-cash3 position-left"></i> Balance</a></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-tree7 position-left"></i> Connections</a> <span class="badge badge-pill bg-danger">19</span></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-users position-left"></i> Friends</a></li></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-calendar3 position-left"></i> Events</a> <span class="badge badge-pill bg-teal-400">20</span></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-cog3 position-left"></i> Account settings</a></li> --}}
                </div>
                <!-- /navigation -->
            </div>

            <div class="col-lg-9 col-sm-8">

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title"><i class="fa fa-user position-left"></i>About - {{ $beneficiary->household_head }} <span class="pull-right"><a href="#editBeneficiary" data-toggle="modal" data-target="#editBeneficiary"><i class="fa fa-edit position-left"></i></a></span></div>
                    </div>
                    <table class="table table-borderless table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Date of Birth</strong></td>
                                <td><a href="javascript:void(0)">{{ $beneficiary->dob }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td><a href="javascript:void(0)">{{ $beneficiary->phone }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>E-mail</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->email ? $beneficiary->email : "No E-mail" }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Total wives</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->wives_total }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Total Children</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->children_total }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Occupation</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->occupation->title }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Tribe</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->tribe }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Household size</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->household_size }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Address</strong></td>
                                @php
                                    $address = "";
                                    $address = $beneficiary->street ? $beneficiary->street : "Undefined Street";
                                    $address .= ", ";
                                    $address .= $beneficiary->city ? $beneficiary->city : "Undefined City";
                                    $address .= ", ";
                                    $address .= $beneficiary->lga ? $beneficiary->lga->lga : "Undefined Lga";
                                    $address .= ", ";
                                    $address .= $beneficiary->state ? $beneficiary->state->state : "Undefined State";
                                @endphp
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $address }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card card-inverse card-flat">
                    <div class="card-block">
                        <beneficiary-dependent-component-profile :p="'{{ csrf_token() }}'" :bid="{{ $beneficiary->id }}"></beneficiary-dependent-component-profile>
                    </div>
                </div>

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title"><i class="icon-user-lock position-left"></i>Fingerprint Scan</div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>L1</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>L2</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>L3</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>L4</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>L5</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>R1</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>R2</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>R3</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>R4</label>
                        </div>
                        <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                            <label>R5</label>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @include('pages.beneficiaries.edit')
</section>
@endsection