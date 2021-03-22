@extends('layout/dashboard/admin')


@section('title')
Berita
@endsection

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@php
// fungsi untuk konversi tanggal ke indonesia
function tgl_indo($tanggal){
$bulan = array (
1 => 'Januari',
'Februari',
'Maret',
'April',
'Mei',
'Juni',
'Juli',
'Agustus',
'September',
'Oktober',
'November',
'Desember'
);
$pecahkan = explode('-', $tanggal);
return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
@endphp


@section('title-page')
Berita
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Berita</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="d-flex flex-row">
                        <div class="mr-auto align-self-center">
                            <h4 class="card-title mb-0 text-white">Daftar Berita</h4>
                        </div>
                        <div class="ml-auto align-self-center">
                            <a href="{{url()->current()}}/tambah"
                                class="btn waves-effect waves-light btn-rounded btn-light">Tambah Berita</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Tanggal Berita</th>
                                    <th style="width:5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($berita as $row)
                                <tr>
                                    <td>{{$row->judul}}</td>
                                    <td>{{ tgl_indo(date('Y-m-d', strtotime($row->created_at))) }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-light dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Lainnya
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{url()->current()}}/{{$row->id}}">Ubah Berita</a>
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
                    <h3>Apakah Yakin Ingin Menghapus Berita Ini ?
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
