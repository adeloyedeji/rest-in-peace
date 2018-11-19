@extends('layouts.app')

@section('title')
  | {{$ben->name}}
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12" style="margin-top:2em;">
                <div class="card card-inverse card-flat">
                    <h3 class="text-center text-uppercase">
                        <u><b>Department of Resettlement and compensation</b></u>
                    </h3>
                    <h3 class="text-center text-uppercase">
                        <b>Summary Sheet</b>
                    </h3>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="text-uppercase">Valuation of Structures At 
                                    <span style="border: 1px dotted #fff;border-bottom: 1px dashed #000;">{{$project->title}}</span>
                                </h3>
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>S/NO</th>
                                                <th>Code</th>
                                                <th>Name / Household head / Household subhead</th>
                                                <th>Address</th>
                                                <th>Property Type</th>
                                                <th>Date of Birth</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-uppercase">
                                                <td>#</td>
                                                <td>
                                                    {{$planning_profile->code}}
                                                </td>
                                                <td>
                                                    <p>
                                                        {{$ben->name . '    /    ' . $planning_profile->household_head . '    /    ' . $planning_profile->sub_household_head}}
                                                    </p>
                                                </td>
                                                <td>
                                                    {{$planning_profile->address}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->property_type}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->date_of_birth}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br><br><br>
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>S/NO</th>
                                                <th>Gender</th>
                                                <th>Wives / Children</th>
                                                <th>Occupation</th>
                                                <th>State of Origin</th>
                                                <th>Tribe</th>
                                                <th>Duration</th>
                                                <th>Household Size</th>
                                                <th>Accomodation Type</th>
                                                <th>Ownership Type</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-uppercase">
                                                <td>#</td>
                                                <td>
                                                    {{$planning_profile->profile == 1 ? 'Male' : 'Female'}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->wives . '    /    ' . $planning_profile->children}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->occupation}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->origin($planning_profile->state_of_origin)->state}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->tribe}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->duration . 'Year(s)'}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->household_size}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->accomodation_type}}
                                                </td>
                                                <td>
                                                    {{$planning_profile->ownership_type}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group">
                    <a class="btn btn-primary bg-success-1100" href="{{route('beneficiaries.create.planning')}}">Add new Beneficiary</a>
                    <a class="btn btn-primary bg-success-900" href="{{route('planning.beneficiaries')}}">Goto beneficiary database</a>
                </div>        
            </div>
        </div>
    </div>
</section>

@endsection