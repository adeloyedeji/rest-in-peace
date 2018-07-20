<fieldset class="step no-mb" id="step1">
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">1</span>
        Personal info
        <small class="display-block">Details about the beneficiary</small>
    </h3>

    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>First name:</label>
                <input type="text" class="form-control" id="fname" placeholder="Fatai">
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Last name:</label>
                <input type="text" class="form-control" id="lname" placeholder="Tomori">
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>Other names:</label>
                <input type="text" class="form-control" id="oname" placeholder="Johnson">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <label>Occupation:</label>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <select name="birth-month" data-placeholder="Occupation" class="select" id="occupation" onchange="changeOccupation()">
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
                        <select name="birth-month" data-placeholder="Month" class="select" id="month">
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
                        <select name="birth-day" data-placeholder="Day" class="select" id="day">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="form-group">
                        <select name="birth-year" data-placeholder="Year" class="select" id="year">
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
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
                            <input type="radio" name="gender" class="styled" checked="checked" id="male">
                            Male
                        </label>

                        <label class="radio-inline">
                            <input type="radio" name="gender" class="styled" id="female">
                            Female
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>No. of wives:</label>
                <input type="number" class="form-control" placeholder="Fatai" id="wives">
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="form-group">
                <label>No. of children:</label>
                <input type="number" class="form-control" placeholder="Tomori" id="child">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <input class="btn btn-info" id="step1" value="Save & Continue" type="button">
        </div>
    </div>
</fieldset>