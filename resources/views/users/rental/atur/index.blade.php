@extends('layout/dashboard/admin')


@section('title')
Atur Rental
@endsection

@section('header-scripts')

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/css/select2.min.css">

@endsection

@section('title-page')
Atur Rental
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/rental')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Atur Rental</li>
@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#informasi-rental" role="tab"><span
                            class="hidden-sm-up"><i class="ti-car"></i></span> <span class="hidden-xs-down">Informasi
                            Rental</span></a>
                </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto-rental" role="tab"><span
                            class="hidden-sm-up"><i class="ti-camera"></i></span> <span class="hidden-xs-down">Foto
                            Rental</span></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="informasi-rental" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{url()->current()}}/informasi-rental/simpan" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h3>Informasi Rental</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group">
                                                <label for="nama_rental">Nama Rental</label>
                                                <input type="text" class="form-control" id="nama_rental"
                                                    name="nama_rental" value="{{$rental->nama}}" required
                                                    placeholder="Nama Rental...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="no_hp">No. HP</label>
                                                <input type="text" class="form-control" id="no_hp" name="no_hp" required
                                                    maxlength="12" value="{{$rental->nomor_hp}}" placeholder="No. HP..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat"
                                                    required value="{{$rental->alamat}}" placeholder="Alamat...">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="kelurahan">Kelurahan</label>
                                                <select class="select2 form-control custom-select" id="kelurahan"
                                                    name="kelurahan" required style="width: 100%; height:40px;">
                                                    <option value="" disabled>--- Pilih Kelurahan ---</option>
                                                    @foreach($kel as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $rental->kelurahan_id)
                                                        Selected @endif>{{$row->kelurahan}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" class="form-control" id="latitude" name="latitude"
                                                    value="{{$rental->lat}}" placeholder="Latitude...">
                                                <small class="form-text text-muted">Contoh : -0.8192005</small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="alamat">Longitude</label>
                                                <input type="text" class="form-control" id="longitude" name="longitude"
                                                    value="{{$rental->lng}}" placeholder="Longitude...">
                                                <small class="form-text text-muted">Contoh : 119.8020384</small>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="foto-rental" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-row">
                                    <div class="mr-auto align-self-center">
                                        <h3>Foto Rental</h3>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <button type="submit" data-toggle="modal" data-target="#modal-tambah"
                                            class="btn waves-effect waves-light btn-rounded btn-dark">Tambah
                                            Foto</button>
                                    </div>
                                </div>
                                <hr>
                                @if($rental->foto_rental->count() == '0')
                                Belum Memiliki Foto
                                @else
                                <div class="row">
                                    @foreach($rental->foto_rental as $row)
                                    <div class="col-4">
                                        <div class="card">
                                            <img class="card-img-top img-responsive"
                                                src="<?=url('/')?>/public/upload/rental/{{$rental->id}}/img/{{$row->foto}}"
                                                alt="{{$row->foto}}">
                                            <button type="button" data-toggle="modal" data-target="#modal-hapus"
                                                onclick="hapus_data('{{$row->id}}')"
                                                class="btn btn-sm btn-danger">Hapus</button>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
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

<div id="modal-tambah" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center bg-dark">
                <h4 class="modal-title text-white" id="myModalLabel">Tambah Foto Rental</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form enctype="multipart/form-data" action="{{url()->current()}}/foto-rental/simpan" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
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
                    <h3>Apakah Yakin Ingin Menghapus Foto Ini ?
                    </h3>

                </div>
            </div>

            <div class="modal-footer justify-content-between ">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="{{url()->current()}}/hapus-foto" method="POST">
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

<script src="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/dist/js/pages/forms/select2/select2.init.js"></script>


<script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }

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
