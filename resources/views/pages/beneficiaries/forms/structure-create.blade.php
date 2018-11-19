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

                    @if(\Session::has('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert bg-success alert-styled-left">
                                <span class="text-semibold">Success!</span> {{Session::get('success')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(\Session::has('warning'))
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="alert bg-warning alert-styled-left">
                                    <span class="text-semibold">Warning!</span> {{Session::get('warning')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(\Session::has('error'))
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="alert bg-danger alert-styled-left">
                                    <span class="text-semibold">Warning!</span> {{Session::get('error')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <form>
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
                            <u><b>VALUATION of STRUCTURE CERTIFICATE</b></u>
                        </h5>
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
                                    <label class="control-label col-lg-3 text-uppercase">Beneficiary Code</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" value="FCDA/DRC/GRK/0001" required>
                                        @if ($errors->has('code'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Name of Beneficiary</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('name') ? '  has-danger has-feedback' : '' }}" id="name" name="name">
                                        @if ($errors->has('name'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Name of village</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('village') ? '  has-danger has-feedback' : '' }}" id="village" name="village">
                                        @if ($errors->has('village'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('village') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Address of Property</label>
                                    <div class="col-lg-9">
                                        <textarea name="address" id="address" cols="30" rows="8" class="form-control{{ $errors->has('address') ? '  has-danger has-feedback' : '' }}"></textarea>
                                        @if ($errors->has('address'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-12">
                                  
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Gender</label>
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
                                    <label class="control-label col-lg-3 text-uppercase">Passport photograph</label>
                                    <div class="col-lg-9">
                                        <div id="capture" style="width:100%;height:500px;"></div>
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