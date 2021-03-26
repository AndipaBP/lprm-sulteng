@extends('layout/dashboard/admin')


@section('title')
Ubah Berita
@endsection

@section('header-scripts')
<link rel="stylesheet" type="text/css"

    href="<?=url('/')?>/public/template/admin/assets/libs/summernote/dist/summernote-bs4.css">

<style>
.note-editor.note-frame .note-editing-area .note-editable {
    color: #fff;
    background-color: #212529 !important;
}
</style>
@endsection

@section('title-page')
Ubah Berita
@endsection

@section('breadcrumb-page')
<li class="breadcrumb-item"><a href="{{url('/superadmin')}}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{url('/superadmin/berita')}}">Berita</a></li>
<li class="breadcrumb-item active" aria-current="page">Ubah Berita</li>

@endsection

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">
                    <h4 class="card-title mb-0 text-white">Ubah Berita</h4>
                </div>
                <div class="card-body">
                    <form class="striped-rows" enctype="multipart/form-data" action="{{url()->current()}}/simpan"
                        method="post">
                        {{csrf_field()}}
                        @method('PUT')
                        <div class="">
                            <h4 class="card-title">Silahkan Ubah Berita</h4>
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="form-group">
                                        <img src="<?=url('/')?>/public/upload/berita/{{$berita->id}}/{{$berita->foto}}"
                                            alt="image_preview" id="image_preview" width="100%">
                                        <div class="custom-file mt-2">
                                            <input type="file" class="custom-file-input" id="file_upload"
                                                name="file_upload">
                                            <label class="custom-file-label form-control" for="file_upload">Pilih
                                                Gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="judul_berita">Judul Berita<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <input type="text" class="form-control" id="judul_berita" name="judul_berita"
                                            required placeholder="Judul Berita..." value="{{$berita->judul}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="deskripsi_berita">Deskripsi Berita<span
                                                class="badge badge-danger ml-2">Wajib</span></label>
                                        <textarea name="deskripsi_berita" id="deskripsi_berita" class="summernote"
                                            required>{!! $berita->deskripsi !!}</textarea>
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
<script src="<?=url('/')?>/public/template/admin/assets/libs/summernote/dist/summernote-bs4.min.js"></script>
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


    $('.summernote').summernote({
        height: 350, // set editor height
        minHeight: null, // set minimum height of editor
        maxHeight: null, // set maximum height of editor
        focus: false // set focus to editable area after initializing summernote
    });


</script>



@endsection
