@extends('layouts.app')

@section('title')
  | Crops &amp; Economic Trees Pricing - {{ $crops_and_economic_tree->crop }}
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Pricing Index
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{route('pricing.index')}}">Pricing Index</a></li>
                <li class="active">{{ $crops_and_economic_tree->crop }}</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">
        @if(Session::has('success'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-success alert-styled-left">
                        <span class="text-semibold">Success!</span> {{Session::get('success')}}
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('warning'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-warning alert-styled-left">
                        <span class="text-semibold">Warning!</span> {{Session::get('warning')}}
                    </div>
                </div>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert bg-danger alert-styled-left">
                        <span class="text-semibold">Error!</span> {{Session::get('error')}}
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <!-- People header -->
                <div class="p-15 header no-mb">
                    <div class="list-buttons">
                        <div class="float-right">
                            <form action="{{route('pricing.index')}}" method="get">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="E.g. Mango">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- /People header -->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Crop &amp; Economic Trees Pricing
                            <span class="pull-right">
                                <a class="btn btn-default" target="_blank" href="{{route('pricing.create')}}">Add new crop</a>
                            </span>
                        </div>
                    </div>

                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <form action="{{route('pricing.update', ['id' => $crops_and_economic_tree->id])}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Crop / Economic Tree</label>
                                        <div class="col-lg-9">
                                            <input type="text" class="form-control" id="crop" name="crop" autofocus value="{{$crops_and_economic_tree->crop}}">
                                            @if ($errors->has('crop'))
                                                <div class="form-control-feedback">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                                <span class="help-block text-danger">{{ $errors->first('crop') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Grade</label>
                                        <div class="col-lg-9">
                                            <select name="grade" id="grade" class="form-control">
                                                <option @if($crops_and_economic_tree->grade == "A") selected @endif value="A">A</option>
                                                <option @if($crops_and_economic_tree->grade == "B") selected @endif value="B">B</option>
                                                <option @if($crops_and_economic_tree->grade == "C") selected @endif value="C">C</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Price (₦)</label>
                                        <div class="col-lg-9">
                                            <input type="number" class="form-control" id="price" name="price" required value="{{$crops_and_economic_tree->price}}">
                                            @if ($errors->has('price'))
                                                <div class="form-control-feedback">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                                <span class="help-block text-danger">{{ $errors->first('price') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Spacing Requirement (m)</label>
                                        <div class="col-lg-4">
                                            <input type="number" class="form-control" id="space_requirement_1" name="space_requirement_1" required value="{{$crops_and_economic_tree->space_requirement_1}}">
                                            @if ($errors->has('space_requirement_1'))
                                                <div class="form-control-feedback">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                                <span class="help-block text-danger">{{ $errors->first('space_requirement_1') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-5">
                                            <input type="number" class="form-control" id="space_requirement_2" name="space_requirement_2" required value="{{$crops_and_economic_tree->space_requirement_2}}">
                                            @if ($errors->has('space_requirement_2'))
                                                <div class="form-control-feedback">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                                <span class="help-block text-danger">{{ $errors->first('space_requirement_2') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-lg-3">Remarks</label>
                                        <div class="col-lg-9">
                                            <textarea name="remarks" id="remarks" cols="30" rows="10" class="form-control">{{$crops_and_economic_tree->remarks}}</textarea>
                                            @if ($errors->has('remarks'))
                                                <div class="form-control-feedback">
                                                    <i class="icon-cancel-circle2"></i>
                                                </div>
                                                <span class="help-block text-danger">{{ $errors->first('remarks') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <button class="btn btn-success pull-right" type="submit">
                                        Update
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection