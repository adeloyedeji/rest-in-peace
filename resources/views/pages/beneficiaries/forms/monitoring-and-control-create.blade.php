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
                            <u><b>MONITORING &amp; CONTROL DEPARTMENT</b></u>
                        </h5>
                        <div class="text-center">
                            <div id="capture" style="width:100%;height:500px;margin:0 auto;"></div>
                        </div>
                        <br><br>
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
                                    <label class="control-label col-lg-3">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('name') ? '  has-danger has-feedback' : '' }}" id="name" name="phone" value="{{old('phone')}}" required>
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
                                    <label class="control-label col-lg-3">Amount Collected</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('amount_collected') ? '  has-danger has-feedback' : '' }}" id="amount_collected" name="amount_collected" value="{{old('amount_collected')}}" required>
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
                                    <label class="control-label col-lg-3">Phone Number</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('phone') ? '  has-danger has-feedback' : '' }}" id="phone" name="phone" value="{{old('phone')}}" required>
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
                                    @php $year = date('Y');$month = date('m');$day = date('d');@endphp
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
                                                <option value="{{$state->id}}">{{$state->state}}</option>
                                            @empty
                                                <option value="0">No states found</option>
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