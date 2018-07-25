<template>
    <div class="card card-inverse card-flat">
        <div class="card-block">
            <div class="row m-b-10">
                <div class="col-md-6">
                    <div class="card-title">Date Created</div>
                </div>

                <div class="col-md-6 text-right">
                    <div class="card-title float-right">{{ prettyDate(project.created_at) }}</div>
                </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-md-6">
                    <div class="card-title">Total Beneficiaries</div>
                </div>

                <div class="col-md-6 text-right">
                    <div class="card-title float-right" v-if="project.beneficiaries === undefined || project.beneficiaries.length == 0">0</div>
                    <div class="card-title float-right" v-else>{{ project.beneficiaries.length }}</div>
                </div>
            </div>
        </div>
    </div>
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
            axios.get('/projects/find/' + id)
            .then((resp) => {
                this.$store.commit("setProject", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request.');
            });
        },
        prettyDate(date) {
            return Moment(date, 'YYYY-MM-DD HH:mm:ss').startOf('hour').fromNow()
        }
    },
    computed: {
        project() {
            return this.$store.getters.getProject;
        }
    }
}
</script>
