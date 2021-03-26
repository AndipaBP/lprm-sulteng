@extends('layout/dashboard/admin')


@section('title')
Tambah Rental
@endsection

@section('header-scripts')

<link rel="stylesheet" type="text/css"
    href="<?=url('/')?>/public/template/admin/assets/libs/select2/dist/css/select2.min.css">

@endsection

@section('title-page')
Tambah Rental
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/superadmin/rental')}}">Rental</a></li>
<li class="breadcrumb-item active" aria-current="page">Tambah Rental</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title mb-0 text-white">Tambah Rental</h4>
                </div>
                <div class="card-body">
                    <form class="striped-rows" action="{{url()->current()}}/simpan" method="post">
                        {{csrf_field()}}
                        <div class="">
                            <h4 class="card-title">AKUN</h4>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="username">No. ID Regitrasi / Username<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            onkeypress="return AvoidSpace(event)" required placeholder="Username...">
                                        <small class="form-text text-muted">Tanpa menggunakan spasi</small>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="password">Password<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="password" name="password" required
                                            placeholder="Password...">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <hr>
                        <div class="">
                            <h4 class="card-title">INFORMASI RENTAL</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="pemilik_rental">Pemilik Rental<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="pemilik_rental" name="pemilik_rental"
                                            required placeholder="Pemilik Rental...">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama_rental">Nama Rental<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="nama_rental" name="nama_rental"
                                            required placeholder="Nama Rental...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="no_hp">No. HP<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="12"
                                            required placeholder="No. HP..">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="alamat">Alamat<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required
                                            placeholder="Alamat...">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <select class="select2 form-control custom-select" id="kelurahan"
                                            name="kelurahan" required style="width: 100%; height:40px;">
                                            <option value="" selected disabled>--- Pilih Kelurahan ---</option>
                                            @foreach($kel as $row)
                                            <option value="{{$row->id}}">{{$row->kelurahan}}</option>
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
                                            placeholder="Latitude...">
                                        <small class="form-text text-muted">Contoh : -0.8192005</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="alamat">Longitude</label>
                                        <input type="text" class="form-control" id="longitude" name="longitude"
                                            placeholder="Longitude...">
                                        <small class="form-text text-muted">Contoh : 119.8020384</small>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="submit" class="btn btn-dark">Simpan</button>
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

<script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }

</script>

@endsection
