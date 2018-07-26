@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Jumbo Header -->
    <div class="jumbo-header bg-teal-a600 text-center bg-help">
        <div class="x6 text-light">Projects Directory</div>
        <h3 class="no-m">Enter title or project code to search</h3>
        <project-search></project-search>
    </div>
    <!-- /Jumbo Header -->
    <div class="container-fluid page-content bg-white">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <project-list></project-list>
                <add-project></add-project>
            </div>
        </div>
    </div>
</section>
@endsection