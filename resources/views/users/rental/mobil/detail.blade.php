@extends('layout/dashboard/admin')


@section('title')
{{$mobil->no_plat}}
@endsection

@section('header-scripts')

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/css/select2.min.css">

@endsection

@section('title-page')
{{$mobil->no_plat}}
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/rental/mobil')}}">Daftar Mobil</a></li>
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
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="kapasitas_mobil">Kapasitas</label>
                                                <input type="number" class="form-control" id="kapasitas_mobil"
                                                    name="kapasitas_mobil" required placeholder="Kapasitas Mobil..."
                                                    value="{{$mobil->kapasitas}}">
                                                <div class="d-flex justify-content-end">
                                                    <small class="form-text text-muted">/Penumpang</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="harga_per_hari">Harga<span
                                                        class="badge badge-danger ml-2">Wajib</span></label>
                                                <input type="text" class="form-control" id="harga_per_hari"
                                                    name="harga_per_hari" placeholder="Harga..." required
                                                    value="Rp. {{number_format($mobil->harga_per_hari,0,',','.')}}">
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
                                                    value="0{{$mobil->no_hp_pemilik}}">
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
                                                src="<?=url('/')?>/public/upload/rental/{{Session::get('rental_id')}}/img/mobil/{{$row->mobil_id}}/{{$row->foto}}"
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

    var rupiah = document.getElementById("harga_per_hari");
    rupiah.addEventListener("keyup", function (e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

</script>

@endsection
