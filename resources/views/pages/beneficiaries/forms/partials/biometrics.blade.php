<form class="step no-mb" method="POST" action="{{route('beneficiaries.store')}}">
    <h3 class="form-wizard-title text-uppercase">
        <span class="form-wizard-count">4</span>
        Biometrics Section
        <small class="display-block">Face and finger print capture</small>
    </h3>

    <div class="row">
        <div class="col-md-6">
            <div class="card card-inverse card-flat">
                <div class="card-header">
                    <div class="card-title">User Photo</div>
                </div>
                <div class="card-block">
                    <div id="camera" style="width:100%;height:300px;"></div>
                    <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                    <br>
                    <button type="button" class="btn btn-info" id="snap">Capture Photo</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-inverse card-flat">
                <div class="card-header">
                    <div class="card-title">Photo Preview</div>
                </div>
                <div class="card-block">
                    <div id="preview" style="width:100%;height:300px;"></div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <br><br>
            <p>
                Use the FCDA Biometric Scanner application to capture beneficiary finger print samples.
            </p>
            <p>
                Once you are done capturing, click the verify button below to complete beneficiary enrollment.
            </p>
            <!-- Any file format upload -->
            <div class="card card-inverse card-flat">
                <div class="card-header">
                    <h5 class="card-title">Verify finger print enrollment.</h5>
                </div>
                <div class="card-block">
                    <input type="hidden" name="bid" id="bid" value="{{$id}}">
                    <button class="btn btn-success" id="verifyBtn">Verify Samples</button>
                </div>
            </div>
            <!-- /Any file format upload -->
        </div>
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" type="button" id="saveBtn">Save &amp; Continue</button>
            </div>
        </div>
    </div>
</form>


<!-- Modal with icons -->
<div id="decideModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Confirm</div>
            </div>

            <div class="modal-body">
                <div class="alert alert-success bg-grey-50 alert-styled-left">
                    <span class="text-semibold">Please confirm to continue </span>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                </div>
                <p><i class="icon-help position-left"></i>Save beneficiary without finger prints?</p>
                <p>
                    You are about saving this beneficiary without capturing finger prints data.
                </p>
                <p>
                    Fingerprints makes searching and verifying beneficiaries easy. We recommend you go back and capture fingerprints.
                </p>
                <p>
                    However, you can always capture beneficiary finger prints any time by using the FCDA Bio-metric Scanner on your desktop.
                </p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2 position-left"></i> Go back and capture finger prints.</button>
                <button class="btn btn-primary" type="button" id="continueBtn"><i class="icon-checkmark3 position-left"></i> Save &amp; Continue.</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal with icons -->