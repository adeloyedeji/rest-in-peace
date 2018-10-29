<template>
    <div class="card card-inverse card-flat">
        <div class="card-header">
            <div class="card-title">
                <!-- All Projects -->
                <span class="pull-right">
                    <button class="btn btn-default" data-toggle="modal" data-target="#addProject">Add new project</button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 smi mb-1" v-for="p of projects" :key="p.id">
                <center>
                    <a :href="server+'projects/' + p.id" :title="p.code">
                        <i class="fa fa-folder fa-2x"></i>
                        <p>{{ p.title }}</p>
                    </a>
                </center>
            </div>
            <br>
        </div>
    </div>
</template>


<script>
export default {
    props: {

    },
    data() {
        return {
            server: server,
        }
    },
    mounted() {
        this.getProjects();
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        getProjects() {
            axios.get(server + '/projects/get-projects')
            .then((resp) => {
                this.$store.commit("setProjects", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to connect to server. Please check your connection and try again.');
            })
        }
    },
    computed: {
        projects() {
            return this.$store.getters.getProjects;
        }
    }
}
</script>

<style>
    .smi {
        width: 120px;
        height: 120px;
        margin-bottom: 3em;
    }
</style>
