<template>
    <!-- News search -->
    <div class="card card-inverse card-flat no-bt news-results">
        <div class="card-block">
            <p class="">Beneficiarie in project "{{ project.title }}"</p>
            <hr>
            <div class="row">
                <div class="col-md-12">

                    <ul class="media-list search-results-list media-list-bordered" v-if="beneficiaries && beneficiaries.length > 0">
                        <li class="media" v-for="b in beneficiaries" :key="b.id">
                            <div class="media-left">
                                <img :src="b.household_head_photo" alt="" class="rounded min-width-150 min-height-100">
                            </div>

                            <div class="media-body">
                                <h5 class="m-t-10 m-b-10"><a href="#" class="text-lg text-semibold">{{ b.household_head }}</a></h5>
                                <ul class="list-inline text-muted">
                                    <li><i class="icon-folder4 position-left"></i> {{ b.occupation.title }}</li>
                                    <li><i class="icon-history position-left"></i> {{ prettyDate(b.created_at) }}</li>
                                </ul>
                                {{ b.address }}
                            </div>
                        </li>
                    </ul>
                    <ul class="media-list search-results-list media-list-bordered" v-else>
                        <h3>No Beneficiaries assigned yet.</h3>
                    </ul>

                    <!-- <ul class="pagination pagination-flat m-t-30">
                        <li><a href="#"><i class="icon-arrow-left12"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><span>...</span></li>
                        <li><a href="#">13</a></li>
                        <li><a href="#">14</a></li>
                        <li><a href="#">15</a></li>
                        <li><a href="#"><i class="icon-arrow-right13"></i></a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /News search -->
</template>

<script>
export default {
    props: {
        id: {
            required: true,
            type: Number
        },
        p: {
            required: true,
            type: String
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
                console.log(resp.data);
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
                this.showNote('warning', 'Unable to find project. Reload page and try again!');
            })
        },
        prettyDate(date) {
            return Moment(date, 'YYYY-MM-DD HH:mm:ss').startOf('hour').fromNow()
        },
    },
    computed: {
        beneficiaries() {
            return this.$store.getters.getProjectBen;
        },
        project() {
            return this.$store.getters.getProject;
        }
    }
}
</script>
