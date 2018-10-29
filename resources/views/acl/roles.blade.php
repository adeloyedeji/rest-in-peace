@extends('layouts.app')

@section('title')
Roles
@endsection

@section('content')

<section class="main-container" id="vueId">

	<!-- Page header -->
	<div class="header">
		<div class="header-content">
			<div class="page-title">
				<i class="icon-briefcase position-left"></i> Roles list
			</div>
			<ul class="breadcrumb">
				<li><a href="{{url('/')}}"></a></li>
				<li><a href="{{route('admin.roles')}}">Roles</a></li>
				<li class="active">Roles list</li>
			</ul>
		</div>
	</div>
	<!-- /Page header -->

	<div class="container-fluid page-content">

		@if ($errors->any())
		    <div class="alert alert-danger alert-dismissible">
		    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif

		@if(Session::has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> {{ Session::get('message') }}
            </div>
		@endif

		@if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> {{ Session::get('error') }}
            </div>
		@endif

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <role-component :token="'{{csrf_token()}}'"></role-component>
		    </div>
	    </div>

    </div>


    <!-- Create role modal -->
    <div id="modal_default" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/admin/role" method="Post" id="user_create">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Create Role</div>
                </div>
                <div class="modal-body">
                    <!-- Basic inputs -->
                    <div class="card card-inverse">
                        <div class="card-block">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Name</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="control-label col-lg-3">Slug</label>
                                    <div class="col-lg-9">
                                        <input type="text" name="slug" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row pb-10">
                                    <label class="control-label col-lg-3">Description</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="5" name="description" class="form-control" placeholder="Enter role details..."></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- /Basic inputs -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btn-send">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /End create role modal -->

    <!--Edit role modal -->
    <div id="editRole" class="modal fade">
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
                            <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="edit_id" id="edit_id">
                            <div class="form-group row">
                                <label class="control-label col-lg-3">Name</label>
                                <div class="col-lg-9">
                                    <input type="text" name="edit_name" id="edit_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-lg-3">Slug</label>
                                <div class="col-lg-9">
                                    <input type="text" name="edit_slug" id="edit_slug" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row pb-10">
                                <label class="control-label col-lg-3">Description</label>
                                <div class="col-lg-9">
                                    <textarea rows="10" cols="10" name="edit_description" id="edit_description" class="form-control" placeholder="Enter role details..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic inputs -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnEdit">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--/Ednd edit role modal -->
</section>
@endsection


