<div class="row justify-content-center">
    <div class="col-md-8">
        <form class="step no-mb" method="POST" enctype="multipart/form-data" action="{{route('properties.structure.store')}}">
            <h3 class="form-wizard-title text-uppercase">
                <span class="form-wizard-count">1</span>
                Structure Information
                <small class="display-block">Basic property data</small>
            </h3>
            @csrf
            <input type="hidden" name="bid" id="bid" value="{{$id}}">
            <input type="hidden" name="property_id" id="property_id" value="{{$property_id}}">
            <div class="form-group row">
                <label for="type" class="control-label col-lg-3">Type</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('type') ? '  has-danger has-feedback' : '' }}" id="type" name="type" placeholder="Type of structure" value="{{old('type')}}" required>
                @if ($errors->has('type'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('type') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label for="address" class="control-label col-lg-3">Address</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('address') ? '  has-danger has-feedback' : '' }}" id="address" name="address" placeholder="Address" value="{{old('address')}}" required>
                @if ($errors->has('address'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label for="size" class="control-label col-lg-3">Size</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('size') ? '  has-danger has-feedback' : '' }}" id="size" name="size" placeholder="Size" value="{{old('size')}}" required>
                @if ($errors->has('size'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('size') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label for="area" class="control-label col-lg-3">Area</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('area') ? '  has-danger has-feedback' : '' }}" id="area" name="area" placeholder="Area" value="{{old('area')}}" required>
                @if ($errors->has('area'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('area') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label for="description" class="control-label col-lg-3">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control col-lg-9 {{ $errors->has('area') ? '  has-danger has-feedback' : '' }}">{{old('description')}}</textarea>
                @if ($errors->has('description'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                @endif
            </div>
            <div class="form-group row">
                <label for="date_of_inspection" class="control-label col-lg-3">Date of Inspection</label>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <select data-placeholder="Year" class="select" id="year" name="year" required>
                                @for($i = 1900; $i <= date('Y'); $i++)
                                    @if ($i == date('Y'))
                                        <option selected value="{{$i}}">{{$i}}</option>
                                    @else
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endif
                                @endfor
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select data-placeholder="Month" class="select" id="month" name="month" required>
                                <option @if(date('m') == '01' || date('m') == '1') selected @endif value="01">January</option>
                                <option @if(date('m') == '02' || date('m') == '2') selected @endif value="02">February</option>
                                <option @if(date('m') == '03' || date('m') == '3') selected @endif value="03">March</option>
                                <option @if(date('m') == '04' || date('m') == '4') selected @endif value="04">April</option>
                                <option @if(date('m') == '05' || date('m') == '5') selected @endif value="05">May</option>
                                <option @if(date('m') == '06' || date('m') == '6') selected @endif value="06">June</option>
                                <option @if(date('m') == '07' || date('m') == '7') selected @endif value="07">July</option>
                                <option @if(date('m') == '08' || date('m') == '8') selected @endif value="08">August</option>
                                <option @if(date('m') == '09' || date('m') == '9') selected @endif value="09">September</option>
                                <option @if(date('m') == '10') selected @endif value="10">October</option>
                                <option @if(date('m') == '11') selected @endif value="11">November</option>
                                <option @if(date('m') == '12') selected @endif value="12">December</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select data-placeholder="Day" class="select" id="day" name="day" required>
                                @for($i = 1; $i <= 31; $i++)
                                    @if (date('d') == $i)
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

            <div class="form-group row">
                <label for="roof" class="control-label col-lg-3">Roof</label>
                <input type="text" class="form-control col-lg-9{{ $errors->has('roof') ? '  has-danger has-feedback' : '' }}" id="roof" name="roof" placeholder="Roof" value="{{old('roof')}}">
                @if ($errors->has('roof'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('roof') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="ceiling" class="control-label col-lg-3">Ceiling</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('ceiling') ? '  has-danger has-feedback' : '' }}" id="ceiling" name="ceiling" placeholder="Ceiling" value="{{old('ceiling')}}">
                @if ($errors->has('ceiling'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('ceiling') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="wall" class="control-label col-lg-3">Wall</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('wall') ? '  has-danger has-feedback' : '' }}" id="wall" name="wall" placeholder="Wall" value="{{old('wall')}}">
                @if ($errors->has('wall'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('wall') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="window" class="control-label col-lg-3">Window</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('window') ? '  has-danger has-feedback' : '' }}" id="window" name="window" placeholder="Window" value="{{old('window')}}">
                @if ($errors->has('window'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('window') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="door" class="control-label col-lg-3">Door</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('door') ? '  has-danger has-feedback' : '' }}" id="door" name="door" placeholder="Door" value="{{old('door')}}">
                @if ($errors->has('door'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('door') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="fence" class="control-label col-lg-3">Fence</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('fence') ? '  has-danger has-feedback' : '' }}" id="fence" name="fence" placeholder="Fence" value="{{old('fence')}}">
                @if ($errors->has('fence'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('fence') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="state_of_repairs" class="control-label col-lg-3">State of Repairs</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('state_of_repairs') ? '  has-danger has-feedback' : '' }}" id="state_of_repairs" name="state_of_repairs" placeholder="State of repairs" value="{{old('state_of_repairs')}}">
                @if ($errors->has('state_of_repairs'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('state_of_repairs') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="accomodation" class="control-label col-lg-3">Accomodation</label>
                <input type="text" class="form-control col-lg-9 {{ $errors->has('accomodation') ? '  has-danger has-feedback' : '' }}" id="accomodation" name="accomodation" placeholder="Accomodation" value="{{old('accomodation')}}">
                @if ($errors->has('accomodation'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('accomodation') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="proof" class="control-label col-lg-3">Proof</label>
                <input type="file" class="form-control col-lg-9{{ $errors->has('proof') ? '  has-danger has-feedback' : '' }}" id="proof" name="proof" required>
                @if ($errors->has('proof'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('proof') }}</span>
                @endif
            </div>

            <div class="form-group row">
                <label for="valuation_of_structure" class="control-label col-lg-3">Valuation of Structure</label>
                <input type="number" class="form-control col-lg-9 {{ $errors->has('valuation_of_structure') ? '  has-danger has-feedback' : '' }}" id="valuation_of_structure" name="valuation_of_structure" placeholder="Valuation of Structure" value="{{old('valuation_of_structure')}}" required>
                @if ($errors->has('valuation_of_structure'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('valuation_of_structure') }}</span>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-info pull-right" id="basic-next" value="Submit" type="submit">
                </div>
            </div>
        </form>
    </div>
</div>