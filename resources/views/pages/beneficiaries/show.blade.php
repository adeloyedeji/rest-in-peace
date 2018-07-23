@extends('layouts.app')

@section('title')
  | Beneficiary Data
@endsection

@section('content')
<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Beneficiary Profile
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Beneficiaries</li>
                <li class="active">Beneficiary Profile</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-lg-3 col-sm-4">

                <!-- User thumbnail -->
                <div class="card card-block">
                    <div class="thumb thumb-rounded">
                        <img src="{{ $beneficiary->household_head_photo }}" alt="">
                    </div>
                    <div class="caption text-center">
                        <h3 class="m-t-20">
                            {{ $beneficiary->household_head }}
                            <small class="display-block m-t-10">{{ $beneficiary->occupation->title }}</small>
                        </h3>
                    </div>
                </div>
                <!-- /user thumbnail -->

                <!-- Navigation -->
                <div class="list-group list-group-lg m-b-20">
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-user position-left"></i> My profile</a></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-cash3 position-left"></i> Balance</a></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-tree7 position-left"></i> Connections</a> <span class="badge badge-pill bg-danger">19</span></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-users position-left"></i> Friends</a></li></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-calendar3 position-left"></i> Events</a> <span class="badge badge-pill bg-teal-400">20</span></li>
                    <li class="list-group-item justify-content-between"><a href="#"><i class="icon-cog3 position-left"></i> Account settings</a></li>
                </div>
                <!-- /navigation -->

                <!-- Connections -->
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title mb-10">Latest connections</div>
                    </div>

                    <h5 class="text-uppercase text-semibold text-muted m-l-15">Office staff</h5>
                    <ul class="media-list media-list-linked">

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img2.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading">James Alexander</span>
                                    <span class="media-annotation">Lead UX designer</span>
                                </div>
                            </a>
                        </li>

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img3.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading">Jane Elliott</span>
                                    <span class="media-annotation">Lead UX designer</span>
                                </div>
                            </a>
                        </li>

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img4.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <div class="media-heading"><span class="text-semibold">Eugine Turner</span></div>
                                    <span class="text-muted">Lead UX designer</span>
                                </div>
                            </a>
                        </li>

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img5.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <div class="media-heading"><span class="text-semibold">Jacqueline Howell</span></div>
                                    <span class="text-muted">Network engineer</span>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <h5 class="text-uppercase text-semibold text-muted m-l-15">Partners</h5>
                    <ul class="media-list media-list-linked">
                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img6.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading">Andrew Brewer</span>
                                    <span class="media-annotation">Network engineer</span>
                                </div>
                            </a>
                        </li>

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img7.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading">Marilyn Romero</span>
                                    <span class="media-annotation">Sales manager</span>
                                </div>
                            </a>
                        </li>

                        <li class="media">
                            <a href="#" class="media-link">
                                <div class="media-left"><img src="img/demo/img8.jpg" class="rounded-circle" alt=""></div>
                                <div class="media-body">
                                    <span class="media-heading">Philip Hall</span>
                                    <span class="media-annotation">Chief officer</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /connections -->

            </div>

            <div class="col-lg-9 col-sm-8">
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Share your thoughts</div>
                    </div>

                    <div class="card-block">
                        <form action="#">
                            <div class="form-group">
                                <textarea name="enter-message" class="form-control m-b-15" rows="3" cols="1" placeholder="What's on your mind?"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="icons-list icons-list-extended mt-10 m-l-25">
                                        <li><a href="#"><i class="icon-camera position-left"></i></a></li>
                                        <li><a href="#"><i class="icon-video-camera2 position-left"></i></a></li>
                                        <li><a href="#"><i class="icon-calendar2 position-left"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <button type="button" class="btn btn-info">Share</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title"><i class="fa fa-user position-left"></i>About - Jane Elliott</div>
                    </div>
                    <table class="table table-borderless table-striped">
                        <tbody>
                            <tr>
                                <td style="width: 20%;"><strong>Info</strong></td>
                                <td>Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non.</td>
                            </tr>
                            <tr>
                                <td><strong>Founder</strong></td>
                                <td><a href="javascript:void(0)">Company Inc</a></td>
                            </tr>
                            <tr>
                                <td><strong>Education</strong></td>
                                <td><a href="javascript:void(0)">University Name</a></td>
                            </tr>
                            <tr>
                                <td><strong>Projects</strong></td>
                                <td><a href="javascript:void(0)" class="label label-danger">168</a></td>
                            </tr>
                            <tr>
                                <td><strong>Best Skills</strong></td>
                                <td>
                                    <a href="javascript:void(0)" class="label label-info">HTML</a>
                                    <a href="javascript:void(0)" class="label label-info">CSS</a>
                                    <a href="javascript:void(0)" class="label label-info">Javascript</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card card-inverse card-flat">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img src="img/demo/img12.jpg" class="rounded-circle img-50" alt=""></a>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"><a href="#">Tyler Rivera</a> <span class="media-annotation">- 2 hours ago</span></h6>
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.
                            </div>
                            <div>
                                <i class="icon-thumbs-up2 position-left text-info"></i>367
                                <i class="icon-thumbs-down2 position-left m-l-20 text-danger"></i>14
                                <i class="icon-comment-discussion position-left m-l-20 text-success"></i>28
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-body">
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img src="img/demo/img11.jpg" class="rounded-circle img-50" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="#">Emma Weaver</a> <span class="media-annotation">- 1 hour ago</span></h6>
                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img src="img/demo/img10.jpg" class="rounded-circle img-50" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading"><a href="#">Florence Douglas</a> <span class="media-annotation">- 30 minutes ago</span></h6>
                                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="#"><img src="img/demo/img9.jpg" class="rounded-circle img-50" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <textarea name="enter-message" class="form-control" rows="4" cols="1" placeholder="Enter your message..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right m-t-15">
                            <button type="button" class="btn btn-primary float-right">Post comments</button>
                        </div>
                    </div>
                </div>

                <div class="card card-inverse card-flat">

                    <img src="img/covers/cover1.jpg" class="img-fluid" alt="">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img src="img/demo/img8.jpg" class="rounded-circle img-50" alt=""></a>
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="#">Tyler Rivera</a> <span class="media-annotation">- 2 hours ago</span></h5>
                                Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur?
                            </div>
                        </div>

                        <div class="media">
                            <div class="media-left">
                                <a href="#"><img src="img/demo/img7.jpg" class="rounded-circle" alt=""></a>
                            </div>
                            <div class="media-body">
                                <textarea name="enter-message" class="form-control" rows="4" cols="1" placeholder="Enter your message..."></textarea>
                            </div>
                        </div>
                        <div class="text-right m-t-15">
                            <button type="button" class="btn btn-primary float-right">Post comments</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection