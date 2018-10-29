<template>
    <div>
        <div class="card card-inverse card-flat">
            <div class="card-header">
                <div class="card-title">System Roles
                    <span class="pull-right">
                        <a class="btn btn-info" href="#createRole" data-toggle="modal" data-target="#createRole">Create role</a>
                    </span>
                </div>
            </div>
            <div class="card-block">
            </div>
            <div class="table-responsive">
                <table class="table table-hover invoice-list table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody v-if="roles && roles.length > 0">
                        <tr v-for="(item, index) in roles">
                            <td>{{++index}}</td>
                            <td>{{item.name}}</td>
                            <td>{{item.slug}}</td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0)" @click="getRole(item.id)" class="dropdown-item"><i class="icon-pencil6"></i> Edit Role</a>
                                            <a href="javascript:void(0)" class="dropdown-item"><i class="icon-pencil6"></i> Edit Permissions</a>
                                            <a href="javascript:void(0)" @click="confirmDelete(item.id)" class="dropdown-item"><i class="icon-trash"></i> Delete Role</a>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="4"><h5 class="text-center">No roles found!</h5></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Create role modal -->
        <div id="createRole" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">{{createTitle}}</div>
                    </div>
                    <div class="modal-body">
                        <!-- Basic inputs -->
                        <form>
                            <div class="card card-inverse">
                                <div class="card-block">
                                    <input type="hidden" name="edit_id" id="edit_id">
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Name</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="name" id="name" class="form-control" v-model="name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Slug</label>
                                        <div class="col-lg-9">
                                            <input type="text" name="slug" id="slug" class="form-control" v-model="slug">
                                        </div>
                                    </div>

                                    <div class="form-group row pb-10">
                                        <label class="control-label col-lg-3">Description</label>
                                        <div class="col-lg-9">
                                            <textarea rows="10" cols="10" name="description" id="description" class="form-control" placeholder="Enter role details..." v-model="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Basic inputs -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="saveRole()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/End create role modal -->


        <!--Edit role modal -->
        <div id="editRole" class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">Edit Role</div>
                    </div>
                    <div class="modal-body">
                        <!-- Basic inputs -->
                        <div class="card card-inverse">
                            <div class="card-block">
                                <input type="hidden" name="edit_id" id="edit_id">
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="edit_name" id="edit_name" class="form-control" v-model="edit_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Slug</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="edit_slug" id="edit_slug" class="form-control" v-model="edit_slug">
                                    </div>
                                </div>

                                <div class="form-group row pb-10">
                                    <label class="control-label col-lg-3">Description</label>
                                    <div class="col-lg-9">
                                        <textarea rows="10" cols="10" name="edit_description" id="edit_description" class="form-control" placeholder="Enter role details..." v-model="edit_description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Basic inputs -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click="updateRole()">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--/End edit role modal -->
    </div>
</template>

<script>
export default {
    props: {
        token: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            createTitle: 'Create role',
            name: '',
            slug: '',
            description: '',
            edit_id: 0,
            edit_name: '',
            edit_slug: '',
            edit_description: '',
        }
    },
    mounted() {
        this.getRoles();
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
        getRoles() {
            axios.get(server + 'admin/roles')
            .then((resp) => {
                let temp = resp.data;
                temp.forEach(role => {
                    this.$store.commit("setRole", role);
                });
            }).catch(error => {
                console.log('Error occured trying to fetch roles');
                console.error(error);
                this.showNote('error', 'Unable to fetch roles. Please try again.');
            });
        },
        getRole(id) {
            var roles = this.$store.getters.getRoles;
            var role = roles.find((r) => {
                return r.id === id;
            });
            if(role) {
                this.edit_id = role.id;
                this.edit_name = role.name;
                this.edit_slug = role.slug;
                this.edit_description = role.description;
                $('#editRole').modal('show');
            } else {
                this.showNote('error', 'Role not found!');
                return false;
            }
        },
        saveRole() {
            var data = {
                name: this.name,
                slug: this.slug,
                description: this.description,
            };
            axios.post(server + 'admin/roles', data)
            .then((resp) => {
                var d = resp.data;
                if(d.id) {
                    this.$store.commit("setRole", d);
                    this.showNote('success', 'Role ' + this.name + ' was successfully saved.');
                    $('#createRole').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                } else {
                    if(d.name) {
                        this.showNote('warning', d.name);
                        return false;
                    }
                    if(d.slug) {
                        this.showNote('warning', d.slug);
                        return false;
                    }
                    if(d.description) {
                        this.showNote('warning', d.description);
                        return false;
                    }
                }
            })
            .catch(error => {
                console.log('Error occured trying to save role');
                console.error(error);
                this.showNote('error', 'Unable to save role. Please try again.');
            })
        },
        updateRole() {
            var data = {
                name: this.edit_name,
                slug: this.edit_slug,
                description: this.edit_description,
                _method: 'PUT'
            };
            axios.post(server + 'admin/role/' + this.edit_id, data)
            .then((resp) => {
                var d = resp.data;
                if(d.name) {
                    this.showNote('warning', d.name);
                    return false;
                }
                if(d.slug) {
                    this.showNote('warning', d.slug);
                    return false;
                }
                if(d.description) {
                    this.showNote('warning', d.description);
                    return false;
                }
                if(d == 'ok') {
                    data.id = this.edit_id;
                    this.$store.commit("updateRole", data);
                    this.showNote('success', 'Role successfully updated.');
                    $('#editRole').modal('hide');
                }
            })
            .catch(error => {
                console.log('Unable to update role');
                console.error(error);
                this.showNote('error', 'Unable to update role. Please try again later.');
            });
        },
        confirmDelete(roleID) {
            let s = this;
            var notice = new PNotify({
                title: 'Confirmation',
                text: '<p>Are you sure you want to delete this role?</p>',
                hide: false,
                type: 'success',
                width: 380,
                addclass: 'bg-grey-50',
                confirm: {
                    confirm: true,
                    buttons: [
                        {
                            text: 'Yes',
                            addClass: 'btn btn-sm bg-danger-900'
                        },
                        {
                            addClass: 'btn btn-sm btn-secondary'
                        }
                    ]
                },
                buttons: {
                    closer: false,
                    sticker: false
                },
                history: {
                    history: false
                }
            });

            notice.get().on('pnotify.confirm', function() {
                var data = {
                    _method: 'DELETE'
                };
                axios.post(server + 'admin/roles/role/' + roleID, data)
                .then((resp) => {
                    if(resp.data == "404") {
                        s.showNote('warning', 'Role not found!');
                        return false;
                    }
                    if(resp.data == "ok") {
                        s.$store.commit("deleteRole", roleID);
                        s.showNote('success', 'Role successfully deleted.');
                    }
                })
                .catch(error => {
                    console.log('Unable to delete role.');
                    console.error(error);
                    s.showNote('error', 'Unable to delete role. Please try again.');
                });
            });

            notice.get().on('pnotify.cancel', function() {
                // alert('Oh ok. Chicken, I see.');
            });
        }
    },
    computed: {
        roles() {
            return this.$store.getters.getRoles;
        },
    },
    watch: {
        name() {
            this.createTitle = "Create role - " + this.name;
        }
    }
}
</script>
