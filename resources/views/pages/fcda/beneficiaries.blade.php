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
                <li><a href="{{route('fcda.beneficiaries')}}">Beneficiaries</a></li>
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
                            <form action="{{route('fcda.beneficiaries')}}" method="get">
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
                    <div class="card-header">
                        <div class="card-title">
                            All Beneficiaries
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table table-hover invoice-list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Valuation</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @forelse ($beneficiaries as $item)
                                        <tr>
                                            <td>
                                                {{$i+=1}}
                                            </td>
                                            <td>
                                                {{$item->name}}
                                            </td>
                                            <td>
                                                <img src="{{$item->photo}}" alt="{{$item->name}}" style="width:70px;height:70px;">
                                            </td>
                                            <td>
                                                00.00
                                            </td>
                                            <td>
                                                <a href="#!" style="color:#04c">Edit</a>
                                                <form action="" method="post"></form>
                                                <a href="#!" style="color:red" onclick="document.getElementById('deleteForm{{$item->id}}').submit()">Delete</a>
                                                <form action="{{route('planning.delete', ['id' => $item->id])}}" method="post" id="deleteForm{{$item->id}}">
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
                        {{ $beneficiaries->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection