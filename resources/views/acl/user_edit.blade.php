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
		<!-- Basic modal -->
		<div >
			<div class="col-lg-6">
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
				<div class="modal-content">
					<form action="/admin/user/{{$user->id}}/edit" method="Post" id="">
					<div class="modal-header">
						<div class="modal-title">Edit User</div>
					</div>
					<div class="modal-body">
						<!-- Basic inputs -->
						<div class="card card-inverse">
							<div class="card-block">
								<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
									<div class="form-group row">
										<label class="control-label col-lg-3">First Name</label>
										<div class="col-lg-9">
											<input type="text" name="fname" value="{{$user->fname}}" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="control-label col-lg-3">Last Name</label>
										<div class="col-lg-9">
											<input type="text" name="lname" value="{{$user->lname}}" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="control-label col-lg-3">Middle Name</label>
										<div class="col-lg-9">
											<input type="text" name="oname" value="{{$user->oname}}" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="control-label col-lg-3">Email</label>
										<div class="col-lg-9">
											<input type="text" name="email" value="{{$user->email}}" disabled="disabled" class="form-control">
										</div>
									</div>

									<div class="form-group row">
										<label class="control-label col-lg-3">Single Role</label>
										<div class="col-lg-9">
<!--  -->								<select name="role" class="form-control">
												@if($roles != null)
												<option value="">Select Role</option>
												@foreach($roles as $role)
													@foreach($user->roles as $user_role)
													<option value="{{$role->id}}" 
														<?php if($user_role->id == $role->id){?>
															selected = "selected"
														<?php }?>
														>{{$role->name}}</option>
													@endforeach
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
											<input type="text" name="phone" value="{{$user->phone}}" class="form-control">
										</div>
									</div>

			
							</div>
						</div>
						<!-- /Basic inputs -->
					</div>
					<div class="modal-footer">
						<a href="/admin/user" class="btn btn-warning" role="button">Back</a>
						<button type="submit" class="btn btn-primary" id="btn-send">Save</button>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>



</section>
@endsection


