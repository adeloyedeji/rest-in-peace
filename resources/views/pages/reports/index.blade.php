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
                                <h5 class="text-uppercase text-semibold text-alpha-4">Total Beneficiaries</h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-cart2 x6 text-alpha-2"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-alpha-9 text-right">463<i class="icon-arrow-up16 x2 text-alpha-6 position-right"></i></div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Crops and Economic Trees</h6>
                                <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">240</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-5 float-left m-t-5 m-b-5">Structure Valuations</h6>
                                <h6 class="text-bold text-alpha-7 float-right m-t-5 m-b-5">3%</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Orders received -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Total sales -->
                        <div class="card card-inverse card-flat bg-warning">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8">Total Projects</h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-price-tags x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right">1,264</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Crops and Economic Trees</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">126</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Structure Valuations</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">98</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Total sales -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Revenue -->
                        <div class="card card-inverse card-flat bg-info">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8">Total Admins</h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-coin-dollar x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right"><small class="x2 position-left">$</small>40,268</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">CET Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$4,206</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">SV Admins</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$3,980</h6>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- /Revenue -->

                    </div>
                    <div class="col-lg-6 col-sm-6">

                        <!-- Total profits -->
                        <div class="card card-inverse card-flat bg-danger">
                            <div class="card-header">
                                <h5 class="text-uppercase text-semibold text-alpha-8">Total profits</h5>
                            </div>
                            <div class="card-block">
                                <div class="row m-b-10">
                                    <div class="col-lg-3 col-sm-3 col-4">
                                        <i class="icon-wallet x6 text-alpha-4"></i>
                                    </div>
                                    <div class="col-lg-9 col-sm-9 col-8">
                                        <div class="x4 text-light no-line-height text-right"><small class="x2 position-left">$</small>8,420</div>
                                    </div>
                                </div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">This month</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$485</h6>
                                <div class="clearfix"></div>
                                <h6 class="text-alpha-7 float-left m-t-5 m-b-5">Last month</h6>
                                <h6 class="text-bold text-alpha-9 float-right m-t-5 m-b-5">$980</h6>
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
                                <h5 class="card-title text-uppercase text-semibold">Sales report</h5>
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
    </div>
</section>
@endsection