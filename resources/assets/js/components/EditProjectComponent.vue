<template>
    <div>
        <!-- Modal with icons -->
        <div id="editProject" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">Edit Project</div>
                    </div>

                    <div class="modal-body">
                        <!-- <div class="alert alert-info alert-styled-left">
                            <span class="text-semibold">Lorem ipsum </span>dolor sit amet
                            <button type="button" class="close" data-dismiss="alert">×</button>
                        </div> -->
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Project Title</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="project.title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Project Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" v-model="project.code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-3">Location</label>
                            <div class="col-lg-9">
                                <textarea cols="30" rows="10" class="form-control" v-model="project.address"></textarea>
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
    props: [
        'id'
    ],
    data() {
        return {
            baseURL: 'http://localhost/rms/fcda/public'
        }
    },
    mounted() {
        this.getProject(this.id)
    },
    methods: {
        getProject(id) {
            axios.get(server + '/projects/find/' + id)
            .then((resp) => {
                this.$store.commit("setProject", resp.data);
            }).catch(error => {
                this.showNote('warning', 'Unable to find project. Reload page and try again!');
            })
        },
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg
            }).show();
        },
        showNoteHook(type, msg, hook) {
            var addr = window.location.href;
            if(hook != 'r') {
                addr = hook;
            }
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
        saveProject: function(event) {
            axios.post(server + '/projects/update', {
                id: this.id,
                title: this.project.title,
                code: this.project.code,
                address: this.project.address,
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
                if(resp.data == "404") {
                    this.showNote('warning', 'Please make sure this project exists and has not been previously deleted.');
                    return;
                }
                this.showNoteHook('success', 'Updates saved.', 'r');
            }).catch(error => {
                console.log(error);
                this.showNote('warning', 'Unable to save project.');
            });
        },
    },
    watch: {

    },
    computed: {
        project() {
            return this.$store.getters.getProject;
        }
    }
}
</script>
