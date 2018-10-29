<form class="step no-mb" method="POST" action="{{route('beneficiaries.store')}}">
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">2</span>
        Contact Information
        <small class="display-block">Moible and Address Information</small>
    </h3>
    @csrf
    <input type="hidden" name="opcode" id="opcode" value="2">
    <input type="hidden" name="bid" id="bid" value="{{$id}}">
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? '  has-danger has-feedback' : '' }}" id="phone" value="{{old('phone')}}" required  autofocus>
                @if ($errors->has('phone'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control{{ $errors->has('email') ? '  has-danger has-feedback' : '' }}" id="email" value="{{old('email')}}">
                @if ($errors->has('email'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Address:</label>
                <textarea cols="30" rows="6" class="form-control{{ $errors->has('street') ? '  has-danger has-feedback' : '' }}" id="address" name="address" required>{{old('address')}}</textarea>
                @if ($errors->has('street'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('street') }}</span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>City:</label>
                <input type="text" class="form-control{{ $errors->has('city') ? '  has-danger has-feedback' : '' }}" id="city" name="city" value="{{old('city')}}" required>
                @if ($errors->has('city'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('city') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>State:</label>
                <select class="form-control" id="states" name="states">
                    @forelse($states as $state)
                    <option value="{{$state->id}}">{{$state->state}}</option>
                    @empty
                    <option value="0">Others</option>
                    @endforelse
                </select>
            </div>
        </div>
        {{-- <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Local Government Area:</label>
                <select class="form-control{{ $errors->has('lgas_id') ? '  has-danger has-feedback' : '' }}" id="lgas" name="lgas" >
                </select>
                @if ($errors->has('lgas_id'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2"></i>
                    </div>
                    <span class="help-block text-danger">{{ $errors->first('lgas_id') }}</span>
                @endif
            </div>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-md-12">
            <br>
            <input class="btn btn-info pull-right" id="basic-next" value="Submit" type="submit">
        </div>
    </div>
</form>

<br><br>

@if (\Auth::user()->role_id != 7 && \Auth::user()->role_id != 9)

<beneficiary-dependent-component :p="'{{ csrf_token() }}'" :bid="{{$id}}"></beneficiary-dependent-component>
<form action="{{route('beneficiaries.store')}}" method="post">
    @csrf
    <input type="hidden" name="opcode" id="opcode" value="3">
    <input type="hidden" name="bid" id="bid" value="{{$id}}">
    <div class="row">
        <div class="col-md-12">
            <br>
            <input class="btn btn-info pull-right" id="basic-next" value="Next" type="submit">
        </div>
    </div>
</form>

@endif