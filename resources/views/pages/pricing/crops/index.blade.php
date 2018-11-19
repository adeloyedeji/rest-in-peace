@extends('layouts.app')

@section('title')
  | Crops &amp; Economic Trees Pricing
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
                <li class="active">Crops &amp; Economic Trees</li>
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
                        <table class="table table-hover invoice-list table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                    <th>Price</th>
                                    <th>Spacing Requirement</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $c = 0; @endphp
                                @forelse ($crops_and_economic_trees as $ce)
                                    <tr>
                                        <td>{{ $c+=1 }}</td>
                                        <td>{{ $ce->crop }}</td>
                                        <td>{{ $ce->grade }}</td>
                                        <td>₦{{ number_format($ce->price, 2) }}</td>
                                        <td>{{ $ce->space_requirement_1 . 'mx' . $ce->space_requirement_2 . 'm' }}</td>
                                        <th>
                                            <a href="{{route('pricing.edit', ['id' => $ce->id])}}" style="color: #04c;">Edit</a>
                                            <a href="#" onclick="confirmDelete({{$ce->id}}, '{{$ce->crop}}', '{{$ce->grade}}')" style="color: red;">Delete</a>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <h4>NO CASH / ECONOMIC TREES FOUND</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="col-md-8 col-md-offset-2">
                            {{ $crops_and_economic_trees->appends(request()->query())->links() }}
                            <input type="hidden" name="john" id="john" value="{{csrf_token()}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection