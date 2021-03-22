@extends('layout/dashboard/admin')


@section('title')
Tipe Mobil
@endsection

@section('header-scripts')

<link href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css"
    rel="stylesheet">
<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">

@endsection

@section('title-page')
Spesifikasi Mobil | Tipe Mobil
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Tipe Mobil</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <div class="d-flex flex-row">
                        <div class="mr-auto align-self-center">
                            <h4 class="card-title mb-0 text-white">Daftar Tipe Mobil</h4>
                        </div>
                        <div class="ml-auto align-self-center">
                            <button type="button" data-toggle="modal" data-target="#modal-tambah"
                                class="btn waves-effect waves-light btn-rounded btn-light">Tambah Tipe</button>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="config-table" class="table display table-bordered table-striped no-wrap">
                            <thead>
                                <tr>
                                    <th>Tipe</th>
                                    <th>Merek</th>
                                    <th>Jenis</th>
                                    <th style="width:20%;">Foto</th>
                                    <th style="width:5%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipe as $row)
                                <tr>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->merk_mobil->nama}}</td>
                                    <td>{{$row->jenis_mobil->nama}}</td>
                                    <td><img src="<?=url('/')?>/public/images/tipe_mobil/{{$row->foto}}" alt=""
                                            width="100%"></td>
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
                <h4 class="modal-title text-white" id="myModalLabel">Tambah Tipe Mobil</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form enctype="multipart/form-data" action="{{url()->current()}}/simpan" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tipe_mobil">Tipe Mobil<span
                                        class="badge badge-danger ml-2">Wajib</span></label>
                                <input type="text" class="form-control" id="tipe_mobil" name="tipe_mobil" required
                                    placeholder="Tipe Mobil...">
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="merk_mobil">Merk Mobil<span
                                        class="badge badge-danger ml-2">Wajib</span></label>
                                <select class="form-control" name="merk_mobil" id="merk_mobil" required>
                                    <option value="" selected disabled>--- Pilih Merek Mobil ---</option>
                                    @foreach($merk as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group">
                                <label for="jenis_mobil">Jenis Mobil<span
                                        class="badge badge-danger ml-2">Wajib</span></label>
                                <select class="form-control" name="jenis_mobil" id="jenis_mobil" required>
                                    <option value="" selected disabled>--- Pilih Jenis Mobil ---</option>
                                    @foreach($jenis as $row)
                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="foto_jenis">Foto<span class="badge badge-danger ml-2">Wajib</span></label>
                            <input type="file" class="form-control" id="file_upload" name="file_upload" required>
                            <br>
                            <h6>Preview : </h6>
                            <img src="<?=url('/')?>/public/images/default/image_placeholder.png" alt="image_preview"
                                id="image_preview" width="100%">
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
    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file_upload").change(function () {
        readURL(this);
    });


    function hapus_data(id) {
        $("#id_hapus").val(id);
    }

</script>
@endsection
