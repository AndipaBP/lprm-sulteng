@extends('layout/dashboard/admin')


@section('title')
{{$tipe->nama}}
@endsection

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@section('title-page')
{{$tipe->nama}}
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/superadmin/mobil')}}">Mobil</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$tipe->nama}}</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="d-flex flex-row">
                        <div class="mr-auto align-self-center">
                            <h4 class="card-title mb-0 text-white">Daftar Mobil</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Nama Rental</th>
                                    <th>No. Plat</th>
                                    <th>Pemilik</th>
                                    <th>Status</th>
                                    <th>Foto Mobil</th>
                                    <th style="width:3%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mobil as $row)
                                <tr>
                                    <td>
                                    <a href="{{url('/superadmin/rental')}}/{{$row->rental->id}}/mobil" class="text-dark"><i class="fas fa-home"></i> {{$row->rental->nama}}</a>
                                    </td>
                                    <td>{{$row->no_plat}}
                                        <br>
                                        Tahun : {{$row->tahun_mobil}}
                                    </td>
                                    <td>{{$row->pemilik}}
                                        <br>
                                        No. HP : {{$row->no_hp_pemilik}}
                                    </td>
                                    <td>
                                        {{ucfirst($row->status)}}
                                    </td>
                                    <td>
                                        @if($row->foto_mobil->count() == '0')
                                        Belum Memiliki Foto
                                        @else
                                        {{$row->foto_mobil->count()}} Foto
                                        @endif
                                    </td>
                                    <td>
                                    <a href="{{url()->current()}}/{{$row->id}}" class="btn btn-sm btn-info btn-rounded waves-effect waves-light">Detail Mobil</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script src="<?=url('/')?>/public/template/admin/dist/js/pages/datatable/datatable-basic.init.js"></script>
@endsection
