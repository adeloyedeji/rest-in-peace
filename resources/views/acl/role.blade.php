@extends('layouts.app')

@section('title')
{{$title}}
@endsection

@section('content')

<section class="main-container">

	<!-- Page header -->
	<div class="header">
		<div class="header-content">
			<div class="page-title">
				<i class="icon-briefcase position-left"></i> Roles list
			</div>
			<ul class="breadcrumb">
				<li><a href=""></a></li>
				<li>Roles</li>
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

				<div class="card card-inverse card-flat">
					<div class="card-header">
						<div class="card-title"> 
							<span class="pull-right">
								<button class="btn btn-primary" data-toggle="modal" data-target="#modal_default">Add New role</button>
							</span>
						</div>
					</div>

					<table class="table table-hover invoice-list table-bordered" id="datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>Role</th>
								<th>Slug</th>
								<th>Description</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody><?php $i = 1;?>
						@if($roles != null)
						@foreach($roles as $role)
						<tr>
							<td>{{$i}}</td>
							<td>{{ucfirst($role->name)}}</td>
							<td>
								{{ucfirst($role->slug)}}
							</td>
							<td> {{ucfirst($role->description)}}</td>
							<td class="text-center">
								<ul class="icons-list">
									
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Edit</a>
											<a href="/admin/role/{{$role->id}}" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
										</ul>
									</li>
								</ul>
							</td>
						</tr> 
						<?php $i++;?>
						@endforeach
						@endif   
					</tbody>
				</table>
				<div class="col-md-8 col-md-offset-2">

				</div>
			</div>

		</div>
	</div>

</div>


<!-- Basic modal -->
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
<!-- /Basic modal -->
</section>
@endsection


