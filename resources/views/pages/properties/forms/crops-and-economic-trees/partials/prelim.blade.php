<div class="row justify-content-center">
    <div class="col-md-10">
        <beneficiary-crop-capture :id="{{$beneficiary->id}}" :property_id="{{$property}}"></beneficiary-crop-capture>
        <br>
        {{-- <form class="step no-mb" method="POST" enctype="multipart/form-data" action="{{route('properties.crops-and-economic-trees.store')}}">
            @csrf
            <input type="hidden" name="bid" id="bid" value="{{$id}}">
            <input type="hidden" name="property_id" id="property_id" value="{{$property_id}}">
            <div class="form-group row">
                <label for="present" class="control-label col-lg-3">Was owner present</label>
                <div class="col-lg-9">
                    <select data-placeholder="Was owner present" class="select" id="present" name="present" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    @if ($errors->has('present'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        <span class="help-block text-danger">{{ $errors->first('present') }}</span>
                    @endif
                </div>
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
                <label for="remarks" class="control-label col-lg-3">Remarks</label>
                <div class="col-lg-9">
                    <textarea name="remarks" id="remarks" cols="30" rows="10" class="form-control{{ $errors->has('area') ? '  has-danger has-feedback' : '' }}">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2"></i>
                        </div>
                        <span class="help-block text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-info pull-right" id="basic-next" value="Submit" type="submit">
                </div>
            </div>
        </form> --}}
    </div>
</div>