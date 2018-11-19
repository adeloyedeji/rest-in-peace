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
                                <h3 class="text-uppercase">Project
                                    <span style="border: 1px dotted #fff;border-bottom: 1px dashed #000;">{{$project->title}}</span>
                                </h3>
                                <div class="table-responsive">
                                    <table class="table table-hover table-stripped table-bordered">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th>S/NO</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Amount Collected</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-uppercase">
                                                <td>#</td>
                                                <td>
                                                    {{$mc_profile->code}}
                                                </td>
                                                <td>
                                                    <p>
                                                        {{$ben->name}}
                                                    </p>
                                                </td>
                                                <td>
                                                    {{$mc_profile->address}}
                                                </td>
                                                <td>
                                                    {{$mc_profile->phone}}
                                                </td>
                                                <td>
                                                    {{$mc_profile->amount_collected}}
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
                    <a class="btn btn-primary bg-success-1100" href="{{route('beneficiaries.create.monitoring-and-control')}}">Add new Beneficiary</a>
                    <a class="btn btn-primary bg-success-900" href="{{route('monitoring-and-control.beneficiaries')}}">Goto beneficiary database</a>
                </div>        
            </div>
        </div>
    </div>
</section>

@endsection