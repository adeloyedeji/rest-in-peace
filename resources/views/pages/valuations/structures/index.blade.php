@extends('layouts.app')

@section('title')
  | Structures Valuation Summary
@endsection

@section('content')
<section class="main-container" id="vueId">
    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> Structures Valuations Summary
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li class="active">Valuation Summary</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <select class="select" name="projects" id="projects" onchange="reloadProject(this.value)">
                    <option value="all">All Projects</option>
                    @forelse ($projects as $p)
                        @if ($p->id == $project_id)
                            <option selected value="{{$p->id}}">{{$p->title}}</option>
                        @else
                            <option value="{{$p->id}}">{{$p->title}}</option>
                        @endif
                    @empty
                        <option value="00">No projects found!</option>
                    @endforelse
                </select>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                @if ($project_id > 0)
                    Total valuations for project {{$project->title}}:
                @else
                    Total valuations (for all beneficiaries):
                @endif
                ₦{{number_format($total_valuation, 2)}}
            </div>
        </div>
        <div class="card card-inverse card-flat">
            <div class="card-header">
                <div class="card-title">
                    <i class="icon-chart14 position-left"></i>
                    <span class="pull-right">
                        <a href="#" onclick="downloadStructureReport()">
                            <i class="icon-download4"></i>
                        </a>
                    </span>
                </div>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-center">Structure Valuations</h4>
                        <div class="table-responsive">
                            <table class="table table-hover table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Beneficiary</th>
                                        <th>Total Number of Structures</th>
                                        <th>Property Valuation (₦)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @forelse ($beneficiaries as $b)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$b->code}}</td>
                                            <td><a href="{{ route('beneficiaries.show', ['id' => $b->id]) }}">{{$b->fname . " " . $b->lname}}</a></td>
                                            <td>{{$b->total_structures}}</td>
                                            <td>{{number_format($b->total_amount, 2)}}</td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No valuation records found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br><br>
                    <div class="col-md-12">
                        {{ $beneficiaries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection