@extends('layout/dashboard/admin')

@section('title')
Dashboard
@endsection

@section('header-scripts')

@endsection

@section('title-page')
Dashboard
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
                @foreach($mobil as $row)
                <div class="col-lg-4 col-md-8 col-sm-12">
                    @if($row->foto_mobil->count() == '0')
                    <div
                                style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/images/tipe_mobil/{{$row->tipe_mobil->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover;'>
                    @else
                        @foreach($row->foto_mobil as $foto_mobil)
                            @if ($loop->first)
                                <div
                                    style='height: 12em; margin-bottom: 1.5em; background: linear-gradient(180deg, rgba(16, 26, 25, 0) 8%, #111B1A 100%), url("<?=url('/')?>/public/upload/rental/{{$row->rental_id}}/img/mobil/{{$row->id}}/{{$foto_mobil->foto}}"); filter: drop-shadow(1px 1px 5px #000000); border-radius: 12px; display: flex; align-items: flex-start; flex-direction: column; justify-content: flex-end; padding-right: 1em; background-size: cover;'>
                            @endif
                        @endforeach
                    @endif
                        <div
                            style="padding-left: 0.8em; text-align: left; color: white;width: 100%; display: flex; justify-content: space-between; position: relative;">
                            <div style="font-weight: 500;  font-size: 1.3em;">{{$row->tipe_mobil->nama}} <span
                                    style="font-size: 0.5em; font-weight: 500;">{{$row->tipe_mobil->merk_mobil->nama}}</span>
                            </div>
                            <div style="position: absolute; right: 0; bottom: -1em;">
                                <div  style="text-align: right; width: 100%; color: white;">
                                <div style="font-size: 0.7em; line-height: 1em;">{{$row->status}}</div>

                                    <div style="font-size: 1.1em; font-weight: 500;">{{$row->no_plat}}
                                    </div>
                                </div>
                                <div style="display: flex; justify-content:flex-end; margin-top: 0.2em;">
                                    <a href="{{url()->current()}}/mobil/{{$row->id}}"
                                        style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.9em; border-radius: 2em;">Detail
                                        Mobil</a>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; width: 100%; margin-bottom: 0.8em;">
                            <div
                                style="font-size: 0.7em; color: white; padding-left: 1.3em; width: 100%; display: flex; align-items: center;">
                                @if($row->foto_mobil->count() == '0')
                                <span
                                    style="padding-top: 0.2em;">Belum Memiliki
                                    Foto</span>&nbsp;|&nbsp;
                                @else
                                <span
                                    style="padding-top: 0.2em;">{{$row->foto_mobil->count()}} 
                                    Foto</span>&nbsp;|&nbsp;
                                @endif
                                <span style="padding-top: 0.2em;">Tahun : {{$row->tahun_mobil}}</span>
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
