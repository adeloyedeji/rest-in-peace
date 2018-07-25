<!-- Modal with icons -->
<div id="editBeneficiary" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Edit - {{ $beneficiary->household_head }}</div>
            </div>

            <div class="modal-body">
                <div class="form-group row">
                    <label class="control-label col-lg-3">Household Head</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="household_head_edit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3">Date of Birth</label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control" id="dob_edit">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label col-lg-3">Phone</label>
                    <div class="col-lg-9">
                        <input class="form-control" type="text" id="phone_edit">
                        {{-- <textarea cols="30" rows="10" class="form-control" v-model="address"></textarea> --}}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2 position-left"></i> Close</button>
                <button class="btn btn-primary" v-on:click="saveProject"><i class="icon-checkmark3 position-left"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<!-- /Modal with icons --> 