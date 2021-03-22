@extends('layout/dashboard/admin')


@section('title')
Dashboard
@endsection

@section('header-scripts')

@endsection

@section('title-page')
Dashboard
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card-group">
                <div class="card p-2 p-lg-3">
                    <div class="p-lg-3 p-2">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-circle btn-danger text-white btn-lg" href="{{url('/superadmin/rental')}}">
                                <i class="ti-home"></i>
                            </a>
                            <div class="ml-4" style="width: 38%;">
                                <h4 class="font-light">Total Rental</h4>
                            </div>
                            <div class="ml-auto">
                                <h2 class="display-7 mb-0">{{$rental->count()}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card p-2 p-lg-3">
                    <div class="p-lg-3 p-2">
                        <div class="d-flex align-items-center">
                            <a class="btn btn-circle btn-cyan text-white btn-lg" href="{{url('/superadmin/mobil')}}">
                                <i class="ti-car"></i>
                            </a>
                            <div class="ml-4" style="width: 38%;">
                                <h4 class="font-light">Total Mobil</h4>
                            </div>
                            <div class="ml-auto">
                                <h2 class="display-7 mb-0">{{$mobil->count()}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')

@endsection

@section('footer-scripts')

@endsection
