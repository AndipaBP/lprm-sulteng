@extends('layout/dashboard/admin')


@section('title')
Pengaturan Akun
@endsection

@section('header-scripts')

@endsection

@section('title-page')
Pengaturan Akun
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Pengaturan Akun</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#akun" role="tab">
                        <span class="hidden-sm-up"><i class="ti-user"></i></span>
                        <span class="hidden-xs-down">Akun</span></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
                <div class="tab-pane active" id="akun" role="tabpanel">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{url()->current()}}/simpan" method="post">
                                    @csrf
                                    @method('PUT')
                                    <h3>Akun</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group">
                                                @if(Session::get('level_akses') == 'Superadmin')
                                                <label for="username">Username</label>
                                                @else
                                                <label for="username">No. ID Regitrasi</label>
                                                @endif
                                                <input type="text" class="form-control" id="username" name="username"
                                                    onkeypress="return AvoidSpace(event)" value="{{$user->username}}" disabled
                                                    required placeholder="Username...">
                                                <small class="form-text text-muted">Tanpa menggunakan spasi</small>
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email..." value="{{$user->email}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="password">Password Baru</label>
                                                <input type="text" class="form-control" id="password" name="password"
                                                    placeholder="Password Baru...">
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

        </div>
    </div>
</div>


@endsection

@section('modal')


@endsection

@section('footer-scripts')

<script>
    function AvoidSpace(event) {
        var k = event ? event.which : window.event.keyCode;
        if (k == 32) return false;
    }
</script>

@endsection
