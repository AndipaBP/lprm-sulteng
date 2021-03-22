@extends('layout/home/home')

@section('title')
LPRM SULTENG
@endsection


@section('header-scripts')

@endsection

@section('content')
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg" style="background: #101A19; padding-top: 25px;">
    <div class="container text-white">
        <div class="section-title">
            <h2>Daftar Rental</h2>
        </div>
        <div class="row">
            @foreach($rental as $row)
            <div class="col-4">
                <div class=""
                    style="padding: 1.2em 1.2em 1.2em 1.2em;background: white; border-radius: 12px; color:black;">
                    <div style="display: flex; align-items: center;">
                        <div style="width: 20%;">
                            <img src="<?=url('/')?>/public/images/rental.svg" style="width: 100%;">
                        </div>
                        <div style="width: 80%; padding-left: 0.5em;">
                            <div style="font-weight: 600; font-size: 1.2em;">{{$row->nama}}</div>
                            <div style="font-size: 0.8em; line-height: 0.9em;">Tersedia : {{$row->mobil->count()}} Mobil</div>
                            <div style="padding: 0; margin: 0; font-size: 0.7em; line-height: 1.5em; margin-top: 0.5em;margin-bottom: 0.5em;">
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="fas fa-star star-rating"></i>
                                <i class="far fa-star star-rating"></i>
                            </div>
                            <a href="{{url()->current()}}/{{strtolower($row->id)}}" class="" style="background:#FF435E; color: white; padding: 0.3em 2em; font-size: 0.9em; border-radius: 2em;">Selengkapnya</a>
                        </div>
                    </div>
                    <hr>
                    <div style="font-weight: 600; font-size: 1.0em;">Alamat Rental Mobil</div>
                    <div style="font-weight: 600; font-size: 0.8em;">
                        {{$row->kelurahan->kelurahan}},
                        {{ucwords($row->kelurahan->kecamatan->nama)}}, KOTA PALU</div>
                    <div style="color: #828282; font-size: 0.85em;">{{$row->alamat}}</div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $rental->links() !!}
        </div>
    </div>
</section>

@endsection

@section('modal')

@endsection


@section('footer-scripts')

@endsection
