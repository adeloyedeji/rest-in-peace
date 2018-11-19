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
                        <input type="hidden" name="structure_id" id="structure_id" value="{{$structure_profile->id}}">
                        <input type="hidden" name="ben_id" id="ben_id" value="{{$ben->id}}">
                        <input type="hidden" name="property_id" id="property_id" value="{{$property->id}}">
                        <input type="hidden" name="project_id" id="project_id" value="{{$project->id}}">

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
                                    <label for="" class="control-label col-lg-3 text-uppercase">Beneficiary Code</label>
                                    <div class="col-lg-9">
                                        <label for="" class="control-label text-uppercase">{{$structure_profile->code}}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="control-label col-lg-3 text-uppercase">Address of Allotee</label>
                                    <div class="col-lg-9">
                                        <label for="" class="control-label text-uppercase">{{$structure_profile->address}}</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Current Interest</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('current_interest') ? '  has-danger has-feedback' : '' }}" id="current_interest" name="current_interest" required>
                                        @if ($errors->has('current_interest'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('current_interest') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Address of Interest</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('interest_address') ? '  has-danger has-feedback' : '' }}" id="interest_address" name="interest_address">
                                        @if ($errors->has('interest_address'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('interest_address') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    <label class="control-label col-lg-3 text-uppercase">Interest</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('interest') ? '  has-danger has-feedback' : '' }}" id="interest" name="interest">
                                        @if ($errors->has('interest'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('interest') }}</span>
                                        @endif
                                    </div>
                                </div>    
                                <div class="form-group row">
                                    @php $year = date('Y');$month = date('m');$day = date('d');@endphp
                                    <label class="control-label col-lg-3">Date of Inspection</label>
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
                                    <label class="control-label col-lg-3 text-uppercase">Title</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control{{ $errors->has('title') ? '  has-danger has-feedback' : '' }}" id="title" name="title">
                                        @if ($errors->has('title'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('title') }}</span>
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
                                        <textarea name="" id="state_of_repairs" cols="30" rows="10" class="form-control"></textarea>
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
                                <button type="button" class="btn btn-success btn-labeled btn-labeled-right pull-right m-r-5" id="saveValBtn">
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
                <button type="button" class="btn btn-primary" id="captureSubBtn">Submit</button>
            </div>
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