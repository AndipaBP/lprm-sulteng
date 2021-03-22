@extends('layout/dashboard/admin')


@section('title')
{{$mobil->no_plat}} | {{$rental->nama}}
@endsection

@section('header-scripts')

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/css/select2.min.css">

@endsection

@section('title-page')
{{$mobil->no_plat}} | {{$rental->nama}}
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/superadmin/rental')}}">Rental</a></li>
<li class="breadcrumb-item"><a href="{{url('/superadmin/rental')}}/{{$rental->id}}/mobil">{{$rental->nama}}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{$mobil->no_plat}}</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#informasi-mobil" role="tab">
                        <span class="hidden-sm-up"><i class="ti-car"></i></span>
                        <span class="hidden-xs-down">Informasi Mobil</span></a>
                </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#informasi-pemilik" role="tab">
                        <span class="hidden-sm-up"><i class="ti-user"></i></span>
                        <span class="hidden-xs-down">Informasi Pemilik</span></a>
                </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto-mobil" role="tab"><span
                            class="hidden-sm-up"><i class="ti-camera"></i></span> <span class="hidden-xs-down">Foto
                            Mobil</span></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="informasi-mobil" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{url()->current()}}/informasi-mobil/simpan" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h3>Informasi Mobil</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="tipe_mobil">Tipe Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <select class="select2 form-control custom-select" id="tipe_mobil"
                                                    name="tipe_mobil" required style="width: 100%; height:45px;">
                                                    <option value="" selected disabled>--- Pilih Tipe Mobil ---</option>
                                                    @foreach($tipe as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $mobil->tipe_mobil_id)
                                                        selected @endif>{{$row->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="tahun_mobil">Tahun Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="number" class="form-control" id="tahun_mobil"
                                                    name="tahun_mobil" placeholder="Tahun Mobil..."
                                                    value="{{$mobil->tahun_mobil}}" required>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="tahun_mobil">Plat Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="text" class="form-control" id="plat_mobil"
                                                    name="plat_mobil" placeholder="Plat Mobil..."
                                                    value="{{$mobil->no_plat}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="fitur_mobil">Fitur Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <select class="select2 form-control" id="fitur_mobil"
                                                    name="fitur_mobil[]" multiple="multiple" required
                                                    style="width: 100%; height:45px;">
                                                    @foreach($fitur as $row)
                                                    @php $find = false; @endphp
                                                    @foreach($mobil->fitur_mobil as $item)
                                                    @if ($row->id == $item->fitur_id)
                                                    @php $find = true; @endphp
                                                    break;
                                                    @endif
                                                    @endforeach
                                                    @if ($find == true)
                                                    <option value="{{$row->id}}" selected>{{$row->nama}}</option>
                                                    @else
                                                    <option value="{{$row->id}}">{{$row->nama}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <small class="form-text text-muted">Silakan Beberapa Pilih Beberapa
                                                    Fitur
                                                    Mobil</small>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="kapasitas_mobil">Kapasitas<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="number" class="form-control" id="kapasitas_mobil"
                                                    name="kapasitas_mobil" required placeholder="Kapasitas Mobil..."
                                                    value="{{$mobil->kapasitas}}">
                                                <div class="d-flex justify-content-end">
                                                    <small class="form-text text-muted">/Penumpang</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="bagasi_mobil">Bagasi Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="number" class="form-control" id="bagasi_mobil"
                                                    name="bagasi_mobil" required placeholder="Bagasi Mobil..."
                                                    value="{{$mobil->bagasi}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="harga_per_hari">Harga<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="text" class="form-control" id="harga_per_hari"
                                                    name="harga_per_hari" placeholder="Harga..." required
                                                    value="{{$mobil->harga_per_hari}}">
                                                <div class="d-flex justify-content-end">
                                                    <small class="form-text text-muted">/Hari</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="status_mobil">Status Mobil<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <select class="form-control" id="status_mobil"
                                                    name="status_mobil" required >
                                                    <option value="" selected disabled>--- Pilih Status Mobil ---</option>
                                                    <option value="ready" @if('ready' == $mobil->status)
                                                        selected @endif>Ready</option>
                                                        <option value="tidak ready" @if('tidak ready' == $mobil->status)
                                                        selected @endif>Tidak Ready</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="informasi-pemilik" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{url()->current()}}/informasi-pemilik/simpan" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h3>Informasi Pemilik</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="nama_pemilik">Nama Pemilik<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="text" class="form-control" id="nama_pemilik"
                                                    name="nama_pemilik" required placeholder="Nama Pemilik..."
                                                    value="{{$mobil->pemilik}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group">
                                                <label for="alamat_pemilik">Alamat Pemilik<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="text" class="form-control" id="alamat_pemilik"
                                                    name="alamat_pemilik" required placeholder="Alamat Pemilik..."
                                                    value="{{$mobil->alamat_pemilik}}">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="no_hp_pemilik">No. HP Pemilik<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="number" class="form-control" id="no_hp_pemilik"
                                                    name="no_hp_pemilik" required placeholder="No. HP Pemilik..."
                                                    value="{{$mobil->no_hp_pemilik}}">
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="foto-mobil" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex flex-row">
                                    <div class="mr-auto align-self-center">
                                        <h3>Foto Mobil</h3>
                                    </div>
                                    <div class="ml-auto align-self-center">
                                        <button type="submit" data-toggle="modal" data-target="#modal-tambah"
                                            class="btn waves-effect waves-light btn-rounded btn-dark">Tambah
                                            Foto</button>
                                    </div>
                                </div>
                                <hr>
                                @if($mobil->foto_mobil->count() == '0')
                                Belum Memiliki Foto
                                @else
                                <div class="row">
                                    @foreach($mobil->foto_mobil as $row)
                                    <div class="col-4">
                                        <div class="card">
                                            <img class="card-img-top img-responsive"
                                                src="<?=url('/')?>/public/upload/rental/{{Request::segment(3)}}/img/mobil/{{$row->mobil_id}}/{{$row->foto}}"
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
                <h4 class="modal-title text-white" id="myModalLabel">Tambah Foto Mobil</h4>
                <button type="button" class="close ml-auto" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form enctype="multipart/form-data" action="{{url()->current()}}/foto-mobil/simpan" method="post">
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
