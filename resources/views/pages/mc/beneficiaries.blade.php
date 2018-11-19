@extends('layouts.app')

@section('title')
  | Beneficiaries
@endsection

@section('content')

<section class="main-container" id="vueId">

    <!-- Page header -->
    <div class="header">
        <div class="header-content">
            <div class="page-title">
                <i class="icon-briefcase position-left"></i> All Beneficiaries
            </div>
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}"></a></li>
                <li><a href="{{route('monitoring-and-control.beneficiaries')}}">Beneficiaries</a></li>
                <li class="active">All Beneficiaries</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->
    <div class="container-fluid page-content">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-md-12">
                <!-- People header -->
                <div class="p-15 header no-mb">
                    <div class="list-buttons">
                        <div class="float-right">
                            <form action="{{route('monitoring-and-control.beneficiaries')}}" method="get">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="search" id="search" placeholder="E.g. FCDA/DRC/GK/18/19202">
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- /People header -->
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-inverse card-flat">
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
                    <div class="card-header">
                        <div class="card-title">All Beneficiaries
                            <span class="pull-right">
                                <a class="btn btn-default" target="_blank" href="{{route('beneficiaries.create.monitoring-and-control')}}">Add new beneficiary</a>
                            </span>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover invoice-list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Amount Collected</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $ii = 0; @endphp
                                    @forelse ($beneficiaries as $item)
                                        <tr>
                                            <td>
                                                {{$ii+=1}}
                                            </td>
                                            <td>
                                                {{$item->monitoring_and_control($item->id) ? $item->monitoring_and_control($item->id)->code : 'N/A'}}
                                            </td>
                                            <td>
                                                {{$item->name}}
                                            </td>
                                            <td>
                                                {{$item->monitoring_and_control($item->id) ? $item->monitoring_and_control($item->id)->address : 'N/A'}}
                                            </td>
                                            <td>
                                                {{$item->monitoring_and_control($item->id) ? $item->monitoring_and_control($item->id)->phone : 'N/A'}}
                                            </td>
                                            <td>
                                                {{$item->monitoring_and_control($item->id) ? $item->monitoring_and_control($item->id)->amount_collected : 'N/A'}}
                                            </td>
                                            <td>
                                                @if ($item->monitoring_and_control($item->id))
                                                    <a href="{{route('monitoring-and-control.edit', ['bid' => $item->id, 'mc_id' => $item->monitoring_and_control($item->id)->id])}}" style="color:#04c">Edit</a>
                                                @else
                                                    <a href="{{route('monitoring-and-control.edit', ['bid' => $item->id, 'mc_id' => 0])}}" style="color:#04c">Edit</a>
                                                @endif
                                                <a href="#!" style="color:red" onclick="event.preventDefault();document.getElementById('delete{{$item->id}}').submit();">Delete</a>
                                                <form action="{{route('monitoring-and-control.beneficiaries.delete', ['id' => $item->id])}}" method="post" id="delete{{$item->id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <h4 class="text-center">Looks quiet in here. Use the button above to create a new beneficiary.</h4>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection