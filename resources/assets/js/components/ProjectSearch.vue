<template>
    <form action="#" class="form-horizontal">
        <div class="form-group p-t-40">

            <div class="input-group input-group-rounded input-group-lg">
                <div class="input-group-addon"><i class="icon-search4 icon-1x"></i></div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search projects database" v-model="query">
            </div>

        </div>
    </form>
</template>

<script>
export default {
    props: {

    },
    data() {
        return {
            query: '',
        }
    },
    mounted() {

    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        search(query) {
            axios.get(`/projects/search/${query}`)
            .then((resp) => {
                console.log(resp.data);
                this.$store.commit("setProjects", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request. Please refresh this page and try again.');
            });
        }
    },
    computed: {

    },
    watch: {
        query() {
            this.search(this.query);
        }
    }
}
</script>
