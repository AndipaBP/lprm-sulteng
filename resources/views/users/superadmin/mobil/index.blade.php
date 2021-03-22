@extends('layout/dashboard/admin')


@section('title')
Mobil
@endsection

@section('header-scripts')

@endsection

@section('title-page')
Mobil
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Mobil</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($tipe as $row)
                <div class="col-4">
                    <div
                        style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$row->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover;'>
                        <div
                            style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                            <div style="font-weight: 500;  font-size: 1.3em;">{{$row->nama}} <span
                                    style="font-size: 0.5em; font-weight: 500;">{{$row->merk_mobil->nama}}</span></div>
                            <div style="position: absolute; right: 0; bottom: -1em;">
                                <div style="display: flex; justify-content:flex-end; margin-top: 0.2em;">
                                    <a href="{{url()->current()}}/{{$row->id}}"
                                        style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.9em; border-radius: 2em;">Daftar</a>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 0.8em;">
                            <div
                                style="font-size: 0.7em; color: white; padding-left: 1.3em; width: 100%; display: flex; align-items: center;">
                                <img src="<?=url('/')?>/public/images/icon_svg/kapasitas.svg"
                                    style="width: 1em;">&nbsp;<span style="padding-top: 0.2em;">{{$row->mobil->count()}} 
                                    Mobil</span>&nbsp;&nbsp;&nbsp;
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('modal')

@endsection

@section('footer-scripts')


@endsection
