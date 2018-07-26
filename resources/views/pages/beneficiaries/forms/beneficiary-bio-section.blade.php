<fieldset>
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">5</span>
        Beneficiary Bio-metric Section
        <small class="display-block">Beneficiary fingerprint and facial scan data</small>
    </h3>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div id="camera" style="width:100%;height:500px !important;">User Photo</div>
            <br>
            <button type="button" class="btn btn-info" id="snap">Take Snapshot</button>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="dropzone" id="preview">Photo Preview</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <br>
            <div class="card card-inverse card-flat">
                <div class="card-header">
                    <div class="card-title"><i class="icon-user-lock position-left"></i>Fingerprint Scan</div>
                </div>
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>L1</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>L2</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>L3</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>L4</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>L5</label>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1">
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>R1</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>R2</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>R3</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>R4</label>
                    </div>
                    <div class="col-md-2" style="border: 1px #ccc solid;border-radius: 5px;height:100px;">
                        <label>R5</label>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <br>
            <input class="btn btn-info" id="step2" value="Finalize registration" type="button">
        </div>
    </div>
</fieldset>