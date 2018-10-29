@extends('layouts.app')

@section('title')
  | My Account
@endsection

@section('content')
<section class="main-container" id="vueId">
    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-profile position-left"></i> My Account
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Account</li>
                <li class="active">My account</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                @if(\Session::has('success'))
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert bg-success alert-styled-left">
                                <span class="text-semibold">Success!</span> {{Session::get('success')}}
                            </div>
                        </div>
                    </div>
                @endif
                @if(\Session::has('warning'))
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert bg-warning alert-styled-left">
                                <span class="text-semibold">Warning!</span> {{Session::get('warning')}}
                            </div>
                        </div>
                    </div>
                @endif
                @if(\Session::has('error'))
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="alert bg-danger alert-styled-left">
                                <span class="text-semibold">Warning!</span> {{Session::get('error')}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-3 col-sm-4">
                <!-- User thumbnail -->
                <div class="card card-block">
                    <div class="thumb thumb-rounded">
                        <img src="{{ Auth::user()->avatar }}" alt="" style="height:150px;">
                    </div>
                    <div class="caption text-center">
                        <h3 class="m-t-20">{{ \Auth::user()->fname . ' ' . \Auth::user()->lname }} <small class="display-block m-t-10">{{ \Auth::user()->role->name }}</small></h3>
                        <ul class="icons-list m-t-15 m-b-20 m-l-25 text-center">
                            <li><a href="#"><i class="icon-facebook2"></i></a></li>
                            <li><a href="#"><i class="icon-twitter2"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /user thumbnail -->
            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="fa fa-user position-left"></i>About - {{\Auth::user()->fname . ' ' . \Auth::user()->lname}}
                            <span class="pull-right">
                                <a href="#editBeneficiary" data-toggle="modal" data-target="#editModal">
                                    <i class="fa fa-edit position-left"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                    <table class="table table-borderless table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 20%;"><strong>E-mail</strong></td>
                                <td><a href="javascript:void(0)">{{\Auth::user()->email}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Role</strong></td>
                                <td><a href="javascript:void(0)">{{\Auth::user()->role->name}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Phone</strong></td>
                                <td><a href="javascript:void(0)">{{\Auth::user()->phone}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Total Beneficiaries</strong></td>
                                <td><a href="javascript:void(0)">{{$total_beneficiaries}}</a></td>
                            </tr>
                            <tr>
                                <td><strong>Username</strong></td>
                                <td>
                                    <a href="javascript:void(0)">{{\Auth::user()->username}}</a>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Last Login</strong></td>
                                <td><a href="javascript:void(0)">{{\Auth::user()->updated_at->diffForHumans()}}</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Large modal -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Edit Profile</div>
                </div>

                <form action="{{route('profiles.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>First name*:</label>
                                    <input type="text" class="form-control{{ $errors->has('fname') ? '  has-danger has-feedback' : '' }}" id="fname" name="fname" placeholder="First name" value="{{old('fname') ? old('fname') : \Auth::user()->fname}}" required autofocus>
                                    @if ($errors->has('fname'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('fname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Last name*:</label>
                                    <input type="text" class="form-control{{ $errors->has('lname') ? '  has-danger has-feedback' : '' }}" id="lname" name="lname" placeholder="Last name" value="{{old('lname') ? old('lname') : \Auth::user()->lname}}" required>
                                    @if ($errors->has('lname'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('lname') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Other names <i>(optional)</i>:</label>
                                    <input type="text" class="form-control{{ $errors->has('oname') ? '  has-danger has-feedback' : '' }}" id="oname" name="oname" placeholder="Other names" value="{{old('oname') ? old('oname') : \Auth::user()->oname}}" required>
                                    @if ($errors->has('oname'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('oname') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>User name:</label>
                                    @if (\Auth::user()->role_id == 1)
                                        <input type="text" class="form-control{{ $errors->has('username') ? '  has-danger has-feedback' : '' }}" value="{{\Auth::user()->username}}" id="username" name="username" required>
                                        @if ($errors->has('username'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('username') }}</span>
                                        @endif
                                    @else
                                        <input type="text" class="form-control" value="{{\Auth::user()->username}}" disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>E-mail:</label>
                                    @if (\Auth::user()->role_id == 1)
                                        <input type="email" class="form-control{{ $errors->has('email') ? '  has-danger has-feedback' : '' }}" value="{{\Auth::user()->email}}" id="email" name="email" required>
                                        @if ($errors->has('email'))
                                            <div class="form-control-feedback">
                                                <i class="icon-cancel-circle2"></i>
                                            </div>
                                            <span class="help-block text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    @else
                                        <input type="email" class="form-control" value="{{\Auth::user()->email}}" disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Phone number:</label>
                                    <input type="text" class="form-control{{ $errors->has('phone') ? '  has-danger has-feedback' : '' }}" id="phone" name="phone" placeholder="08012345678" value="{{old('phone') ? old('phone') : \Auth::user()->phone}}" required>
                                    @if ($errors->has('phone'))
                                        <div class="form-control-feedback">
                                            <i class="icon-cancel-circle2"></i>
                                        </div>
                                        <span class="help-block text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Photo:</label>
                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Large modal -->
</section>
@endsection