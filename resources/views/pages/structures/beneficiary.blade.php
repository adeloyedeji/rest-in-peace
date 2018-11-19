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
                                                <th>Name / Address</th>
                                                <th>Property Type</th>
                                                <th>Valuation</th>
                                                <th>Compensation (&#8358;)</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-uppercase">
                                                <td>#</td>
                                                <td>
                                                    <p>{{$ben->name}}</p>
                                                    {{$structure_p->village . ' ' . $structure_p->address . ' ' . $structure_p->location}}
                                                </td>
                                                <td>
                                                    {{$structure->type_of_development}}
                                                </td>
                                                <td>
                                                    {{$structure->valuation}}
                                                </td>
                                                <td>
                                                    {{$structure->compensation}}
                                                </td>
                                                <td>
                                                    {{$structure->compensation}}
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
                    <a class="btn btn-primary bg-success-1000" onclick="event.preventDefault();addMoreProperty();">
                        Add another property
                    </a>
                    <a class="btn btn-primary bg-success-1100" href="{{route('beneficiaries.create.structure')}}">Add new Beneficiary</a>
                    <a class="btn btn-primary bg-success-900" href="{{route('beneficiaries.create.structure')}}">Goto beneficiary database</a>
                </div>        
            </div>
        </div>
    </div>
</section>

<div id="property_more" class="hide">
    <form action="{{route('structures.add-more')}}" method="POST">
        @csrf
        {{-- <input type="hidden" name="anthony" id="anthony" value="{{csrf_token()}}"> --}}
        <input type="hidden" name="project" id="project" value="{{$project->id}}">
        <input type="hidden" name="ben_id" id="ben_id" value="{{$ben->id}}">
        <h4 class="no-mt m-b-15">Add more property to this beneficiary</h4>
        <div class="form-group">
            <label>Beneficiary Code</label>
            <input type="text" class="form-control{{ $errors->has('property_code') ? '  has-danger has-feedback' : '' }}" id="property_code" name="property_code" value="FCDA/DRC/{{date('Y')}}" required>
            @if ($errors->has('property_code'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2"></i>
                </div>
                <span class="help-block text-danger">{{ $errors->first('property_code') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Current Interest</label>
            <input type="text" class="form-control{{ $errors->has('current_interest') ? '  has-danger has-feedback' : '' }}" id="current_interest" name="current_interest" value="" required>
            @if ($errors->has('current_interest'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2"></i>
                </div>
                <span class="help-block text-danger">{{ $errors->first('current_interest') }}</span>
            @endif
        </div> 
        <div class="form-group">
            <label>Address of Interest</label>
            <input type="text" class="form-control{{ $errors->has('interest_address') ? '  has-danger has-feedback' : '' }}" id="interest_address" name="interest_address" value="">
            @if ($errors->has('interest_address'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2"></i>
                </div>
                <span class="help-block text-danger">{{ $errors->first('interest_address') }}</span>
            @endif
        </div>  
        <div class="form-group">
            <label>Interest</label>
            <input type="text" class="form-control{{ $errors->has('interest') ? '  has-danger has-feedback' : '' }}" id="interest" name="interest" value="">
            @if ($errors->has('interest'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2"></i>
                </div>
                <span class="help-block text-danger">{{ $errors->first('interest') }}</span>
            @endif
        </div>  
        <div class="form-group">
            @php $year = date('Y');$month = date('m');$day = date('d');@endphp
            <label>Date of Inspection</label>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select data-placeholder="Month" class="form-control" id="month" name="month">
                            <option @if($month == 1) selected @endif value="1">January</option>
                            <option @if($month == 2) selected @endif value="2">February</option>
                            <option @if($month == 3) selected @endif value="3">March</option>
                            <option @if($month == 4) selected @endif value="4">April</option>
                            <option @if($month == 5) selected @endif value="5">May</option>
                            <option @if($month == 6) selected @endif value="6">June</option>
                            <option @if($month == 7) selected @endif value="7">July</option>
                            <option @if($month == 8) selected @endif value="8">August</option>
                            <option @if($month == 9) selected @endif value="9">September</option>
                            <option @if($month == 10) selected @endif value="10">October</option>
                            <option @if($month == 11) selected @endif value="11">November</option>
                            <option @if($month == 12) selected @endif value="12">December</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select data-placeholder="Day" class="form-control" id="day" name="day" required>
                            @for($i = 1; $i <= 31; $i++)
                                @if ($day == $i)
                                <option selected value="{{$i}}">{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select data-placeholder="Year" class="form-control" id="year" name="year" required>
                            @for($i = 1900; $i <= date('Y'); $i++)
                                @if ($year == $i)
                                <option selected value="{{$i}}">{{$i}}</option>
                                @else
                                <option value="{{$i}}">{{$i}}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div> 
        <div class="form-group">
            <label class="control-label text-uppercase">Title</label>
            <input type="text" class="form-control{{ $errors->has('title') ? '  has-danger has-feedback' : '' }}" id="title" name="title" value="">
            @if ($errors->has('title'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2"></i>
                </div>
                <span class="help-block text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <button type="button" name="cancel" class="btn btn-secondary btn-block">Cancel</button>
            </div>
            <div class="col-md-6">
                <button type="submit" name="submit" id="preMoreBtn" class="btn btn-success btn-block">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection