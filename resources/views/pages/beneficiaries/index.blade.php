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
                <li><a href="{{route('beneficiaries.index')}}">Beneficiaries</a></li>
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
                            <form action="{{route('beneficiaries.index')}}" method="get">
                                @csrf
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
                        <div class="card-title">All Beneficiaries
                            <span class="pull-right">
                                <a class="btn btn-default" target="_blank" href="{{route('beneficiaries.create')}}">Add new beneficiary</a>
                            </span>
                        </div>
                    </div>

                    <table class="table table-hover invoice-list" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Code</th>
                                <th>Economic / Crop Valuation</th>
                                <th>Structure Valuation</th>
                                <th>Created by</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @forelse($beneficiaries as $beneficiary)
                            <tr>
                                <td>{{ $count+=1 }}</td>
                                <td>
                                    <a href="{{ route('beneficiaries.show', ['id' => $beneficiary->id]) }}">{{ $beneficiary->name }}</a>
                                </td>
                                <td>{{ $beneficiary->phone }}</td>
                                <td>{{ $beneficiary->code }}</td>
                                @if (count($beneficiary->properties) > 0)
                                    <td>
                                        @php $t = 0; @endphp
                                        @foreach ($beneficiary->properties as $p)
                                            @if (count($p->cropProperty) > 0)
                                                @foreach ($p->cropProperty as $c)
                                                    @php $t += $c->valuation; @endphp
                                                @endforeach
                                            @endif
                                        @endforeach
                                        <b>₦{{number_format($t, 2)}}</b>
                                    </td>
                                    <td>
                                        @php $t2 = 0; @endphp
                                        @foreach ($beneficiary->properties as $p)
                                            @foreach ($p->structure as $s2)
                                                @php $t2 += $s2->valuation_of_structure; @endphp
                                            @endforeach
                                        @endforeach
                                        <b>₦{{number_format($t2, 2)}}</b>
                                    </td>
                                @else
                                    <td><b>₦0.00</b></td>
                                    <td><b>₦0.00</b></td>
                                @endif
                                <td>
                                    <div class="no-m">
                                        <a href="#">{{ $beneficiary->owner->fname . " " . $beneficiary->owner->lname }}</a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li><a href="{{ route('beneficiaries.show', ['id' => $beneficiary->id]) }}"><i class="icon-eye2"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                    <div class="col-md-8 col-md-offset-2">
                        {{ $beneficiaries->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection