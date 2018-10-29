@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="jumbo-header text-center">
        <project-beneficiaries-search :id="{{$id}}"></project-beneficiaries-search>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-8">
                <label>Select Project</label>
                <select class="select" onchange="changeProject($(this).val())">
                    @forelse ($projects as $project)
                        <option value="{{$project->id}}">{{$project->title}}</option>
                    @empty
                        <option value="0">No projects in database</option>
                    @endforelse
                </select>
                <br>
                <h4 class="text-center">Face search result will be displayed here</h4>
                <p id="stat"></p>
                <div>
                    <ul class="media-list search-results-list media-list-bordered" id="resultList">

                    </ul>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                    <p></p>
                </div>
                <beneficiaries-by-project :id="{{$id}}" :p="'{{csrf_token()}}'"></beneficiaries-by-project>
            </div>
            <div class="col-md-4">
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Face Search</div>
                    </div>
                    <div class="card-block">
                        <div id="camera" style="width:100%;height:500px;"></div>
                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                        <br>
                        <button type="button" class="btn btn-info" id="snap">Scan Face</button>
                    </div>
                </div>
                <view-project-sidebar :id="{{$id}}"></view-project-sidebar>
                <view-project :id="{{$id}}"></view-project>
                <edit-project :id="{{$id}}"></edit-project>
                <delete-project :id="{{$id}}"></delete-project>
            </div>
        </div>
        <add-structure-beneficiary :pk="'{{csrf_token()}}'"></add-structure-beneficiary>
    </div>
</section>
@endsection