<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">2</span>
        Household Information
        <small class="display-block">Beneficiary household details</small>
    </h3>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Name of Household head:</label>
                <input type="text" class="form-control" id="household_head">
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Size of Household:</label>
                <select data-placeholder="Occupation" class="select" id="household_size">
                    <option value="1 - 2">1 - 2</option>
                    <option value="3 - 6">3 - 6</option>
                    <option value="7 - 14">7 - 14</option>
                    <option value="15 - 20">15 - 20</option>
                    <option value="Over 20">Over 20</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <label>Tribe:</label>
                <input type="text" class="form-control" id="tribe">
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="dropzone" id="photo"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <input class="btn btn-info" id="step2" value="Save & Continue" type="button">
        </div>
    </div>
</fieldset>