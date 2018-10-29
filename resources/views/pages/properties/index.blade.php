@extends('layouts.app')

@section('title')
  | Capture Property
@endsection

@section('content')

<section class="main-container" id="vueId">
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-12">
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

                <!-- Basic form steps wizard -->
				<div class="card card-inverse">
                    <div class="card-header">
                        <div class="card-title">Beneficiary Properties Enrollment Form - {{$ben->fname . " " . $ben->lname}}</div>
                    </div>

                    <div class="row" style="padding:40px;">
                        <div class="col-md-12">
                            <div class="page-subtitle">
                                <a href="{{route('beneficiaries.show', ['id' => $id])}}">view profile</a>
                            </div>
                            {{-- <p>
                                Select property type to capture.
                            </p> --}}
                            <!-- Any file format upload -->
                            <div class="card card-inverse card-flat">
                                <div class="card-header">
                                    <h5 class="card-title">Select Property Type</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <a href="{{route('properties.structure.index', ['id' => $id])}}" class="btn btn-primary" id="">Structures</a>
                                            <a href="{{route('properties.crops.index', ['id' => $id])}}" class="btn btn-primary" id="">Economic Crops / Trees</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Any file format upload -->
                        </div>
                    </div>
                </div>
                <!-- /Basic form steps wizard -->
            </div>
        </div>

        @if (count($properties) > 0)
            @foreach ($properties as $fcdaProperty)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-inverse">
                            <div class="card-header">
                                <div class="card-title">
                                    @if ($property->type == 1)
                                    Land Property - {{ $fcdaProperty->type }}
                                    @endif
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- Basic accordion -->
                                            {{-- <div class="page-subtitle">Property Details</div> --}}
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><strong>Address</strong></td>
                                                            <td><a href="javascript:void(0)">{{ $fcdaProperty->address }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Size</strong></td>
                                                            <td><a href="javascript:void(0)">{{ $fcdaProperty->size }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Area</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->area }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Description</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->description ? $fcdaProperty->description : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Roof</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->roof ? $fcdaProperty->roof : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Ceiling</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->ceiling ? $fcdaProperty->ceiling : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Wall</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->wall ? $fcdaProperty->wall : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Window</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->window ? $fcdaProperty->window : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Door</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->door ? $fcdaProperty->door : "NILL"  }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Fence</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->fence ? $fcdaProperty->fence : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>State Of Repairs</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->state_of_repairs ? $fcdaProperty->state_of_repairs : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Accomodation</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger">{{ $fcdaProperty->accomodation ? $fcdaProperty->accomodation : "NILL" }}</a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Structure Valuation</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger"><b>₦{{ number_format($fcdaProperty->valuation_of_structure, 2) }}</b></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Property Valuation</strong></td>
                                                            <td><a href="javascript:void(0)" class="label label-danger"><b>₦{{ number_format($fcdaProperty->total_valuation, 2) }}</b></a></td>
                                                        </tr>
                                                        @if ($fcdaProperty->total_valuation <= 0)
                                                        <tr>
                                                            <td colspan="2">
                                                                <button class="btn btn-success" onclick="loadProperty({{$fcdaProperty->id}}, {{$property->type}})">Evaluate Property</button>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /Basic accordion -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

<!-- Primary header -->
<div id="evaluationModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-title">Evaluate Property</div>
            </div>

            <div class="modal-body">
                <p id="pType"></p>
                <form action="{{route('properties.structure.evaulate')}}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="p" id="p" value="">
                    <div class="form-group">
                        <label for="owner_evaluation" class="control-label">Owner Evaluation</label>
                        <input type="number" name="owner_evaluation" id="owner_evaluation" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="e" class="control-label">Property Evaluation</label>
                        <input type="number" name="e" id="e" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /Primary header -->

@section('pagescript')
    <script>
        function loadProperty(id, type) {
            showNot('success', 'Please wait while we fetch the requested resource...');
            $.ajax({
                url: server + "properties/structure/property/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if(data == "404") {
                        showNot('error', 'Property not found!');
                        return false;
                    } else {
                        if(type == 1) {
                            $('#pType').val("LAND - " + data.type);
                        } else {
                            $('#pType').val("CROP / ECONOMIC TREES - " + data.type);
                        }
                        $('#p').val(id);
                        $('#owner_evaluation').val(data.valuation_of_structure);
                        $("#evaluationModal").modal("show");
                    }
                },
                error: function(error) {
                    showNot('error', 'Unable to load property information. Please reload page and try again.');
                    console.log(error);
                }
            });
        }
        $(function() {
        });
    </script>
@endsection
@endsection