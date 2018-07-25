<template>
    <!-- Modal with icons -->
    <div id="addStructureBeneficiary" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Create new beneficiary</div>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <ul class="nav nav-pills nav-justified setup-panel">
                                    <li class="activated">
                                        <a href="#step-1">
                                            <h6 class="form-wizard-title text-uppercase">
                                                Beneficiary Info
                                            </h6>
                                        </a>
                                    </li>
                                    <li class="disabled">
                                        <a href="#step-2">
                                            <h6 class="form-wizard-title text-uppercase">
                                                Beneficiary Property
                                            </h6>
                                        </a>
                                    </li>
                                    <li class="disabled">
                                        <a href="#step-3">
                                            <h6 class="form-wizard-title text-uppercase">
                                                Beneficiary Bio
                                            </h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-1">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" v-model="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" v-model="address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <p></p>
                                <button id="activate-step-2" class="btn btn-primary">Save & Continue</button>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-2">
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Size of Plot</label>
                                    <input class="form-control" v-model="size_of_plot">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Building Area</label>
                                    <input class="form-control" v-model="building_area">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Roof</label>
                                    <input class="form-control" v-model="roof">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Ceiling</label>
                                    <input class="form-control" v-model="ceiling">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Wall</label>
                                    <input class="form-control" v-model="wall">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Window</label>
                                    <input class="form-control" v-model="window">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Door</label>
                                    <input class="form-control" v-model="door">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Fence</label>
                                    <input class="form-control" v-model="fence">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>State of Repairs</label>
                                    <input class="form-control" v-model="state_of_repairs">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Accomodation</label>
                                    <input class="form-control" v-model="accomodation">
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="dropzone" id="photo"></div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">
                                <button id="activate-step-3" class="btn btn-primary">Save & Continue</button>
                            </div>
                        </div>
                        <div class="row setup-content" id="step-3">
                            <div class="col-xs-12">
                                <div class="col-md-12 well">
                                    <h1 class="text-center"> STEP 3</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2 position-left"></i> Close</button>
                    <!-- <button class="btn btn-primary"><i class="icon-checkmark3 position-left"></i> Save</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /Modal with icons -->
</template>

<script>
import Dropzone from 'dropzone'

Dropzone.autoDiscover = false
export default {
    props: {
        pk: {
            required: true,
            type: String
        },
        id: {
            type: String,
            default: 'photo'
        },
        url: {
            type: String,
            default: '/structure-valuations/projects/save',
        },
        clickable: {
            type: Boolean,
            default: true
        },
        acceptedFileTypes: {
            type: String,
            default: 'image/png,image/jpeg,image/jpg'
        },
        thumbnailHeight: {
            type: Number,
            default: 100
        },
        thumbnailWidth: {
            type: Number,
            default: 100
        },
        showRemoveLink: {
            type: Boolean,
            default: true
        },
        maxFileSizeInMB: {
            type: Number,
            default: 2
        },
        maxNumberOfFiles: {
            type: Number,
            default: 1
        },
        autoProcessQueue: {
            type: Boolean,
            default: false
        },
        useFontAwesome: {
            type: Boolean,
            default: false
        },
        useCustomDropzoneOptions: {
            type: Boolean,
            default: false
        },
        dropzoneOptions: {
            type: Object
        },
        icons: {
            type: Object,
            default () {
                return {
                    cloud: 'fa fa-cloud-upload',
                    done: 'fa fa-check',
                    error: 'fa fa-close'
                }
            }
        },
        uploadMessageText: {
            type: String,
            default: 'Drop photo here <br><strong>or click to attach proof of development.</strong>'
        },
        removeImageText: {
            type: String,
            default: 'Remove'
        },
        headers: {
            type: Object
        }
    },
    data() {
        return {
            name: '',
            address: '',
            roof: '',
            ceiling: '',
            wall: '',
            window: '',
            door: '',
            fence: '',
            state_of_repairs: '',
            accomodation: '',
            size_of_plot: '',
            building_area: '',
            nameRef: 0,
            addRef: 0,
            sizeRef: 0,
            areaRef: 0
        }
    },
    mounted() {
        this.props();
        const element = document.getElementById("photo")

        const defaultSettings = {
            clickable: this.clickable,
            thumbnailWidth: this.thumbnailWidth,
            thumbnailHeight: this.thumbnailHeight,
            maxFiles: this.maxNumberOfFiles,
            maxFilesize: this.maxFileSizeInMB,
            dictRemoveFile: this.removeImageText,
            addRemoveLinks: this.showRemoveLink,
            acceptedFiles: this.acceptedFileTypes,
            autoProcessQueue: this.autoProcessQueue,
            headers: this.headers,
            url: this.url,
            parallelUploads:1,
            uploadMultiple: false,
            dictDefaultMessage: `<i class="${this.icons.cloud}" aria-hidden="true"></i>
                                <br>${this.uploadMessageText}`,
            previewTemplate: `
                        <div class="dz-preview dz-file-preview">
                            <div class="dz-image" style="width: ${this.thumbnailWidth}px; height: ${this.thumbnailHeight}px">
                                <img data-dz-thumbnail />
                            </div>
                            <div class="dz-details">
                                <div class="dz-size">
                                    <span data-dz-size></span>
                                </div>
                                <div class="dz-filename">
                                    <span data-dz-name></span>
                                </div>
                            </div>
                            <div class="dz-progress">
                                <span class="dz-upload" data-dz-uploadprogress></span>
                            </div>
                            <div class="dz-error-message">
                                <span data-dz-errormessage></span>
                            </div>
                            <div class="dz-success-mark">
                                <i class="${this.icons.done}" aria-hidden="true"></i>
                            </div>
                            <div class="dz-error-mark">
                                <i class="${this.icons.error}" aria-hidden="true"></i>
                            </div>
                        </div>`
        }

        const options = Object.assign({}, defaultSettings, this.dropzoneOptions)
        this.dropzone = new Dropzone(element, options)

        let vm = this;
        this.dropzone.on("sending", function(file, xhr, formData) {
            formData.append('_token', vm.pk);
            formData.append('roof', vm.roof);
            formData.append('ceiling', vm.ceiling);
            formData.append('wall', vm.wall);
            formData.append('window', vm.window);
            formData.append('door', vm.door);
            formData.append('fence', vm.fence);
            formData.append('state_of_repairs', vm.state_of_repairs);
            formData.append('accomodation', vm.accomodation);
            formData.append('size_of_plot', vm.size_of_plot);
            formData.append('building_area', vm.building_area);
            formData.append('opcode', 2);
        });

        this.dropzone.on("error", function(file, error, xhr) {
            console.log("Error");
            console.log(error);
        });

        this.dropzone.on("success", function(file, response) {
            console.log(response);
            if(response.roof && !response.id) {
                vm.showNote('warning', 'Roof data must be a valid string!');
                return 0;
            }
            if(response.ceiling && !response.id) {
                vm.showNote('warning', 'Ceiling data must be a valid string!');
                return 0;
            }
            if(response.wall && !response.id) {
                vm.showNote('warning', 'Wall data must be a valid string!');
                return 0;
            }
            if(response.window && !response.id) {
                vm.showNote('warning', 'Window data must be a valid string!');
                return 0;
            }
            if(response.door && !response.id) {
                vm.showNote('warning', 'Door data must be a valid string!');
                return 0;
            }
            if(response.fence && !response.id) {
                vm.showNote('warning', 'Fence data must be a valid string!');
                return 0;
            }
            if(response.state_of_repairs && !response.id) {
                vm.showNote('warning', 'State of repairs data must be a valid string!');
                return 0;
            }
            if(response.accomodation && !response.id) {
                vm.showNote('warning', 'Accomodation data must be a valid string!');
                return 0;
            }
            if(response.size_of_plot && !response.id) {
                vm.showNote('warning', 'Size of plot data must be a valid string!');
                return 0;
            }
            if(response.building_area && !response.id) {
                vm.showNote('warning', 'Building area data must be a valid string!');
                return 0;
            }
            vm.showNote('success', 'Property added successfully.');
            vm.sizeRef = 1;
            vm.areaRef = 1;
            return 1;
        });
    },
    methods: {
        showNote(type, msg) {
            new Noty({
                type: type,
                layout: 'bottomRight',
                text: msg,
            }).show();
        },
        props() {
            let vm = this;
            $(document).ready(function() {
                var navListItems = $('ul.setup-panel li a'),
                allWells = $('.setup-content');
                allWells.hide();
                navListItems.click(function(e) {
                    e.preventDefault();
                    var $target = $($(this).attr('href')),
                        $item = $(this).closest('li');

                    if (!$item.hasClass('disabled')) {
                        navListItems.closest('li').removeClass('activated');
                        $item.addClass('activated');
                        allWells.hide();
                        $target.show();
                    }
                });

                $('ul.setup-panel li.activated a').trigger('click');

                // DEMO ONLY //
                $('#activate-step-2').on('click', function(e) {
                    vm.saveBen();
                    if(vm.nameRef == 1 && vm.addRef == 1) {
                        $('ul.setup-panel li:eq(1)').removeClass('disabled');
                        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
                    }
                });
                $('#activate-step-3').on('click', function(e) {
                    vm.saveBenProp();
                    if(areaRef == 1 && sizeRef == 1) {
                        $('ul.setup-panel li:eq(2)').removeClass('disabled');
                        $('ul.setup-panel li a[href="#step-2"]').trigger('click');
                    }
                    // $(this).remove();
                });
            });
        },
        saveBen() {
            axios.post('/structure-valuations/projects/save', {
                name: this.name,
                address: this.address,
                opcode: 1
            }).then((resp) => {
                if(resp.data.name && !resp.data.id) {
                    this.showNote('warning', 'Name is a required field.');
                    return 0;
                }
                if(resp.data.address && !resp.data.id) {
                    this.showNote('warning', 'Address is a required field.');
                    return 0;
                }
                this.showNote('success', 'Beneficiary created successfully.');
                this.nameRef = 1;
                this.addRef = 1;
                return 1;
            }).catch(error => {
                console.log(error);
                this.showNote('error', 'Unable to complete request.');
                return 0;
            })
        },
        saveBenProp() {
            if(this.dropzone.files.length) {
                dropzone.processQueue();
            } else {
                this.showNote('warning', 'Please attah document proof to continue.');
                return 0;
            }
        }
    },
    computed: {

    }
}
</script>


<style>
    .activated, .disabled {
        padding: 5px;
        margin-right: 10em;
        margin-left: 10em;
    }
    .activated {
        background-color: #0CC2AA;
        border-color: #0bb49d;
        border-radius: 5px;
    }
    .activated>a {
        color: white;
    }
</style>
