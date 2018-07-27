<template>
    <form action="#" class="form-horizontal">
        <div class="form-group">

            <div class="input-group input-group-rounded input-group-lg">
                <div class="input-group-addon"><i class="icon-search4 icon-1x"></i></div>
                <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search Beneficiaries By Name, Date of Birth etc." v-model="query">
            </div>

        </div>
    </form>
</template>

<script>
export default {
    props: {
        id: {
            required: true,
            type: Number,
        }
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
            axios.get(`/projects/search-beneficiaries-by-project/${this.id}/${query}`)
            .then((resp) => {
                console.log(resp.data);
                this.$store.commit("setProjectBen", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to compelete request. Please refresh page and ttry again.');
            })
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
