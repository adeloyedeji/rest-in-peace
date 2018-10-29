@extends('layouts.app')

@section('title')
  | Search
@endsection

@section('content')
<section class="main-container" id="vueId">

    <div class="jumbo-header text-center">
        <form action="#" class="form-horizontal">
            <div class="form-group">

                <div class="input-group input-group-rounded input-group-lg">
                    <div class="input-group-addon"><i class="icon-search4 icon-1x"></i></div>
                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search by name, phone or e-mail">
                    <button class="btn btn-primary" type="button" id="txtSearchBtn">Search</button>
                </div>

            </div>
        </form>
    </div>

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
    </div>

    <div class="container-fluid page-content">
        <ul class="nav nav-tabs nav-justified nav-lg nav-tabs-highlight no-mb" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#web" role="tab"><i class="icon-image4 position-left"></i> Image Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#images" role="tab"><i class="icon-earth position-left"></i> Text search</a>
            </li>
        </ul>
        <div class="tab-content no-p no-b">
            <!-- Web search -->
            <div class="tab-pane active" id="web" role="tabpanel">
                <div class="card card-inverse card-flat no-bt">
                    <div class="card-block">
                        <p class="" id="stat"></p>
                        <hr>
                        <div class="row">
                            <div class="col-lg-8 col-sm-8">
                                <ul class="media-list search-results-list media-list-bordered" id="resultList">
                                    <li class="media">
                                        <div class="media-body">
                                            <h5 class="no-mt m-b-10">
                                                <a href="#" class="text-lg" id="benName">Search result will be displayed here.</a>
                                            </h5>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="">
                                    {{-- <a href="#"><img src="{{asset('img/media/1.jpg')}}" class="img-fluid rounded" alt=""></a> --}}
                                    <div id="camera" style="width:100%;height:500px;"></div>
                                    <input type="hidden" name="pk" id="pk" value="{{csrf_token()}}">
                                </div>
                                <br>
                                <button class="btn btn-info btn-block" id="snap">Face Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Web search -->

            <!-- Images search -->
            <div class="tab-pane" id="images" role="tabpanel">
                <div class="card card-inverse card-flat no-bt images-results">
                    <div class="card-block">

                        <p id="textStat">About 3,463 results (1.14 seconds)</p>
                        <hr>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <ul class="media-list search-results-list media-list-bordered" id="resultBlock">

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Images search -->
        </div>
    </div>
</section>
@endsection

