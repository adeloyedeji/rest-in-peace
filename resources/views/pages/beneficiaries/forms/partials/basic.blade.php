<form class="step no-mb" method="POST" action="{{route('beneficiaries.store')}}">
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">1</span>
        Basic info
        <small class="display-block">General information <i class="text-danger">fields with * are compulsory</i></small>
    </h3>
    @csrf
    <input type="hidden" name="opcode" id="opcode" value="1">
    <input type="hidden" name="project_id" id="project_id" value="{{$project_id}}">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Beneficiary Code*:</label>
                <input type="text" class="form-control{{ $errors->has('code') ? '  has-danger has-feedback' : '' }}" id="code" name="code" placeholder="E.g. FCDA/DRC/2018/2092" value="{{old('code') ? old('code') : 'FCDA/DRC/' . date('Y') . '/'}}" required autofocus>
                @if ($errors->has('code'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('code') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>First name*:</label>
                <input type="text" class="form-control{{ $errors->has('fname') ? '  has-danger has-feedback' : '' }}" id="fname" name="fname" placeholder="Fatai" value="{{old('fname')}}" required>
                @if ($errors->has('fname'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('fname') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Last name*:</label>
                <input type="text" class="form-control{{ $errors->has('lname') ? '  has-danger has-feedback' : '' }}" id="lname" name="lname" placeholder="Tomori" value="{{old('lname')}}" required>
                @if ($errors->has('lname'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('lname') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Other names:</label>
                <input type="text" class="form-control" id="oname" name="oname" placeholder="Johnson"  value="{{old('oname')}}">
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label for="">Occupation*:</label>
                <input type="text" class="form-control{{ $errors->has('occupation') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. Farmer" id="occupation" name="occupation" value="{{old('occupation')}}" required>
                @if ($errors->has('occupation'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('occupation') }}</span>
                @endif
            </div>
        </div>

        @if(\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>No. of wives:</label>
                <input type="number" class="form-control{{ $errors->has('wives_total') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. 2" id="wives" name="wives" value="{{old('wives')}}" required>
                @if ($errors->has('wives_total'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('wives_total') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>No. of children:</label>
                <input type="number" class="form-control{{ $errors->has('child_total') ? '  has-danger has-feedback' : '' }}" placeholder="E.g. 4" id="child" name="child" value="{{old('child')}}" required>
                @if ($errors->has('child_total'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('child_total') }}</span>
                @endif
            </div>
        </div>
        @endif
        <div class="col-md-4 col-sm-12">
            <label>Gender*:</label>
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

        @if(\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)
        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Size of Household:</label>
                <select data-placeholder="Occupation" class="select" id="household_size" name="household_size">
                    <option value="1 - 2">1 - 2</option>
                    <option value="3 - 6">3 - 6</option>
                    <option value="7 - 14">7 - 14</option>
                    <option value="15 - 20">15 - 20</option>
                    <option value="Over 20">Over 20</option>
                </select>
            </div>
        </div>
        @endif

        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Tribe:</label>
                <input type="text" class="form-control{{ $errors->has('tribe') ? '  has-danger has-feedback' : '' }}" id="tribe" name="tribe"  value="{{old('tribe')}}" required>
                @if ($errors->has('tribe'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('tribe') }}</span>
                @endif
            </div>
        </div>

        <div class="col-md-4 col-sm-12">
            @php
                $year = date('Y');
                $month = date('m');
                $day = date('d');
            @endphp
            <label>Date of birth:</label>
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

        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Village:</label>
                <input type="text" class="form-control{{ $errors->has('village') ? '  has-danger has-feedback' : '' }}" id="village" name="village"  value="{{old('village')}}">
                @if ($errors->has('village'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('village') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">



    </div>

    <div class="row">
        <div class="col-md-12">
            <input class="btn btn-info pull-right" id="basic-next" value="Submit" type="submit">
        </div>
    </div>
</form>