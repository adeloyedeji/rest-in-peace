@extends('layouts.app')

@section('title')
  | Create Beneficiary
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12">
                <!-- Basic form steps wizard -->
				<div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">Finger Print Capture</div>
                    </div>

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
                                    <span class="text-semibold">Warning!</span> {{Session::get('error')}}
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row" style="padding:40px;">
                        <div class="col-md-12">
                            <p>
                                Use the FCDA Biometric Scanner application to capture beneficiary finger print samples.
                            </p>
                            <p>
                                Once you are done capturing, click the verify button below to complete beneficiary enrollment.
                            </p>
                            <!-- Any file format upload -->
                            <div class="card card-inverse card-flat">
                                <div class="card-header">
                                    <h5 class="card-title">Verify finger print enrollment.</h5>
                                </div>
                                <div class="card-block">
                                    <input type="hidden" name="bid" id="bid" value="{{$id}}">
                                    <button class="btn btn-success" id="verifyBtn">Verify Samples</button>
                                    {{-- <form action="{{route('beneficiaries.finger-print.store')}}" enctype="multipart/form-data" method="POST" role="form">
                                        <input type="hidden" name="opcode" id="opcode" value="5">
                                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                        <input type="file" class="form-control" name="fingers[]" multiple>
                                        <p></p>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </form> --}}
                                </div>
                            </div>
                            <!-- /Any file format upload -->
                        </div>
                    </div>
                </div>
                <!-- /Basic form steps wizard -->
            </div>
        </div>
    </div>
</section>

@endsection