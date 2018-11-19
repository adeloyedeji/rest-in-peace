@extends('layouts.app')

@section('title')
  | Create Beneficiary
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12" style="margin-top:2em;">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Basic form steps wizard -->
				<div class="card card-inverse card-flat">

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
                    
                    <form action="" method="post">
                        <input type="hidden" name="anthony" id="anthony" value="{{csrf_token()}}">
                        <h2 class="text-center text-uppercase">
                            <b>federal capital development authority</b>
                        </h2>
                        <h3 class="text-center text-uppercase">
                            <b>Department of Resettlement and compensation</b>
                        </h3>
                        <h3 class="text-center text-uppercase">
                            <b>FCDA SECRETARIAT, AREA 11, GARKI, ABUJA</b>
                        </h3>
                        <h5 class="text-center text-uppercase">
                            <u><b>SOCIO-ECONOMIC SURVEY</b></u>
                        </h5>
                        <h5 class="text-center text-uppercase">
                            <u><b>HOUSEHOLD AND HOUSING CONDITION QUESTIONAIRE</b></u>
                        </h5>
                        <div class="text-center">
                            <div id="capture" style="width:100%;height:500px;margin:0 auto;"></div>
                        </div>
                        <br><br><br>
                        <div class="row p-20">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Project</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Select Project" class="select" id="project" name="project">
                                            @forelse ($projects as $p)
                                                <option value="{{$p->id}}">{{$p->code}}</option>
                                            @empty
                                                <option value="0">No projects found!</option>
                                            @endforelse
                                        </select>
                                        @if ($errors->has('project'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('project') }}</span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Beneficiary Code</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" value="{{old('code') ? old('code') : 'FCDA/DRC/' . date('Y') . '/'}}" required autofocus>
                                        @if ($errors->has('code'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name of village</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('village') ? '  has-danger has-feedback' : '' }}" id="village" name="village"  value="{{old('village')}}">
                                        @if ($errors->has('village'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('village') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Address of Property</label>
                                    <div class="col-lg-9">
                                        <textarea name="address" id="address" cols="30" rows="8" class="form-control{{ $errors->has('address') ? '  has-danger has-feedback' : '' }}">{{old('address')}}</textarea>
                                        @if ($errors->has('address'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">City</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('city') ? '  has-danger has-feedback' : '' }}" id="city" name="city" value="{{old('city')}}" required>
                                        @if ($errors->has('city'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name of Household Head</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('household_head') ? '  has-danger has-feedback' : '' }}" id="household_head" name="household_head"  value="{{old('household_head')}}">
                                        @if ($errors->has('household_head'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('household_head') }}</span>
                                        @endif
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name of Sub-Household Head</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('sub_household_head') ? '  has-danger has-feedback' : '' }}" id="sub_household_head" name="sub_household_head"  value="{{old('sub_household_head')}}">
                                        @if ($errors->has('sub_household_head'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('sub_household_head') }}</span>
                                        @endif
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    @php $year = date('Y');$month = date('m');$day = date('d');@endphp
                                    <label class="control-label col-lg-3">Date of Birth</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <select data-placeholder="Month" class="select" id="month" name="month">
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
                                                    <select data-placeholder="Day" class="select" id="day" name="day" required>
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
                                                    <select data-placeholder="Year" class="select" id="year" name="year" required>
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
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Gender</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" class="styled" checked="checked" id="male" value="1">
                                                        Male
                                                    </label>
                            
                                                    <label class="radio-inline">
                                                        <input type="radio" name="gender" class="styled" id="female" value="2">
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">No. of wives</label>
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control{{ $errors->has('wives') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. 2" id="wives" name="wives" value="{{old('wives')}}" required>
                                        @if ($errors->has('wives'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('wives') }}</span>
                                        @endif
                                    </div>
                                </div>       
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">No. of children</label>
                                    <div class="col-lg-9">
                                        <input type="number" class="form-control{{ $errors->has('child_total') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. 2" id="child_total" name="child_total" value="{{old('child_total')}}" required>
                                        @if ($errors->has('child_total'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('child_total') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Occupation of Household Head</label>
                                    <div class="col-lg-9">
                                        <select name="occupation" id="occupation" class="form-control">
                                            <option value="Farmer">Farmer</option>
                                            <option value="Trading">Trading</option>
                                            <option value="Civil Servant">Civil Servant</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <input type="text" class="form-control{{ $errors->has('occupation') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. Farmer" id="occupationText" name="occupation" value="{{old('occupation')}}" required style="display:none;">
                                        <a href="#!" id="choose" style="display:none;font-size:8px;color:#04c"><i>choose from options</i></a>
                                        @if ($errors->has('occupation'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('occupation') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">State of Origin</label>
                                    <div class="col-lg-9">
                                        <select class="select" id="state_of_origin" name="state_of_origin">
                                            @forelse($states as $state)
                                                <option value="{{$state->id}}">{{$state->state}}</option>
                                            @empty
                                                <option value="0">Others</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Tribe</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('tribe') ? '  has-danger has-feedback' : '' }}" id="tribe" name="tribe"  value="{{old('tribe')}}" required>
                                        @if ($errors->has('tribe'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('tribe') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Origin</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="indigene" class="styled" checked="checked" id="indigene" value="1">
                                                        Indigene
                                                    </label>
                            
                                                    <label class="radio-inline">
                                                        <input type="radio" name="indigene" class="styled" id="non_indigene" value="2">
                                                        Non-Indigene
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Resident duration</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('resident_duration') ? '  has-danger has-feedback' : '' }}" id="resident_duration" name="resident_duration"  value="{{old('resident_duration')}}" required>
                                        @if ($errors->has('resident_duration'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('resident_duration') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Size of Household</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Occupation" class="select" id="household_size" name="household_size">
                                            <option value="1 - 2">1 - 2</option>
                                            <option value="3 - 6">3 - 6</option>
                                            <option value="7 - 14">7 - 14</option>
                                            <option value="15 - 20">15 - 20</option>
                                            <option value="Over 20">Over 20</option>
                                        </select>
                                        @if ($errors->has('household_size'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('household_size') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Property Type / Description</label>
                                    <div class="col-lg-9">
                                        <select class="select" id="property_type" name="property_type">
                                            <option value="Bungalow">Bungalow</option>
                                            <option value="Detached">Detached</option>
                                            <option value="Semi-Detached">Semi-Detached</option>
                                            <option value="Terraced">Terraced</option>
                                            <option value="Studio">Studio</option>
                                            <option value="Tenement">Tenement</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        @if ($errors->has('property_type'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('property_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Type of Accomodation</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="accomodation_type" name="accomodation_type">
                                            <option value="1Bdrm">1Bdrm</option>
                                            <option value="2Bdrms">2Bdrms</option>
                                            <option value="3Bdrms">3Bdrms</option>
                                            <option value="4Bdrms">4Bdrms</option>
                                            <option value="5Bdrms">5Bdrms</option>
                                            <option value="6Bdrms">6Bdrms</option>
                                            <option value="1Rm">1Rm</option>
                                            <option value="2Rms">2Rms</option>
                                            <option value="2Rms">2Rms</option>
                                            <option value="3Rms">3Rms</option>
                                            <option value="4Rms">4Rms</option>
                                            <option value="5Rms">5Rms</option>
                                            <option value="others">Others</option>
                                        </select>
                                        <input type="text" class="form-control{{ $errors->has('property_type') ? '  has-danger has-feedback' : '' }}" id="accomodation_type_text" name="accomodation_type"  value="{{old('accomodation_type')}}" style="display:none;">
                                        <a href="!#" id="property_others" style="display:none;font-size:6px;color:#04c;"><i>choose from options</i></a>
                                        @if ($errors->has('property_type'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('property_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Type of Ownership</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('ownership_type') ? '  has-danger has-feedback' : '' }}" id="ownership_type" name="ownership_type"  value="{{old('ownership_type')}}" required>
                                        @if ($errors->has('ownership_type'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('ownership_type') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Building Plan Approval</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="plan_approval" class="styled" checked="checked" id="plan_approval_yes" value="1">
                                                        Yes
                                                    </label>
                            
                                                    <label class="radio-inline">
                                                        <input type="radio" name="plan_approval" class="styled" id="plan_approval_no" value="2">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <button type="button" class="btn btn-success btn-labeled btn-labeled-right pull-right" id="saveBtn">
                                    <b><i class="icon-checkmark3"></i></b> Save Beneficiary
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Basic form steps wizard -->
            </div>
        </div>
    </div>
</section>

@endsection