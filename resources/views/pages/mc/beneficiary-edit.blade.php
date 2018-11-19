@extends('layouts.app')

@section('title')
  | Edit Beneficiary
@endsection

@section('content')

<section class="main-container" id="vueId">
    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> All Beneficiaries
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{route('monitoring-and-control.beneficiaries')}}">Beneficiaries</a></li>
                <li class="active">Edit Beneficiary Profile</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12" style="margin-top:2em;">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Basic form steps wizard -->
				<div class="card card-inverse card-flat">                   
                    <form action="{{route('monitoring-and-control.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="ben" id="ben" value="{{$ben->id}}">
                        <input type="hidden" name="mc_id" id="mc_id" value="{{$mc_id}}">
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
                            <u><b>MONITORING &amp; CONTROL DEPARTMENT</b></u>
                        </h5>
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
                        <div class="row p-20">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Project</label>
                                    <div class="col-lg-9">
                                        <select data-placeholder="Select Project" class="select" id="project" name="project">
                                            @forelse ($projects as $p)
                                            @if ($monitoring_and_control_profile && $monitoring_and_control_profile->project_id)
                                                <option value="{{$p->id}}" selected>{{$p->code}}</option>
                                            @else
                                                <option value="{{$p->id}}">{{$p->code}}</option>
                                                
                                            @endif
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
                                        @if ($mc_id != 0)
                                            <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->code}}" @endif readonly>
                                        @else
                                            <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->code}}" @endif required autofocus>
                                        @endif
                                        @if ($errors->has('code'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('name') ? '  has-danger has-feedback' : '' }}" id="name" name="name" value="{{$ben->name}}" required>
                                        @if ($errors->has('name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Address</label>
                                    <div class="col-lg-9">
                                        <textarea name="address" id="address" cols="30" rows="8" class="form-control{{ $errors->has('address') ? '  has-danger has-feedback' : '' }}">@if($monitoring_and_control_profile) {{$monitoring_and_control_profile->address}} @endif </textarea>
                                        @if ($errors->has('address'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Amount Collected</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('amount_collected') ? '  has-danger has-feedback' : '' }}" id="amount_collected" name="amount_collected" @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->amount_collected}}" @endif  required>
                                        @if ($errors->has('amount_collected'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('amount_collected') }}</span>
                                        @endif
                                    </div>
                                </div>   
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Location / City</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('city') ? '  has-danger has-feedback' : '' }}" id="city" name="city" @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->city}}" @endif  required>
                                        @if ($errors->has('city'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('city') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Phone Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('phone') ? '  has-danger has-feedback' : '' }}" id="phone" name="phone" @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->city}}" @endif  required>
                                        @if ($errors->has('phone'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Gender</label>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label class="radio-inline">
                                                        @if($ben->gender == 1) 
                                                        <input type="radio" name="gender" class="styled" checked="checked" id="male" value="1">
                                                        @else
                                                        <input type="radio" name="gender" class="styled" id="male" value="1">
                                                        @endif
                                                        Male
                                                    </label>
                            
                                                    <label class="radio-inline">
                                                        @if($ben->gender == 2) 
                                                        <input type="radio" name="gender" checked="checked" class="styled" id="female" value="2">
                                                        @else
                                                        <input type="radio" name="gender" class="styled" id="female" value="2">
                                                        @endif
                                                        Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Date of Birth</label>
                                    <div class="col-lg-9">
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
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">State of Origin</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="state_of_origin" name="state_of_origin">
                                            @forelse($states as $state)
                                                @if($monitoring_and_control_profile && $monitoring_and_control_profile->state_of_origin == $state->id)
                                                    <option value="{{$state->id}}" selected>{{$state->state}}</option>
                                                @else
                                                    <option value="{{$state->id}}" selected>{{$state->state}}</option>
                                                @endif
                                            @empty
                                                <option value="0">No states found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Tribe</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('tribe') ? '  has-danger has-feedback' : '' }}" id="tribe" name="tribe"  @if($monitoring_and_control_profile) value="{{$monitoring_and_control_profile->tribe}}" @endif  required>
                                        @if ($errors->has('tribe'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('tribe') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Update Photo</label>
                                    <div class="col-lg-9">
                                        <input type="file" class="form-control{{ $errors->has('photo') ? '  has-danger has-feedback' : '' }}" id="photo" name="photo">
                                        @if ($errors->has('photo'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-success btn-labeled btn-labeled-right pull-right" id="saveBtn">
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