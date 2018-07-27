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
                    <div class="card-title float-right" v-if="beneficiaries === undefined || beneficiaries.length == 0">0</div>
                    <div class="card-title float-right" v-else>{{ beneficiaries.length }}</div>
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
        this.getBeneficiaries(this.id);
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        getBeneficiaries(pid) {
            axios.get(`/projects/get-beneficiaries-by-project/${pid}`)
            .then((resp) => {
                this.$store.commit("setProjectBen", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request. Please refresh and try again.');
            })
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
        },
        beneficiaries() {
            return this.$store.getters.getProjectBen;
        },
    }
}
</script>
