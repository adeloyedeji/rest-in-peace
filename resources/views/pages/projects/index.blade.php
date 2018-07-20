@extends('layouts.app')

@section('title')
  | Projects
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Projects list
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li>Projects</li>
                <li class="active">Projects list</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Current projects 
                            <span class="pull-right">
                                <button class="btn btn-default" data-toggle="modal" data-target="#addProject">Add new project</button>
                            </span>
                        </div>
                    </div>

                    <table class="table table-hover invoice-list" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Title</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Owner</th>
                                <th>Beneficiaries</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @forelse($projects as $project)
                            <tr>
                                <td>{{ $count+=1 }}</td>
                                <td>{{ $project->code }}</td>
                                <td>
                                    <div class="no-m">
                                        <a href="{{ route('projects.show', ['id' => $project->id]) }}">{{ $project->title }}</a>
                                    </div>
                                </td>
                                <td>{{ $project->address }}</td>
                                <td>
                                    @if($project->pstatus->status == 1)
                                    <span class="badge badge-primary">ACTIVE</span>
                                    @else
                                    <span class="badge badge-success">COMPLETED</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="no-m">
                                        <a href="#">{{ $project->owner->fname . " " . $project->owner->lname }}</a>
                                    </div>
                                </td>
                                <td>
                                    <div class="no-m">
                                        <a href="{{ route('projects.show', ['id' => $project->id]) }}">5</a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li><a href="{{ route('projects.show', ['id' => $project->id]) }}"><i class="icon-eye2"></i></a></li>
                                        <!-- <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i class="icon-checkmark3"></i> Mark as completed</a>
                                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Mark as incomplete</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item"><i class="icon-pencil6"></i> Edit</a>
                                                <a href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            @endforelse     
                        </tbody>
                    </table>
                    <div class="col-md-8 col-md-offset-2">
                        {{ $projects }}
                    </div>
                </div>

            </div>
        </div>

    </div>
    <add-project></add-project>
</section>
@endsection