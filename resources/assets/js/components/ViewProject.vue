<template>
    <!-- Project details -->
    <div class="card no-mb no-bb">
        <div class="card-header">
            <div class="card-title text-xlg">
                {{ project.title }}
                <span class="pull-right">
                    <button class="btn btn-default" data-toggle="modal" data-target="#editProject"><i class="fa fa-edit"></i></button>
                </span>
            </div>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-info" :href="baseURL + 'beneficiaries/create?project_id=' + project.id">Add Beneficiary</a>
                    <button class="btn btn-primary" id="complete" @click="completeProject(id, 2)">Mark as completed</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <p></p>
                    <button class="btn btn-success" id="active" @click="completeProject(id, 1)">Mark as active</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteProject">DELETE PROJECT</button>
                </div>
            </div>

            <div class="row m-t-20">
                <div class="col-md-12">
                    <h4 class="m-b-10 text-semibold">Project Code</h4>
                    <p class="text-size-large">{{ project.code }}</p>
                    <p></p>
                    <h4 class="m-b-10 text-semibold">Project Location</h4>
                    <p class="text-size-large">{{ project.address }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /Project details -->
</template>


<script>
export default {
    props: {
        id: {
            type: Number,
            required: true,
        }
    },
    data() {
        return {
            baseURL: server,
        }
    },
    mounted() {
        this.getProject(this.id);
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        getProject(id) {
            axios.get(server + '/projects/find/' + id)
            .then((resp) => {
                this.$store.commit("setProject", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request.');
            });
        },
        completeProject(id, status) {
            axios.post(server + '/projects/status', {
                id: id,
                status: status,
            }).then((resp) => {
                if(resp.data == 1) {
                    this.showNote('success', 'Project status was successfully updated.');
                } else {
                    this.showNote('warning', 'Unable to update status. Please try again.');
                }
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request.');
            })
        }
    },
    computed: {
        project() {
            return this.$store.getters.getProject;
        }
    }
}
</script>
