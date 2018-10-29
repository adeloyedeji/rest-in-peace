@extends('layouts.app')

@section('title')
  | Structures Valuation
@endsection

@section('content')
<section class="main-container" id="vueId">
    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-lifebuoy position-left"></i> Structures Valuations
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li class="active">Structures Valuations</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-sm-4">
                <!-- Manage tickets -->
                <div class="list-group list-group-lg m-b-20">
                    <div class="list-group-header">Manage Valuations</div>
                    <li class="list-group-item justify-content-between active">
                        <a href="#" class="active">
                            <i class="icon-chart14 position-left"></i> All valuations
                        </a>
                        {{-- <span class="badge badge-pill bg-danger">93</span> --}}
                    </li>
                    <a href="{{route('beneficiaries.create')}}" class="list-group-item">
                        <i class=" icon-users4 position-left"></i> Create Beneficiary
                    </a>
                    <a href="{{route('projects.index')}}" class="list-group-item">
                        <i class="icon-folder-plus2 position-left"></i> Create Project
                    </a>
                    <a href="#" onclick="loadForm()" class="list-group-item">
                        <i class="icon-enter-sign position-left"></i> Start capturing
                    </a>
                </div>
                <!-- /Manage tickets -->

                <!-- Quick stats -->
                <div class="card card-inverse card-flat">
                    <div class="card-header no-mb">
                        <h6 class="text-uppercase text-muted text-semibold">Quick Stats</h6>
                    </div>
                    <div class="card-block no-pl no-pr">
                        <table class="table table-striped table-borderless">
                            <tbody>
                                <tr>
                                    <td class="text-right" style="width: 70%;">
                                        <span class="text-semibold">Total Projects</span>
                                    </td>
                                    <td>{{$total_projects}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <span class="text-semibold">Total Beneficiaries</span>
                                    </td>
                                    <td>{{$total_beneficiaries}}</td>
                                </tr>
                                <tr>
                                    <td class="text-right">
                                        <span class="text-semibold">Total valuations</span>
                                    </td>
                                    <td>₦{{number_format($total_valuation, 2)}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /Quick stats -->
            </div>

            <div class="col-xs-12 col-md-9 col-sm-8">
                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">Valuation Index</div>
                    </div>
                    <div class="card-block">

                        <ul class="nav nav-tabs nav-lg nav-tabs-highlight" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#beneficiaries" role="tab">All Beneficiaries</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#projects" role="tab">All Projects</a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <!-- List all tickets -->
                            <div class="tab-pane active" id="beneficiaries" role="tabpanel">
                                <div class="table-responsive remove-margin-bottom">
                                    <table class="table table-striped table-vcenter remove-margin-bottom">
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
                                <br><br>
                                {{ $beneficiaries->links() }}
                            </div>
                            <!-- /List all tickets -->

                            <!-- Single ticket -->
                            <div class="tab-pane" id="projects" role="tabpanel">
                                <div class="table-responsive remove-margin-bottom">
                                        <table class="table table-striped table-vcenter remove-margin-bottom">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Code</th>
                                                    <th>Title</th>
                                                    <th>Beneficiaries</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @php $i = 0; @endphp
                                                @forelse ($projects as $p)
                                                    <tr>
                                                        <td>{{$i+=1}}</td>
                                                        <td>{{$p->code}}</td>
                                                        <td><a href="{{ route('projects.show', ['id' => $p->id]) }}">{{$p->title}}</a></td>
                                                        <td>{{$p->beneficiaries}}</td>
                                                    </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4">No projects found.</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    {{ $projects->links() }}
                            </div>
                            <!-- /Single ticket -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample form -->
    <div id="form_notice" class="hide">
        <form action="#">
            <input type="hidden" name="forge" id="forge" value="{{csrf_token()}}">
            <h4 class="no-mt m-b-15">Enter beneficiary code</h4>
            <div class="form-group">
                <label>Code</label>
                <input type="text" class="form-control" name="create_ben_code" id="create_ben_code" placeholder="FCDA/DRC/2018/2092" value="{{'FCDA/DRC/' . date('Y') . '/'}}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <select class="form-control" name="create_ben_project" id="create_ben_project">
                    @forelse ($projects as $p)
                        <option value="{{$p->id}}">{{$p->title}}</option>
                    @empty
                        <option value="00">No projects found!</option>
                    @endforelse
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <button type="button" name="cancel" class="btn btn-secondary btn-block">Cancel</button>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <!-- /sample form -->
</section>
@endsection