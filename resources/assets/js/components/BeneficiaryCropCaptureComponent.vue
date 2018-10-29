<template>
    <div>
        <fieldset class="step no-mb" id="step3">
            <div class="row">
                <div class="col-md-12 col-sm-">
                    <div class="form-group">
                        <label for="">Property</label>
                        <select name="property_id" id="property_id" class="form-control" v-model="property_id">
                            <option v-for="p in properties" :value="p.id">{{p.property_code}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Name of Crop/Tree:</label>
                        <select name="crop" id="crop" class="form-control" v-model="scrop">
                            <!-- <option v-for="(item, index) in crops" :value="index">{{item}}</option> -->
                            <option v-for="crop in crops" :value="crop">{{crop}}</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Number of items:</label>
                        <input type="number" class="form-control" v-model="items">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Size of farm:</label>
                        <input type="text" class="form-control" v-model="size">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Grading:</label>
                        <select name="grading" id="grading" class="form-control" v-model="grade">
                            <option value="0" disabled>Select grade</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label>Valuation:</label>
                        <input type="text" class="form-control" v-model="valuation">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <br>
                    <input class="btn btn-info" id="step3" value="Add Crop" type="button" @click="saveCrop">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <br>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="bg-info">
                                    <th>Property</th>
                                    <th>Name of Crop/Tree</th>
                                    <th>Number of items</th>
                                    <th>Size of farm</th>
                                    <th>Grading</th>
                                    <th>Valuation</th>
                                </tr>
                            </thead>
                            <tbody v-if="beneficiaryCrops && beneficiaryCrops.length > 0">
                                <tr v-for="cr in beneficiaryCrops">
                                    <td>{{cr.property.property_code}}</td>
                                    <td>{{getCropName(cr.crop_grades_id)}}</td>
                                    <td>{{cr.number_of_items}}</td>
                                    <td>{{cr.size_of_farm}}</td>
                                    <td>{{cr.grade}}</td>
                                    <td>{{cr.valuation}}</td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5"><h4 class="text-center">No records found.</h4></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br>
        <div class="step no-mb">
            <div class="form-group row">
                <label for="present" class="control-label col-lg-3">Was owner present</label>
                <div class="col-lg-9">
                    <select data-placeholder="Was owner present" class="select" id="present" name="present" v-model="present">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_of_inspection" class="control-label col-lg-3">Date of Inspection</label>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <select data-placeholder="Year" class="select" id="year" name="year" v-model="year">
                                <option v-for="i in years" :value="i">{{i}}</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select data-placeholder="Month" class="select" id="month" name="month" v-model="month">
                                <option v-for="i in months" :value="i.value">{{i.text}}</option>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select data-placeholder="Day" class="select" id="day" name="day" v-model="day">
                                <option v-for="i in 31" :value="i">{{i}}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="remarks" class="control-label col-lg-3">Remarks</label>
                <div class="col-lg-9">
                    <textarea name="remarks" id="remarks" cols="30" rows="10" class="form-control" v-model="remarks"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="remarks" class="control-label col-lg-3">Total</label>
                <div class="col-lg-9">
                    <input type="number" class="form-control" id="total" v-model="total">
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-info pull-right" @click="saveProperty">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            required: true,
            type: Number
        },
        property_id: {
            required: true,
            type: Number,
        }
    },
    data() {
        return {
            scrop: 'Mango',
            items: 1,
            size: '7.5mm',
            grade: 'A',
            valuation: 7000,
            crop_id: 1,
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
            present: 'Yes',
            year: '2018',
            month: '10',
            day: 7,
            remarks: '',
            total: 0,
        }
    },
    mounted() {
        this.getCrops();
        this.getCropsName();
        this.getBeneficiaryCrops();
        var d = new Date();
        this.year = d.getFullYear();
        this.month = d.getMonth() + 1;
        this.day = d.getDate();
        this.getBeneficiaryProjects();
        this.getBeneficiaryProperties();
        this.total = this.totalValuation;
        console.log('starting valuation: ' + this.total);
    },
    methods: {
        showNote(type, msg) {
            var notification = new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).on('afterShow', function() {
                setTimeout(function() {
                    notification.close();
                }, 1500);
            }).show();
        },
        getCrops() {
            axios.get(server + 'utilities/get-crops')
            .then((resp) => {
                this.$store.commit("setCrops", resp.data);
            }).catch(error => {
                console.log('Error fetching crops!');
                console.error(error);
                this.showNote('error', 'Error fetching crops!');
            })
        },
        getCropsName() {
            axios.get(server + 'utilities/get-crops-distinct-name')
            .then((resp) => {
                this.$store.commit("setCropsName", resp.data);
            }).catch(error => {
                console.log('Error fetching crops list');
                console.error(error);
                this.showNote('error', 'Unable to load crops list!');
            });
        },
        getCropName(id) {
            let c = this.$store.getters.getCrops;
            var selected = c.find( (p) => {
                return p.id === id;
            });
            return selected.crop;
        },
        getCropValue(cropName, grade) {
            let c = this.$store.getters.getCrops;
            var selected = c.find( (p) => {
                if(p.crop == cropName && p.grade == grade) {
                    return p;
                }
            });
            return selected;
        },
        valuateCrop(c, g) {
            var selected = this.getCropValue(c, g);
            this.valuation = selected.price * this.items;
            this.crop_id = selected.id;
        },
        saveCrop() {
            axios.post(server + 'properties/crops-and-economic-trees/store/item', {
                crop_grades_id: this.crop_id,
                property_id: this.property_id,
                number_of_items: this.items,
                size_of_farm: this.size,
                grade: this.grade,
                valuation: this.valuation,
                beneficiary_id: this.id
            })
            .then((resp) => {
                console.log('Response from controller');
                console.log(resp.data);
                if(resp.data.property_id && !resp.data.id)
                {
                    this.showNote('error', 'Please select a valid property!');
                    return false;
                }
                this.$store.commit("setbeneficiaryCrops", resp.data);
                this.$store.commit("setCropTotalValuation", this.valuation);
            }).catch(error => {
                console.log('Unable to save data.');
                console.error(error);
                this.showNote('error', 'Unable to save data.');
            });
        },
        getBeneficiaryCrops() {
            axios.get(server + 'properties/crops-and-economic-trees/item/' + this.id + '/' + this.property_id)
            .then((resp) => {
                let d = resp.data;
                d.forEach(item => {
                    this.$store.commit("setbeneficiaryCrops", item);
                    this.$store.commit("setCropTotalValuation", item.valuation);
                });
            }).catch(error => {
                console.log('Unable to fetch beneficiary crop data.');
                console.error(error);
                this.showNote('error', 'Unable to fetch beneficiary crop data. Please reload page to get crop data.');
            })
        },
        getBeneficiaryProjects() {
            axios.get(server + 'projects/beneficiary-projects/' + this.id)
            .then((resp) => {
                let d = resp.data;
                console.log(d);
                d.forEach(item => {
                    this.$store.commit("setBeneficiaryProjects", item);
                });
            })
            .catch(error => {
                console.log('Unable to fetch beneficiary projects');
                console.error(error);
                this.showNote('error', 'Unable to load project. Please refresh page and try again.');
            });
        },
        getBeneficiaryProperties() {
            axios.get(server + 'projects/beneficiary-properties/' + this.id + '/1')
            .then((resp) => {
                let d = resp.data;
                console.log('properties');
                console.log(d);
                d.forEach(item => {
                    this.$store.commit("setBeneficiaryProperties", item);
                });
            })
            .catch(error => {
                console.log('Unable to fetch beneficiary properties');
                console.error(error);
                this.showNote('error', 'Unable to load project. Please refresh page and try again.');
            });
        },
        saveProperty() {
            var d;
            if(this.month < 10) {
                this.month = "0" + this.month;
            }
            if(this.day < 10) {
                d = "0" + this.day;
            } else {
                d = this.day;
            }
            var date_of_inspection = this.year + '-' + this.month + '-' + d;
            console.log('Date of inspection: ' + date_of_inspection);
            axios.post(server + 'properties/crops-and-economic-trees/store', {
                properties_id: this.property_id,
                owner_present: this.present,
                date_of_inspection: date_of_inspection,
                remarks: this.remarks,
                total: this.totalValuation,
            })
            .then((resp) => {
                console.log('Response from saving crop data.');
                console.log(resp.data);
                if(resp.data.properties_id) {
                    this.showNote('warning', 'Cannot find property ID.');
                    return false;
                }
                if(resp.data.owner_present) {
                    this.showNote('warning', '');
                    return false;
                }
                if(resp.data.date_of_inspection) {
                    this.showNote('warning', 'Invalid date of inspection. Please select a valid date of inspection');
                    return false;
                }
                if(resp.data.remarks) {
                    this.showNote('warning', 'Remarks cannot contain illegal characters');
                    return false;
                }
                if(resp.data.total) {
                    this.showNote('warning', 'Please enter the correct total valuation.');
                    return false;
                }
                this.showNote('success', 'Data successfully captured.');
                var uid = this.id;
                setTimeout(function(){
                    window.location.href = server + 'beneficiaries/' + uid;
                }, 1600);
            }).catch(error => {
                console.log('Unable to save data. Please try again.');
                console.error(error);
                this.showNote('error', 'Unable to save data. Please check your entry and try again.');
            });
        }
    },
    computed: {
        crops() {
            return this.$store.getters.getCropsName;
        },
        beneficiaryCrops() {
            console.log('current total: ' + this.total);
            // var cr = this.$store.getters.getbeneficiaryCrops;
            // cr.forEach(item => {
            //     this.total += item.valuation;
            // });
            // console.log('new total: ' + this.total);
            this.total = this.totalValuation;
            console.log('current total valuation: ' + this.total);
            return this.$store.getters.getbeneficiaryCrops;
        },
        years: function() {
            var y = [];
            var d = new Date();
            for(var i = 1900; i <= d.getFullYear(); i++) {
                y.push(i);
            }
            return y;
        },
        projects: function() {
            return this.$store.getters.getBeneficiaryProjects;
        },
        properties: function() {
            return this.$store.getters.getBeneficiaryProperties;
        },
        totalValuation: function() {
            return this.$store.getters.getCropTotalValuation;
        }
    },
    watch: {
        scrop() {
            this.valuateCrop(this.scrop, this.grade);
        },
        items() {
            this.valuateCrop(this.scrop, this.grade);
        },
        grade() {
            this.valuateCrop(this.scrop, this.grade);
        },
        valuation() {

        }
    }
}
</script>
