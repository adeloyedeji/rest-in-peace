<template>
    <fieldset class="step no-mb" id="step3">
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
            <div class="col-md-4 col-sm-12">
                <label>Date of birth:</label>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select data-placeholder="Month" class="select" id="month" name="month" v-model="year">
                                <option v-for="i in years" :value="i">{{i}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select data-placeholder="Day" class="select" id="day" name="day" v-model="month">
                                <option v-for="i in months" :value="i.value">{{i.text}}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select data-placeholder="Year" class="select" id="year" name="year" v-model="day">
                                <option v-for="i in 31" :value="i">{{i}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="">Occupation*:</label>
                    <input type="text" class="form-control" placeholder="E.g. Farmer" id="occupation" name="occupation" value="" v-model="occupation">
                </div>
            </div>
            <div class="col-md-8 col-sm-4">
                <div class="form-group">
                    <label for="">Remarks:</label>
                    <textarea name="remarks" id="remarks" cols="30" rows="6" class="form-control" v-model="remarks"></textarea>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <label>Marital Status*:</label>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="gender" class="styled" checked="checked" id="male" value="1" v-model="married">
                                Married
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="gender" class="styled" id="female" value="2" v-model="married">
                                Single
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <br>
                <input class="btn btn-info" id="step3" value="Add dependent" type="button" @click="saveDependent">
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
                                <th>Date of Birth</th>
                                <th>Occupation</th>
                                <th>Remarks</th>
                                <th>Marital Status</th>
                            </tr>
                        </thead>
                        <tbody v-if="dependents">
                            <tr v-for="d of dependents[0]" :key="d.id">
                                <td>{{ d.name }}</td>
                                <td v-if="d.gender == 1">Male</td>
                                <td v-else>Female</td>
                                <td>{{ d.dob }}</td>
                                <td>{{ d.occupation }}</td>
                                <td>{{ d.remarks }}</td>
                                <td v-if="d.married == 1">Married</td>
                                <td v-else>Single</td>
                            </tr>
                        </tbody>
                        <tbody v-else>
                            <tr>
                                <td colspan="6"><center>No dependents added.</center></td>
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
            required: true,
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
            months: [
                { text: 'January', value: '01' },
                { text: 'February', value: '02' },
                { text: 'March', value: '03' },
                { text: 'April', value: '04' },
                { text: 'May', value: '05' },
                { text: 'June', value: '06' },
                { text: 'July', value: '07' },
                { text: 'August', value: '08' },
                { text: 'September', value: '09' },
                { text: 'October', value: '10' },
                { text: 'November', value: '11' },
                { text: 'December', value: '12' },
            ],
            year: '2018',
            month: '10',
            day: 24,
            occupation: '',
            remarks: '',
            married: 1,
        }
    },
    mounted() {
        this.getDependents();
        var d = new Date();
        this.year = d.getFullYear();
        this.month = d.getMonth() + 1;
        this.day = d.getDate();
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
            axios.get(`${server}utilities/get-dependents/${this.bid}`)
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
            if(this.married == 1)
            {
                this.showNote('success', 'Note! This beneficiary is married and should be added as a new beneficiary not a dependent!');
            }
            var d;
            if(this.month < 10) {
                this.month = "0" + this.month;
            }
            if(this.day < 10) {
                d = "0" + this.day;
            } else {
                d = this.day;
            }
            var date_of_birth = this.year + '-' + this.month + '-' + d;
            console.log('Date of birth: ' + date_of_birth);
            if(this.nameSet == 1 && this.genderSet == 1) {
                axios.post(server + '/utilities/save-dependent', {
                    n: this.name,
                    g: this.gender,
                    d: date_of_birth,
                    o: this.occupation,
                    r: this.remarks,
                    b: this.bid,
                    m: this.married,
                    i: 0,
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
                    // this.getDependents();
                    this.$store.commit("setDependent", resp.data);
                    this.showNote('success', 'Dependent added successfully.');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                    // this.name = "";
                    // this.age = "";
                    // this.gender = "0";
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
        },
        years: function() {
            var y = [];
            var d = new Date();
            for(var i = 1900; i <= d.getFullYear(); i++) {
                y.push(i);
            }
            return y;
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
