@extends('layout/dashboard/admin')


@section('title')
Daftar Mobil
@endsection

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@section('title-page')
Daftar Mobil
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/rental')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Daftar Mobil</li>

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
                        <div class="ml-auto align-self-center">
                            <a href="{{url()->current()}}/tambah"
                                class="btn waves-effect waves-light btn-rounded btn-light">Tambah Mobil</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">

                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Tipe Mobil</th>
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
                                    <td>{{$row->tipe_mobil->nama}}             
                                    </td>
                                    <td>{{$row->no_plat}}
                                        <br>
                                        Tahun : {{$row->tahun_mobil}}
                                    </td>
                                    <td>{{$row->pemilik}}
                                        <br>
                                        No. HP : 0{{$row->no_hp_pemilik}}
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
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lainnya
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{url()->current()}}/{{$row->id}}">Detail</a>
                                                <div class="dropdown-divider"></div>
                                                <button type="button" class="dropdown-item" data-toggle="modal"
                                                    data-target="#modal-hapus"
                                                    onclick="hapus_data('{{$row->id}}')">Hapus</button>
                                            </div>
                                        </div>

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

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Body-->
            <div class="modal-body">
                <div class="text-center">
                    <i class="fas fa-trash fa-4x mb-3 "></i>
                    <h3>Apakah Yakin Ingin Menghapus Data Ini ?
                    </h3>

                </div>
            </div>

            <div class="modal-footer justify-content-between ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{url()->current()}}/hapus" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_hapus" id="id_hapus" required>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>

@endsection

@section('footer-scripts')
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/js/dataTables.responsive.min.js">
</script>
<script src="<?=url('/')?>/public/template/admin/dist/js/pages/datatable/datatable-basic.init.js"></script>

<script>
    function hapus_data(id) {
        $("#id_hapus").val(id);
    }

</script>
@endsection
