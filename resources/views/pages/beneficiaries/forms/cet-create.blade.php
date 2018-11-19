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
                    
                    <form action="" method="post">
                        <input type="hidden" name="bid" id="bid" value="{{$id}}">

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
                            <u><b>VALUATION of CROP AND ECONOMIC TREES CERTIFICATE</b></u>
                        </h5>
                        <br><br><br>
                        <div class="row p-20">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Project</label>
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
                                        <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" value="{{old('code') ? old('code') : 'FCDA/DRC/' . date('Y') . '/'}}" required>
                                        @if ($errors->has('code'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name of Beneficiary</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('name') ? '  has-danger has-feedback' : '' }}" id="name" name="name"  value="{{old('name')}}">
                                        @if ($errors->has('name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
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
                                        <textarea name="village" id="village" cols="30" rows="8" class="form-control{{ $errors->has('village') ? '  has-danger has-feedback' : '' }}">{{old('village')}}</textarea>
                                        @if ($errors->has('village'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('village') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Location</label>
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
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label class="control-label text-uppercase">Passport photograph</label>
                                    <div id="capture" style="width:100%;height:500px;"></div>
                                </div> 
                                <div id="preview"></div>
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