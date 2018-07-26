@extends('layouts.app')

@section('title')
  | Reporting
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!--Page Header-->
    <div class="header">
        <div class="header-content">
            <div class="page-title"><i class="icon-store2"></i> Reporting Module</div>
        </div>
    </div>
    <!-- /Page Header-->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">

                        <!-- Orders received -->
                        <div class="card card-inverse card-flat bg-primary">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-4"><a href="{{ url('reports/beneficiaries/download') }}">Total Beneficiaries</a></h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-users2 x6 text-alpha-2"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-alpha-9 text-right">
                                            {{$totalBen}}
                                            <i class="icon-arrow-up16 x2 text-alpha-6 position-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Crops and Economic Trees</h6>
                                <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">{{ $totalBen - $totalStructureBen}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Structure Valuations</h6>
                                <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">{{$totalStructureBen}}</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Orders received -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Total sales -->
                        <div class="card card-inverse card-flat bg-warning">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8"><a href="{{ url('reports/projects/download') }}">Total Projects</a></h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-stack2 x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right">{{$totalProjects}}</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Crops and Economic Trees</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalCropProjects}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Structure Valuations</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalProjects - $totalCropProjects}}</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Total sales -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Revenue -->
                        <div class="card card-inverse card-flat bg-info">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8"><a href="{{ url('reports/admins/download') }}">Total Admins</a></h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-user-settings x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right">{{$totalAdmins}}</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">CET Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalCropAdmins}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">SV Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalStructureAdmins}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Uncategorised Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalAdmins - ($totalCropAdmins + $totalStructureAdmins)}}</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Revenue -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Total profits -->
                        <div class="card card-inverse card-flat bg-danger">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8"><a href="{{url('reports/projects-status/download')}}">Project Status</a></h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-ratings x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right">{{$totalProjects}}</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Completed</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalCompletedProjects}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Active</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">{{$totalActiveProjects}}</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5" style="visibility:hidden">Uncategorised Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5" style="visibility:hidden">{{$totalAdmins - ($totalCropAdmins + $totalStructureAdmins)}}</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Total profits -->

                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Sales report -->
                        <div class="card card-inverse card-flat">
                            <div class="card-header">
                                <h5 class="card-title text-uppercase text-semibold">Monthly Projects Beneficiaries Ratio</h5>
                            </div>
                            <div class="card-block">
                                <div id="sales"></div>
                            </div>
                        </div>
                        <!-- /Sales report -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <!-- Donut chart -->
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Beneficiaries by States</div>
                    </div>
                    <div class="card-block">
                        <div id="pie-donut"></div>
                    </div>
                </div>
                <!-- /Donut chart -->
            </div>

            <div class="col-md-6 col-sm-12">
                <!-- Semi circle donut -->
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Beneficiaries by household size</div>
                    </div>
                    <div class="card-block">
                        <div id="basic-bar"></div>
                    </div>
                </div>
                <!-- /Semi circle donut -->
            </div>
        </div>
    </div>
</section>
@endsection