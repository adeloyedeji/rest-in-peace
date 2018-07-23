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
				<i class="icon-briefcase position-left"></i> Users list
			</div>
			<ul class="breadcrumb">
				<li><a href=""></a></li>
				<li>Users</li>
				<li class="active">Users list</li>
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

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div class="card card-inverse card-flat">
					<div class="card-header">
						<div class="card-title"> 
							<span class="pull-right">
								<button class="btn btn-primary" data-toggle="modal" data-target="#modal_default">Add new User</button>
							</span>
						</div>
					</div>

					<table class="table table-hover invoice-list table-bordered" id="datatable">
						<thead>
							<tr>
								<th>#</th>
								<th>FullName</th>
								<th>Email</th>
								<th>Username</th>
								<th>Phone</th>
								<th>Role</th>
								<th>Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody><?php $i = 1;?>
						@if($users != null)
						@foreach($users as $user)
						<tr>
							<td>{{$i}}</td>
							<td>{{$user->fname}} {{$user->lname}}</td>
							<td>
								{{$user->email}}
							</td>
							<td> {{$user->username}}</td>
							<td>
								{{$user->phone}}
							</td>
							
							<td>
								@if($user->roles != null)
								@foreach($user->roles as $role)
								{{ucfirst($role->name)}}
								@endforeach
								@else
								{{$user->role}}
								@endif
							</td>
							
							<td>
								@if($user->status)
								<a href="/admin/user/status/{{$user->id}}" class="btn btn-sm btn-primary">Active</a>
								@else
								<a href="/admin/user/status/{{$user->id}}" class="btn btn-sm btn-danger">Pending</a>
								@endif
								
							</td>
							<td class="text-center">
								<ul class="icons-list">
									<li><a href="#"><i class="icon-eye2"></i></a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Edit</a>
											<a href="/admin/user/{{$user->id}}" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
						<?php $i++;?>
						@endforeach
						@endif     
					</tbody>
				</table><br />
				<div class="col-md-8 col-md-offset-2">
					{{ $users->links() }}
				</div>
			</div>

		</div>
	</div>

</div>


<!-- Basic modal -->
<div id="modal_default" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admin/user" method="Post" id="user_create">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">Create User</div>
			</div>
			<div class="modal-body">
				<!-- Basic inputs -->
				<div class="card card-inverse">
					<div class="card-block">
						<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
							<div class="form-group row">
								<label class="control-label col-lg-3">First Name</label>
								<div class="col-lg-9">
									<input type="text" name="fname" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Last Name</label>
								<div class="col-lg-9">
									<input type="text" name="lname" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Middle Name</label>
								<div class="col-lg-9">
									<input type="text" name="oname" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Email</label>
								<div class="col-lg-9">
									<input type="text" name="email" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Single Role</label>
								<div class="col-lg-9">
									<select name="role" class="form-control">
										@if($roles != null)
										<option value="">Select Role</option>
										@foreach($roles as $role)
										<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
										@else
										<option value="opt1">No Available role</option>
										@endif
									</select>
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Password</label>
								<div class="col-lg-9">
									<input type="password" name="password" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Confirm Password</label>
								<div class="col-lg-9">
									<input type="password" name="password_confirmation" class="form-control">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-lg-3">Phone Number</label>
								<div class="col-lg-9">
									<input type="text" name="phone" class="form-control">
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


