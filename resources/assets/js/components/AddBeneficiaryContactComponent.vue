<template>
    <fieldset class="step no-mb" id="step3">
        <h3 class="form-wizard-title text-uppercase">
            <span class="form-wizard-count">3</span>
            Contact info
            <small class="display-block">Beneficiary contact information.</small>
        </h3>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" name="resume" class="form-control" v-model="phone">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="resume" class="form-control" v-model="email">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Address:</label>
                    <textarea cols="30" rows="10" class="form-control" v-model="address"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label>State:</label>
                    <select class="form-control" v-model="states" @change="changeState($event)">
                        <option v-for="s of states" :key="s.id" :value="s.id">{{s.state}}</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label>Local Government Area:</label>
                    <select class="form-control" v-model="lgas">
                        <option v-for="l of lgas" :key="l.id" :value="l.id">{{l.lga}}</option>
                    </select>
                </div>
            </div>
        </div>
    </fieldset>
</template>

<script>
export default {
    props: {
        
    }, 
    data() {
        return {
            phone: '',
            email: '',
            address: '',
            user_state: '',
            user_state_text: '',
            user_lga: '',
            user_lga_text: '',
        }
    }, 
    mounted() {
        this.getStates();
    }, 
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg
            }).show();
        },
        reload() {
            setTimeout(function() {
                window.location.reload();
            }, 1000);
        },
        getStates() {
            axios.get('/utilities/get-state')
            .then((resp) => {
                resp.data.forEach((s) => {
                    this.$store.commit("setStates", s);
                });
            }).catch(error => {
                this.showNote('warning', 'Unable to load states!');
                this.reload();
            })
        }, 
        changeState(event) {
            if(event.target.options.selectedIndex > -1) {
                this.user_state_text = event.target.options[event.target.options.selectedIndex].innerHTML;
                this.user_state = event.target.options[event.target.options.selectedIndex].value;
                this.loadLga(this.user_state);
            }
        }, 
        async loadLga(user_state) {
            await axios.get(`/utilities/get-lga/${user_state}`)
            .then((resp) => {
                this.$store.commit("setLgas", resp.data);
            }).catch(error => {
                console.log(error);
                this.showNote('warning', 'Unable to load local government areas. Please try again.');
            });
        }
    }, 
    computed: {
        states: {
            get() {
                return this.$store.getters.getStates;
            }, 
            set() {

            }
        }, 
        lgas: {
            get() {
                return this.$store.getters.getLgas;
            }, 
            set: function(newVal) {
                
            }
        }
    }
}
</script>
