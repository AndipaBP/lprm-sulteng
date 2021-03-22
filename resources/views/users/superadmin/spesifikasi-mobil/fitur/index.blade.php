@extends('layout/dashboard/admin')


@section('title')
Fitur Mobil
@endsection

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@section('title-page')
Spesifikasi Mobil | Fitur Mobil
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Fitur Mobil</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="d-flex flex-row">
                        <div class="mr-auto align-self-center">
                            <h4 class="card-title mb-0 text-white">Daftar Fitur Mobil</h4>
                        </div>
                        <div class="ml-auto align-self-center">
                            <button type="button" data-toggle="modal" data-target="#modal-tambah"
                                class="btn waves-effect waves-light btn-rounded btn-light">Tambah Fitur</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Fitur</th>
                                    <th style="width:5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fitur as $row)
                                <tr>
                                    <td>{{$row->nama}}</td>
                                    <td><button type="button" class="btn btn-danger btn-block waves-effect waves-light"
                                            data-toggle="modal" data-target="#modal-hapus"
                                            onclick="hapus_data('{{$row->id}}')">Hapus</button></td>
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

<div id="modal-tambah" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel">Tambah Fitur Mobil</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="fitur_mobil">Fitur Mobil<span
                                        class="badge badge-danger ml-2">Wajib</span></label>
                                <input type="text" class="form-control" id="fitur_mobil" name="fitur_mobil" required
                                    placeholder="Fitur Mobil...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Tutup</button>

                    <button type="submit" class="btn btn-dark waves-effect">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

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

</script>
@endsection
