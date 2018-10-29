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
                <li><a href="{{route('beneficiaries.index')}}" id="">Beneficiaries</a></li>
                <li class="active">Beneficiary Profile</li>
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
                @if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 7)
                <a class="btn btn-info btn-block" href="{{route('properties.crops.index', ['id' => $beneficiary->id, 'property_id' => 0])}}">Add Crops/Economic Trees</a>
                @endif
                @if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 9)
                <a class="btn btn-info btn-block" href="{{route('properties.structure.index', ['id' => $beneficiary->id, 'property_id' => 0])}}">Add Structures</a>
                @endif
                <a href="{{route('properties.create.index', ['id' => $beneficiary->id])}}" class="btn btn-info btn-block" target="_blank">Add Property</a>
                @if (count($structures) > 0)
                    <a class="btn btn-secondary btn-block" href="{{route('properties.index', ['id' => $beneficiary->id])}}">Evaluate Structures</a>
                @endif
                @if (count($bioMetrics) <= 0)
                    <a href="{{route('beneficiaries.finger-print-upload', ['id' => $beneficiary->id])}}" class="btn btn-info btn-block">Enroll Beneficiary Bio-metrics</a>
                @endif
                @endif
            </div>

            <div class="col-lg-9 col-sm-8">

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-user position-left"></i>About - {{ $beneficiary->fname . " " . $beneficiary->lname }}
                            @if (\Auth::user()->role_id == 1)
                            <span class="pull-right">
                                <a href="#editBeneficiary" data-toggle="modal" data-target="#editBeneficiary">
                                    <i class="fa fa-edit position-left"></i>
                                </a>
                            </span>
                            @endif
                        </div>
                    </div>
                    <table class="table table-borderless table-striped">
                        <tbody>
                            <tr>
                                <td><strong>Beneficiary Code</strong></td>
                                <td><a href="javascript:void(0)">{{ $beneficiary->code }}</a></td>
                            </tr>
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
                            @if (\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)
                                <tr>
                                    <td><strong>Total wives</strong></td>
                                    <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->wives_total }}</a></td>
                                </tr>
                                <tr>
                                    <td><strong>Total Children</strong></td>
                                    <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->children_total }}</a></td>
                                </tr>
                            @endif
                            <tr>
                                <td><strong>Occupation</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->occupation }}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Tribe</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->tribe }}</a></td>
                            </tr>
                            @if (\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)
                            <tr>
                                <td><strong>Household size</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $beneficiary->household_size }}</a></td>
                            </tr>
                            @endif
                            <tr>
                                <td><strong>Address</strong></td>
                                @php
                                    $address = "";
                                    $address = $beneficiary->street ? $beneficiary->street : "Undefined Street";
                                    $address .= ", ";
                                    $address .= $beneficiary->city ? $beneficiary->city : "Undefined City";
                                    $address .= ", ";
                                    // $address .= $beneficiary->lga ? $beneficiary->lga->lga : "Undefined Lga";
                                    // $address .= ", ";
                                    $address .= $beneficiary->state ? $beneficiary->state->state : "Undefined State";
                                @endphp
                                <td><a href="javascript:void(0)" class="label label-danger">{{ $address }}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if (\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)
                <div class="card card-inverse card-flat">
                    <div class="card-block">
                        <beneficiary-dependent-component-profile :p="'{{ csrf_token() }}'" :bid="{{ $beneficiary->id }}"></beneficiary-dependent-component-profile>
                    </div>
                </div>
                @endif

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-user position-left"></i>
                            Beneficiary Properties
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Property Code</th>
                                        <th>Type</th>
                                        <th>Related Project</th>
                                        <th>Ownership</th>
                                        <th>Approved Property</th>
                                        <th>Property Plan</th>
                                        <th>Valuation Amount (₦)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @forelse ($properties as $p)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td>{{$p->property_code}}</td>
                                            <td>
                                                @if ($p->type == 1)
                                                    Crops / Economic Trees
                                                @else
                                                    Structures
                                                @endif
                                            </td>
                                            <td>{{$p->project->code}}</td>
                                            <td>{{$p->ownership}}</td>
                                            <td>
                                                @if ($p->approved)
                                                    Approved
                                                @else
                                                    Not approved
                                                @endif
                                            </td>
                                            <td>
                                                @if ($p->plan != 'NO-PLAN')
                                                    <a href="{{\Storage::url($p->plan)}}">Download Plan</a>
                                                @else
                                                    None.
                                                @endif
                                            </td>
                                            <td>{{number_format($p->valuation, 2)}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8"><b>This beneficiary has no assigned property.</b></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-user position-left"></i>
                            Property Summary
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                @if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 7)
                                    <h4 class="text-center">Crops/Economic Trees</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover table-stripped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Property Code</th>
                                                    <th>Type of Crop/Economic Tree</th>
                                                    <th>Grade</th>
                                                    <th>Number of item</th>
                                                    <th>Valuation Amount (₦)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($properties as $p)
                                                    @php $ci = 0; $tempValuation = 0; @endphp
                                                    @forelse ($p->cropProperty as $c)
                                                        <tr>
                                                            <td>{{$ci+=1}}</td>
                                                            <td>{{$p->property_code}}</td>
                                                            <td>{{$c->crop->crop}}</td>
                                                            <td>{{$c->grade}}</td>
                                                            <td>{{$c->number_of_items}}</td>
                                                            <td>{{number_format($c->valuation, 2)}}</td>
                                                            @php $tempValuation += $c->valuation; @endphp
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="6"><b>No crops / economic trees found.</b></td>
                                                        </tr>
                                                    @endforelse
                                                    <tr>
                                                        <td colspan="5">Total</td>
                                                        <td><b>₦{{number_format($tempValuation, 2)}}</b></td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6"><b>This beneficiary has no crops/economic trees record.</b></td>
                                                    </tr>
                                                @endforelse



                                                @if (count($crops) > 0)
                                                    <tr>
                                                        <td colspan="5">
                                                            Sum Total:
                                                        </td>
                                                        <td>
                                                            @php
                                                                $t = 0;
                                                            @endphp
                                                            @foreach ($crops as $c)
                                                                @php
                                                                    $t += $c->valuation
                                                                @endphp
                                                            @endforeach
                                                            <b>₦{{number_format($t, 2)}}</b>
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                @endif

                                @if (\Auth::user()->role_id == 1 || \Auth::user()->role_id == 9)
                                <h4 class="text-center">Structure Properties</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>Size</th>
                                                <th>Area</th>
                                                <th>Valuation (₦)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $c = 0
                                            @endphp
                                            @forelse ($structures as $s)
                                                <tr>
                                                    <td>{{$c+=1}}</td>
                                                    <td>{{$s->type}}</td>
                                                    <td>{{$s->address}}</td>
                                                    <td>{{$s->size}}</td>
                                                    <td>{{$s->area}}</td>
                                                    <td>{{number_format($s->valuation_of_structure, 2)}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="6">
                                                        This beneficiary has no structure property record.
                                                    </td>
                                                </tr>
                                            @endforelse
                                            @if (count($structures) > 0)
                                                <tr>
                                                    <td colspan="5">
                                                        Total
                                                    </td>
                                                    <td>
                                                        @php
                                                            $t2 = 0
                                                        @endphp
                                                        @foreach ($structures as $s2)
                                                            @php
                                                                $t2 += $s2->valuation_of_structure
                                                            @endphp
                                                        @endforeach
                                                        <b>₦{{number_format($t2, 2)}}</b>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.beneficiaries.edit')
    @include('pages.beneficiaries.add-to-project')
</section>
@endsection

