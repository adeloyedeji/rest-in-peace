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
                <li>Beneficiaries</li>
                <li class="active">All Beneficiaries</li>
            </ul>
        </div>
    </div>
    <!-- /Page header -->

    <div class="container-fluid page-content">

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-inverse card-flat">
                    <div class="card-header">
                        <div class="card-title">All Beneficiaries
                            <span class="pull-right">
                                <button class="btn btn-default" onclick="window.location.href='{{ route("beneficiaries.create") }}'">Add new beneficiary</button>
                            </span>
                        </div>
                    </div>

                    <table class="table table-hover invoice-list" id="datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Project</th>
                                <th>Created by</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 0; ?>
                            @forelse($beneficiaries as $beneficiary)
                            <?php
                            $address = "";
                            $address = $beneficiary->street ? $beneficiary->street : "Undefined Street";
                            $address .= ", ";
                            $address .= $beneficiary->city ? $beneficiary->city : "Undefined City";
                            $address .= ", ";
                            $address .= $beneficiary->lga ? $beneficiary->lga->lga : "Undefined Lga";
                            $address .= ", ";
                            $address .= $beneficiary->state ? $beneficiary->state->state : "Undefined State";
                            ?>
                            <tr>
                                <td>{{ $count+=1 }}</td>
                                <td>{{ $beneficiary->fname . " " . $beneficiary->fname }}</td>
                                <td>{{ $beneficiary->phone }}</td>
                                <td>{{ $address }}</td>
                                <td>
                                    @if(count($beneficiary->projects) == 0)
                                    Not yet assigned
                                    @else
                                    {{ count($beneficiary->projects) }}
                                    @endif
                                </td>
                                <td>
                                    <div class="no-m">
                                        <a href="#">{{ $beneficiary->owner->fname . " " . $beneficiary->owner->lname }}</a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <ul class="icons-list">
                                        <li><a href="{{ route('beneficiaries.show', ['id' => $beneficiary->id]) }}"><i class="icon-eye2"></i></a></li>
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
                        {{ $beneficiaries }}
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection