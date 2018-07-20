@extends('layouts.app')

@section('title')
  | Dashboard
@endsection

@section('content')
<section class="main-container">

            <div class="container-fluid page-content">

                <div class="row p-t-40">
                    <div class="col-md-12">
                        <div class="card card-inverse card-flat border-none">
                            <div class="card-block p-b-10">
                                <div class="row p-t-10 p-b-15">

                                    <!-- Leads -->
                                    <div class="col-lg-3 col-sm-6 text-danger-a300 p-l-30 p-r-40 mb-5 mb-sm-5 mb-lg-0 br-grey-100 br-lg br-dashed no-b-xs">
                                        <div class="row">
                                            <div class="col-md-8 col-8">
                                                <h4 class="text-uppercase text-muted no-m">Total Projects</h4>
                                                <div class="x3 no-p no-m m-t-10 m-b-10">543 <i class="icon-arrow-up16 text-success text-size-large"></i></div>
                                            </div>
                                            <div class="col-md-4 col-4 no-p text-right">
                                                <i class="icon-comment x6 text-grey-100 m-t-15"></i>
                                            </div>
                                        </div>
                                        <div id="leads"></div>
                                    </div>
                                    <!-- /Leads -->

                                    <!-- Payments -->
                                    <div class="col-lg-3 col-sm-6 text-success-a300 p-l-30 p-r-40 mb-5 mb-sm-5 mb-lg-0 br-grey-100 br-lg br-dashed no-b-xs no-b-sm">
                                        <div class="row">
                                            <div class="col-md-8 col-8">
                                                <h4 class="text-uppercase text-muted no-m">Total Beneficiaries</h4>
                                                <div class="x3 no-p no-m m-t-10 m-b-10">$6,210</div>
                                            </div>
                                            <div class="col-md-4 col-4 no-p text-right">
                                                <i class="icon-coin-dollar x6 text-grey-100 m-t-15"></i>
                                            </div>
                                        </div>
                                        <div id="payment"></div>
                                    </div>
                                    <!-- /Payments -->

                                    <!-- Sales -->
                                    <div class="col-lg-3 col-sm-6 text-info p-l-30 p-r-40 mb-5 mb-sm-0 br-grey-100 br-lg br-dashed no-b-xs">
                                        <div class="row">
                                            <div class="col-md-8 col-8">
                                                <h4 class="text-uppercase text-muted no-m">Toatl Property</h4>
                                                <div class="x3 no-p no-m m-t-10 m-b-10">765 <i class="icon-arrow-down16 text-danger text-size-large"></i></div>
                                            </div>
                                            <div class="col-md-4 col-4 no-p text-right">
                                                <i class="icon-price-tags x6 text-grey-100 m-t-15"></i>
                                            </div>
                                        </div>
                                        <div id="sales"></div>
                                    </div>
                                    <!-- /Sales -->

                                    <!-- Orders -->
                                    <div class="col-lg-3 col-sm-6 text-warning p-l-30 p-r-40">
                                        <div class="row">
                                            <div class="col-md-8 col-8">
                                                <h4 class="text-uppercase text-muted no-m">Userss</h4>
                                                <div class="x3 no-p no-m m-t-10 m-b-10">532 <i class="icon-arrow-up16 text-success text-size-large"></i></div>
                                            </div>
                                            <div class="col-md-4 col-4 no-p text-right">
                                                <i class="icon-cart2 x6 text-grey-100 m-t-15"></i>
                                            </div>
                                        </div>
                                        <div id="orders"></div>
                                    </div>
                                    <!-- /Orders -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                        <!-- Recent Leads -->
                        <div class="col-lg-6">
                            <div class="card card-inverse card-flat">
                                <div class="card-header">
                                    <h5 class="card-title">Recent Beneficiaries</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped user-list">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Jane Elliott</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-danger">High</span></td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Florence Douglas</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-success">Closed</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Jacqueline Howell</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-warning">Medium</span></td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Eugine Turner</td>
                                                <td>Jun 13, 2016</td>
                                                <td><span class="badge badge-danger">Pending</span></td>
                                                <td><span class="badge badge-danger">High</span></td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Andrew Brewer</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-danger">Pending</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Jonaly Smith</td>
                                                <td>Jun 12, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Ann Porter</td>
                                                <td>Jun 12, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Leads -->

                        <!-- Recent Leads -->
                        <div class="col-lg-6">
                            <div class="card card-inverse card-flat">
                                <div class="card-header">
                                    <h5 class="card-title">Recent Property</h5>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-striped user-list">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Priority</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Jane Elliott</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-danger">High</span></td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>Florence Douglas</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-success">Closed</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>

                                            <tr>
                                                <td>3</td>
                                                <td>Jacqueline Howell</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-warning">Medium</span></td>
                                            </tr>

                                            <tr>
                                                <td>4</td>
                                                <td>Eugine Turner</td>
                                                <td>Jun 13, 2016</td>
                                                <td><span class="badge badge-danger">Pending</span></td>
                                                <td><span class="badge badge-danger">High</span></td>
                                            </tr>

                                            <tr>
                                                <td>5</td>
                                                <td>Andrew Brewer</td>
                                                <td>Jun 14, 2016</td>
                                                <td><span class="badge badge-danger">Pending</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Jonaly Smith</td>
                                                <td>Jun 12, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Ann Porter</td>
                                                <td>Jun 12, 2016</td>
                                                <td><span class="badge badge-info">Opened</span></td>
                                                <td><span class="badge badge-success">Low</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /Recent Leads -->
                    </div>

                <div class="row">
                </div>




  
                <div class="row">
                    <div class="col-lg-12">



                    </div>
                </div>

            </div>


        </section>
@endsection
