<template>
    <div>
        <!-- Modal with icons -->
        <div id="addProject" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">Add Project</div>
                    </div>

                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Project Title</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Project Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="code" value="FCDA/DRC/">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Location</label>
                            <div class="col-lg-9">
                                <textarea cols="30" rows="10" class="form-control" v-model="address"></textarea>
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
    </div>
</template>

<script>
export default {
    data() {
        return {
            title: '',
            code: 'FCDA/DRC/',
            address: ''
        }
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg
            }).show();
        },
        showNoteHook(type, msg, hook) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
                callbacks: {
                    afterShow: function() {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500)
                    }
                }
            }).show();
        },
        saveProject() {
            axios.post('/projects/save', {
                code: this.code,
                title: this.title,
                address: this.address,
            }).then((resp) => {
                console.log(resp.data);
                if(resp.data.code) {
                    this.showNote('warning', 'Project code is required!');
                    return;
                }
                if(resp.data.title) {
                    this.showNote('warning', 'Title field is required!');
                    return;
                }
                if(resp.data.address) {
                    this.showNote('warning', 'Address field is required!');
                    return;
                }
                if(resp.data == "success") {
                    this.showNoteHook('success', 'Project saved successfully.');
                }
            }).catch(error => {
                this.showNote('warning', 'Unable to save project. Please reload and try again.');
            })
        }
    },
}
</script>
