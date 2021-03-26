@extends('layout/dashboard/admin')


@section('title')
Tambah Mobil
@endsection

@section('header-scripts')

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/css/select2.min.css">

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/dropzone/dist/min/dropzone.min.css">

@endsection

@section('title-page')
Tambah Mobil
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/rental')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/rental/mobil')}}">Daftar Mobil</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Mobil</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title mb-0 text-white">Tambah Mobil</h4>
                </div>
                <div class="card-body">
                    <form class="striped-rows" action="{{url()->current()}}/simpan" method="post">
                        {{csrf_field()}}
                        <div class="">
                            <h4 class="card-title">INFORMASI PEMILIK</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_pemilik">Nama Pemilik<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                                            required placeholder="Nama Pemilik...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="alamat_pemilik">Alamat Pemilik<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="alamat_pemilik"
                                            name="alamat_pemilik" required placeholder="Alamat Pemilik...">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_hp_pemilik">No. HP Pemilik<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="number" class="form-control" id="no_hp_pemilik"
                                            name="no_hp_pemilik" required placeholder="No. HP Pemilik...">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="">
                            <h4 class="card-title">INFORMASI MOBIL</h4>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="tipe_mobil">Tipe Mobil<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <select class="select2 form-control custom-select" id="tipe_mobil"
                                            name="tipe_mobil" required style="width: 100%; height:45px;">
                                            <option value="" selected disabled>--- Pilih Tipe Mobil ---</option>
                                            @foreach($tipe as $row)
                                            <option value="{{$row->id}}">{{$row->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="tahun_mobil">Tahun Mobil<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="number" class="form-control" id="tahun_mobil" name="tahun_mobil"
                                            placeholder="Tahun Mobil..." required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tahun_mobil">Plat Mobil<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="plat_mobil" name="plat_mobil"
                                            placeholder="Plat Mobil..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="kapasitas_mobil">Kapasitas</label>
                                        <input type="number" class="form-control" id="kapasitas_mobil"
                                            name="kapasitas_mobil" placeholder="Kapasitas Mobil...">
                                        <div class="d-flex justify-content-end">
                                            <small class="form-text text-muted">/Orang</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="harga_per_hari">Harga<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="harga_per_hari"
                                            name="harga_per_hari" placeholder="Harga..." required>
                                        <div class="d-flex justify-content-end">
                                            <small class="form-text text-muted">/Hari</small>
                                        </div>
                                    </div>
                                </div>
                              
                            </div>

                        </div>


                        <div class="mt-2">
                            <button type="submit" class="btn btn-dark">Simpan</button>


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

@endsection

@section('footer-scripts')

<script src="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?=url('/')?>/public/template/admin/dist/js/pages/forms/select2/select2.init.js"></script>
<script src="<?=url('/')?>/public/template/admin/assets/libs/dropzone/dist/min/dropzone.min.js"></script>

<script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }

</script>

@endsection
