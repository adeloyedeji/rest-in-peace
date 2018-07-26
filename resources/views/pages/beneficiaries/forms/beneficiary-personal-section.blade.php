<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">1</span>
        Personal info
        <small class="display-block">Details about the beneficiary</small>
    </h3>

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>First name:</label>
                <input type="text" class="form-control" id="fname" placeholder="Fatai" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Last name:</label>
                <input type="text" class="form-control" id="lname" placeholder="Tomori" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Other names:</label>
                <input type="text" class="form-control" id="oname" placeholder="Johnson" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <label>Occupation:</label>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <select name="birth-month" data-placeholder="Occupation" class="select" id="occupation" onchange="changeOccupation()" required>
                            @forelse($occupations as $occupation)
                            <option value="{{$occupation->id}}">{{$occupation->title}}</option>
                            @empty
                            <option value="0">Others</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <label>Date of birth:</label>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select name="birth-month" data-placeholder="Month" class="select" id="month" required>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select name="birth-day" data-placeholder="Day" class="select" id="day" required>
                            @for($i = 1; $i <= 31; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select name="birth-year" data-placeholder="Year" class="select" id="year" required>
                            @for($i = 1900; $i <= date('Y'); $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <label>Gender:</label>
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
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>No. of wives:</label>
                <input type="number" class="form-control" placeholder="Fatai" id="wives" required>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>No. of children:</label>
                <input type="number" class="form-control" placeholder="Tomori" id="child" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input class="btn btn-info" id="step1" value="Save & Continue" type="button">
        </div>
    </div>
</fieldset>