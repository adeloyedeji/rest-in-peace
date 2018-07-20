<template>
    <fieldset class="step no-mb" id="step1">
        <h3 class="form-wizard-title text-uppercase">
            <span class="form-wizard-count">1</span>
            Personal info
            <small class="display-block">Details about the beneficiary</small>
        </h3>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>First name:</label>
                    <input type="text" class="form-control" placeholder="Fatai" v-model="fname">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>Last name:</label>
                    <input type="text" class="form-control" placeholder="Tomori" v-model="lname">
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label>Other names:</label>
                    <input type="text" class="form-control" placeholder="Fatai Tomori" v-model="oname">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <label>Occupation:</label>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <select name="birth-month" data-placeholder="Occupation" class="select" v-model="occupation">
                                <!-- <option v-for="j of jobs" :value="j.id">{{j.title}}</option> -->
                                <option v-for="j of jobs" :key="j.id" :value="j.id" v-on:selected="newOccupation(j.id)">{{j.title}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6">
                <label>Date of birth:</label>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select name="birth-month" data-placeholder="Month" class="select" v-model="year">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select name="birth-day" data-placeholder="Day" class="select" v-model="day">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                        <div class="form-group">
                            <select name="birth-year" data-placeholder="Year" class="select" v-model="month">
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-4">
                <label>Gender:</label>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="radio-inline">
                                <input type="radio" name="gender" class="styled" checked="checked" v-model="gender">
                                Male
                            </label>

                            <label class="radio-inline">
                                <input type="radio" name="gender" class="styled" v-model="gender">
                                Female
                            </label>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>No. of wives:</label>
                    <input type="number" class="form-control" placeholder="Fatai" v-model="wives">
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="form-group">
                    <label>No. of children:</label>
                    <input type="number" class="form-control" placeholder="Tomori" v-model="child">
                </div>
            </div>
        </div>
    </fieldset>
</template>

<script>
export default {
    props: [

    ], 
    data() {
        return {
            fname: '', 
            lname: '', 
            oname: '', 
            year: '', 
            day: '', 
            month: '', 
            wives: '', 
            child: '', 
            occupation: '', 
            gender: '',
        }
    }, 
    mounted() {
        console.log("Wizard mounted");
        this.getOccupation();
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
        newOccupation: function(newVal) {
            console.log(newVal);
            // if(this.occupation == "others") {
            //     var j = prompt("Enter occupation here");
            //     if(j.length && j.length > 0 && j != "") {
            //         axios.post('/utilities/save-occupation', {
            //             occupation: this.occupation,
            //         }).then((resp) => {
            //             this.$store.commit("setOccupation", this.occupation);
            //         }).catch(error => {
            //             console.log(error);
            //             this.showNote('warning', 'unable to save occupation please try again.');
            //         });
            //     }
            // }
        },
        getOccupation() {
            axios.get('/utilities/get-occupation')
            .then((resp) => {
                resp.data.forEach((o) => {
                    this.$store.commit("setOccupation", o);
                });
            }).catch(error => {
                console.log(error);
                this.showNote('warning', 'Unable to load occupation')
                this.reload();
            })
        }
    }, 
    watch: {
    },
    computed: {
        jobs() {
            return this.$store.getters.getOccupation;
        }, 
    }
}
</script>
