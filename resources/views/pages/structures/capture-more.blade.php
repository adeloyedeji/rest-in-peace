@extends('layouts.app')

@section('title')
  | Structure Valuation
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
                    
                    <form method="POST" action="{{route('structures.store-another-property')}}">
                        @csrf
                        {{-- <input type="hidden" name="anthony" id="anthony" value="{{csrf_token()}}"> --}}
                        <input type="hidden" name="ben_id" id="ben_id" value="{{$ben->id}}">
                        <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">
                        <input type="hidden" name="property_code" id="property_code" value="{{$property->f_c_d_a_structure_beneficiary_code}}">
                        <input type="hidden" name="prop_id" id="prop_id" value="{{$property->id}}">

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
                            <u><b>DESCRIPTION / CONSTRUCTION DETAILS</b></u>
                        </h5>
                        <h5 class="text-center text-uppercase">
                                <u><b>Project: {{$project->title}}</b></u>
                            </h5>
                        <div class="text-center">
                            <img src="{{$ben->photo}}" alt="{{$ben->name}}" style="width:200px;height:200px;">
                        </div>
                        <br><br><br>
                        <div class="row p-20">
                            <div class="col-md-6 col-sm-12"> 
                                <div class="form-group row">
                                    <label for="" class="control-label col-lg-3 text-uppercase">Name</label>
                                    <div class="col-lg-9">
                                        <label for="" class="control-label text-uppercase">{{$ben->name}}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="control-label col-lg-3 text-uppercase">Property Code</label>
                                    <div class="col-lg-9">
                                        <label for="" class="control-label text-uppercase">{{$property->f_c_d_a_structure_beneficiary_code}}</label>
                                    </div>
                                </div>
                                    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Name of village</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('village') ? '  has-danger has-feedback' : '' }}" id="village" name="village" value="">
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
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Location</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('location') ? '  has-danger has-feedback' : '' }}" id="location" name="location" value="">
                                        @if ($errors->has('location'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('location') }}</span>
                                        @endif
                                    </div>
                                </div>          
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Size of Plots</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('size_of_plots') ? '  has-danger has-feedback' : '' }}" id="size_of_plots" name="size_of_plots">
                                        @if ($errors->has('size_of_plots'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('size_of_plots') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Building Plan</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('building_plan') ? '  has-danger has-feedback' : '' }}" id="building_plan" name="building_plan">
                                        @if ($errors->has('building_plan'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('building_plan') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Type of Development</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('type_of_development') ? '  has-danger has-feedback' : '' }}" id="type_of_development" name="type_of_development">
                                        @if ($errors->has('type_of_development'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('type_of_development') }}</span>
                                        @endif
                                    </div>
                                </div> 
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Roof</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('roof') ? '  has-danger has-feedback' : '' }}" id="roof" name="roof">
                                        @if ($errors->has('roof'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('roof') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Ceiling</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('ceiling') ? '  has-danger has-feedback' : '' }}" id="ceiling" name="ceiling">
                                        @if ($errors->has('ceiling'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('ceiling') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Wall</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('wall') ? '  has-danger has-feedback' : '' }}" id="wall" name="wall">
                                        @if ($errors->has('wall'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('wall') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Window</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('window') ? '  has-danger has-feedback' : '' }}" id="window" name="window">
                                        @if ($errors->has('window'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('window') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Door</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('door') ? '  has-danger has-feedback' : '' }}" id="door" name="door">
                                        @if ($errors->has('door'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('door') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Floor</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('floor') ? '  has-danger has-feedback' : '' }}" id="floor" name="floor">
                                        @if ($errors->has('floor'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('floor') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Fence</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('fence') ? '  has-danger has-feedback' : '' }}" id="fence" name="fence">
                                        @if ($errors->has('fence'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('fence') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">State of Repairs</label>
                                    <div class="col-lg-9">
                                        <textarea name="state_of_repairs" id="state_of_repairs" cols="30" rows="10" class="form-control"></textarea>
                                        @if ($errors->has('state_of_repairs'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('state_of_repairs') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Accomodation</label>
                                    <div class="col-lg-9">
                                        <textarea name="accomodation" id="accomodation" cols="30" rows="10" class="form-control"></textarea>
                                        @if ($errors->has('accomodation'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('accomodation') }}</span>
                                        @endif
                                    </div>
                                </div> 
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <br>
                                <button type="submit" class="btn btn-success btn-labeled btn-labeled-right pull-right m-r-5" id="saveAnotherBtns">
                                    <b><i class="icon-checkmark3"></i></b> Capture Valuation
                                </button>
                                @if (count($structure) > 0)
                                    <button type="button" class="btn btn-success btn-labeled btn-labeled-right" id="saveSubBtn" data-toggle="modal" data-target="#constructionModal">
                                        <b><i class="icon-versions"></i></b> Capture Sub-valuation
                                    </button>
                                    <button type="button" class="btn btn-success btn-labeled btn-labeled-right" id="finalize" data-toggle="modal" data-target="#finalizeModal">
                                        <b><i class="icon-versions"></i></b> Others
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success btn-labeled btn-labeled-right" id="saveSubBtn" style="display:none;" data-toggle="modal" data-target="#constructionModal">
                                        <b><i class="icon-versions"></i></b> Capture Sub-valuation
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /Basic form steps wizard -->
            </div>
        </div>
    </div>
</section>

<!-- Sub properties modal -->
<div id="constructionModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{route('structures.store-sub')}}" method="post">
                @csrf
                @if($structure)
                    <input type="hidden" name="pid" id="pid" value="{{$structure->id}}">
                @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">CONSTRUCTION DETAILS</div>
                </div>
    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="center-block">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Roof</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_roof') ? '  has-danger has-feedback' : '' }}" id="construction_roof" name="construction_roof">
                                        @if ($errors->has('construction_roof'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_roof') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Ceiling</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_ceiling') ? '  has-danger has-feedback' : '' }}" id="construction_ceiling" name="construction_ceiling">
                                        @if ($errors->has('construction_ceiling'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_ceiling') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Wall</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_wall') ? '  has-danger has-feedback' : '' }}" id="construction_wall" name="construction_wall">
                                        @if ($errors->has('construction_wall'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_wall') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Window</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_window') ? '  has-danger has-feedback' : '' }}" id="construction_window" name="construction_window">
                                        @if ($errors->has('construction_window'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_window') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Door</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_door') ? '  has-danger has-feedback' : '' }}" id="construction_door" name="construction_door">
                                        @if ($errors->has('construction_door'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_door') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Floor</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('construction_floor') ? '  has-danger has-feedback' : '' }}" id="construction_floor" name="construction_floor">
                                        @if ($errors->has('construction_floor'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('construction_floor') }}</span>
                                        @endif
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="captureSubBtns">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Sub properties modal -->
<!-- Finalize modal -->
<div id="finalizeModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">OTHERS</div>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="center-block">
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">External Works</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('external_works') ? '  has-danger has-feedback' : '' }}" id="external_works" name="external_works">
                                    @if ($errors->has('external_works'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('external_works') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Services</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('services') ? '  has-danger has-feedback' : '' }}" id="services" name="services">
                                    @if ($errors->has('services'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('services') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Electricity</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('electricity') ? '  has-danger has-feedback' : '' }}" id="electricity" name="electricity">
                                    @if ($errors->has('electricity'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('electricity') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Water</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('water') ? '  has-danger has-feedback' : '' }}" id="water" name="water">
                                    @if ($errors->has('water'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('water') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Valuation Data</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('valuation_data') ? '  has-danger has-feedback' : '' }}" id="valuation_data" name="valuation_data">
                                    @if ($errors->has('valuation_data'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('valuation_data') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Valuation</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('valuation') ? '  has-danger has-feedback' : '' }}" id="valuation" name="valuation">
                                    @if ($errors->has('valuation'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('valuation') }}</span>
                                    @endif
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="control-label col-lg-3 text-uppercase">Compensation (&#8358;)</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control{{ $errors->has('compensation') ? '  has-danger has-feedback' : '' }}" id="compensation" name="compensation">
                                    @if ($errors->has('compensation'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('compensation') }}</span>
                                    @endif
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="othersBtn">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- /Finalize modal -->

@endsection