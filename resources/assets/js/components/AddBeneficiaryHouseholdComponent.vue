<template>
    <fieldset class="step no-mb" id="step2">
        <h3 class="form-wizard-title text-uppercase">
            <span class="form-wizard-count">2</span>
            Household Information
            <small class="display-block">Beneficiary household details</small>
        </h3>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Name of Household head:</label>
                    <input type="text" class="form-control" v-model="household_head">
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Size of Household:</label>
                    <select data-placeholder="Occupation" class="select" v-model="household_size">
                        <option value="1 - 2">1 - 2</option>
                        <option value="3 - 6">3 - 6</option>
                        <option value="7 - 14">7 - 14</option>
                        <option value="15 - 20">15 - 20</option>
                        <option value="Over 20">Over 20</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="form-group">
                    <label>Tribe:</label>
                    <input type="text" class="form-control" v-model="tribe">
                </div>
            </div>

            <div class="col-md-6 col-sm-6">
                <div class="dropzone" id="photo"></div>
            </div>
        </div>
    </fieldset>
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
            default: '/beneficiaries/save',
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
            default: 'Drop photo here <br><strong>or click to upload</strong>'
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
            household_head: '',
            household_size: '',
            tribe: '',
        }
    }, 
    mounted() {
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
        });

        this.dropzone.on("error", function(file, error, xhr) {
            console.log("Error");
            console.log(error);
            
        });

        this.dropzone.on("success", function(file, response) {
            console.log(response);
        });
    },
    methods: {

    }, 
    computed: {

    }
}
</script>

<style>
    #photo {
        border: 1px #cccccc solid;
        width: 100% !important;
        border-radius: 5px;
        padding: 5px;
    }
</style>
