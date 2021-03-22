@extends('layout/home/home')

@section('title')
{{$jenis->nama}} | LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')

<section class="how-section mspad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top:25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>{{$jenis->nama}}</h2>
        </div>
        <div class="row">
            @foreach($tipe as $tipe)
            @if($tipe->mobil->count() != '0')
            @foreach($tipe->mobil as $row)
            <div class="col-4">
                <div
                    style='margin-bottom: 1em; background: white; box-shadow: 1px 1px 11px #DAD5CE; border-radius: 12px; padding: 1em 1.5em; background-size: cover; color:black;'>
                    <div style="display: flex; align-items: flex-start; justify-content: space-between;">
                        <div>
                            <div class="text-dark" style="font-size: 0.85em; font-weight: 600;">{{$row->rental->nama}}
                            </div>
                            <div class="text-dark" style="font-weight: 600; font-size: 0.8em;">Kota Palu</div>
                            <div
                                style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0.5em;">
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="far fa-star star-rating"></i>
                            </div>
                            <div
                                style="color: #07820C; font-size: 0.7em; display: flex; align-items: flex-start; margin-top: 2em;">
                                <div>
                                    <img src="<?=url('/')?>/public/images/icon_svg/time_green.svg">
                                </div>
                                &nbsp;
                                <div style="margin-left: 0.8em;">Penggunaan hingga <br>24 Jam per hari</div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-1 text-dark" style="text-align: right; font-size: 0.7em;">Mulai Dari...</div>
                            <div class="text-dark"
                                style="text-align: right; font-weight: 600; line-height: 0.8em; font-size: 0.85em;">Rp.
                                {{$row->harga_per_hari}}</div>
                            <div class="text-dark" style="text-align: right; font-size: 0.7em;">/hari</div>
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="{{url()->current()}}/{{$row->no_plat}}"
                                    style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.7em; border-radius: 2em;">Detail</a>
                            </div>
                            <div style="width: 100%; display: flex;justify-content: flex-end;">
                                <img src="<?=url('/')?>/public/images/rental.svg">
                            </div>
                        </div>
                    </div>
                    <hr style="width: 100%; margin:0;">
                    <div class="font-weight-bold text-dark"
                        style="font-size: 1.0em; margin-top: 0.7em; text-align: right;">
                        {{$row->no_plat}}
                    </div>

                </div>
            </div>
            @endforeach
            @endif
            @endforeach
        </div>
    </div>
</section>

@endsection

@section('modal')

@endsection


@section('footer-scripts')

@endsection
