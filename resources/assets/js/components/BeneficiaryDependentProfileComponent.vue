<template>
    <fieldset>
        <h3 class="form-wizard-title text-uppercase">
            Beneficiary Dependents
            <small class="display-block">Beneficiary Dependents Information.</small>
        </h3>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>Name of Dependent:</label>
                    <input type="text" class="form-control" v-model="name">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>Gender:</label>
                    <select name="gender" id="gender" class="form-control" v-model="gender">
                        <option value="0" disabled>Select gender</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>Age:</label>
                    <input type="number" class="form-control" v-model="age">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br>
                <input class="btn btn-info" id="step3" value="Save & Continue" type="button" @click="saveDependent">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="bg-info">
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody v-if="dependents">
                            <tr v-for="d of dependents" :key="d.id">
                                <td>{{ d.name }}</td>
                                <td v-if="d.gender == 1">Male</td>
                                <td v-else>Female</td>
                                <td>{{ d.age }}</td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="3"><center>No dependents added.</center></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </fieldset>
</template>

<script>
export default {
    props: {
        p: {
            type: String,
            required: true,
        }, 
        bid: {
            type: Number,
            required: false,
        }
    },
    data() {
        return {
            name: '',
            gender: '',
            age: '',
            nameSet: 0,
            ageSet: 0,
            genderSet: 0,
        }
    },
    mounted() {
        this.getDependents();
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        getDependents() {
            axios.get(`/utilities/get-dependents/${this.bid}`)
            .then((resp) => {
                this.$store.commit("setDependent", resp.data);
            }).catch(error => {
                console.log("Error fetching dependents...");
                console.log(error);
                this.showNote('warning', 'Unable to connect. Please check your internet and try again.');
                return;
            });
        },
        saveDependent() {
            if(this.nameSet == 1 && this.genderSet == 1 && this.ageSet == 1) {
                axios.post('/utilities/save-dependent', {
                    n: this.name,
                    g: this.gender,
                    a: this.age,
                    i: this.bid,
                    _token: this.p,
                }).then((resp) => {
                    console.log(resp.data);
                    if(resp.name) {
                        this.showNote('warning', 'Dependent name is required!');
                        return;
                    }
                    if(resp.gender) {
                        this.showNote('warning', 'Dependent age is required!');
                        return;
                    }
                    if(resp.age) {
                        this.showNote('warning', 'Dependent age is required!');
                        return;
                    }
                    if(resp == "404") {
                        this.showNote('warning', 'Beneficiary not found. Please create beneficiary before assigning dependents!');
                        return;
                    }
                    this.getDependents();
                    // this.$store.commit("setDependent", resp.data);
                    this.showNote('success', 'Dependent added successfully.');
                }).catch(error => {
                    console.log("Error saving dependent...");
                    console.log(error);
                    this.showNote('warning', 'Unable to connect. Please check you internet and try again.');
                    return;
                });
            }
        }
    },
    computed: {
        dependents() {
            return this.$store.getters.getDependents;
        }
    },
    watch: {
        name() {
            console.log(this.name);
            if(this.name.length <= 0 || this.name == "") {
                this.nameSet = 0;
            } else {
                this.nameSet = 1;
            }
        },
        gender() {
            console.log(this.gender);
            if(this.gender != 1 && this.gender != 2) {
                this.genderSet = 0;
            } else {
                this.genderSet = 1;
            }
        },
        age() {
            console.log(this.age);
            if(this.age <= 0 || !this.age || this.age == "") {
                this.ageSet = 0;
            } else {
                this.ageSet = 1;
            }
        }
    }
}
</script>
