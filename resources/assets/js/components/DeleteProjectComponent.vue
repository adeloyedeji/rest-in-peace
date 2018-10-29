<template>
    <div>
        <div id="deleteProject" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">Delete Project</div>
                    </div>

                    <div class="modal-body">
                        <p><i class="icon-help position-left"></i>Delete this project</p>
                        <p>Title: {{ project.title }}</p>
                        <p>Code: {{ project.code }}</p>
						<p>Deleting this project will remove its details and all records associated with it.</p>
                        <p>Are you sure you want to continue?</p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2 position-left"></i> Cancel</button>
                        <button class="btn btn-danger" v-on:click="deleteProject"><i class="icon-checkmark3 position-left"></i> Delete</button>
                    </div>
                </div>
            </div>
        </div>
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
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
                callbacks: {
                    afterShow: function() {
                        setTimeout(function() {
                            window.location.href="/projects";
                        }, 1500)
                    }
                }
            }).show();
        },
        getProject(id) {
            axios.get(server + '/projects/find/' + id)
            .then((resp) => {
                this.$store.commit("setProject", resp.data);
            }).catch(error => {
                new Noty({
                    type: 'warning',
                    layout: 'bottomRight',
                    text: 'Unable to find project.',
                }).show();
                // window.location.reload();
            });
        },
        deleteProject() {
            axios.post(server + '/projects/delete', {
                id: this.id
            }).then((resp) => {
                if(resp.data == "404") {
                    new Noty({
                        type: 'warning',
                        layout: 'bottomRight',
                        text: 'Unable to find project.',
                    }).show();
                    // window.location.reload();
                } else {
                    this.showNote('success', 'Project deleted successfully.');
                }
            }).catch(error => {
                new Noty({
                    type: 'warning',
                    layout: 'bottomRight',
                    text: 'Unable to delete project!',
                }).show();
                // window.location.reload();
            });
        }
    },
    computed: {
        project() {
            return this.$store.getters.getProject;
        }
    }
}
</script>
