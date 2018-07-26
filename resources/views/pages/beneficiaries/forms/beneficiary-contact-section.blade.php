<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">3</span>
        Contact info
        <small class="display-block">Beneficiary contact information.</small>
    </h3>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="resume" class="form-control" id="phone">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="resume" class="form-control" id="email">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Address:</label>
                <textarea cols="30" rows="10" class="form-control" id="address"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>City:</label>
                <input type="text" class="form-control" id="city">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>State:</label>
                <select class="form-control" id="states" onchange="changeState()">
                    @forelse($states as $state)
                    <option value="{{$state->id}}">{{$state->state}}</option>
                    @empty
                    <option value="0">Others</option>
                    @endforelse
                </select>
            </div>
        </div>
        <div class="col-md-12 col-sm-12">
            <div class="form-group">
                <label>Local Government Area:</label>
                <select class="form-control" id="lgas">
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br>
            <input class="btn btn-info" id="step3" value="Save & Continue" type="button">
        </div>
    </div>
</fieldset>