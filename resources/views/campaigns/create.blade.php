@extends('layouts.app')

@section('css')
    <style>
        .progress {
            height: 15px;
        }
        .card-footer .btn {
            width: 100%;
        }
    </style>
@endsection


@section('body')
    <div id="body">
        <div class="container">
            <div class="create-campaign-header">
                <div class="title">
                    <h1>
                        <i class="fa fa-bullhorn" aria-hidden="true"></i> Buat {{ ucfirst($type) }}
                    </h1>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method= "post" action= "/create_campaign" accept-charset="UTF-8">
                        <div class="form-group">
                            <label for="inputTitle" class="bmd-label-floating">Judul</label>
                            <input name="title" class="form-control" id="inputTitle">
                            <span class="bmd-help">Isi dengan judul kampanye donasimu</span>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription" class="bmd-label-floating">Deskripsi</label>
                            <textarea name="description" class="form-control" id="inputDescription" rows="3"></textarea>
                            <span class="bmd-help">Jelaska lebih lanjut mengenai kegiatan donasimu seperti tujuan, target, lokasi kegiatan, dan sebagainya</span>
                        </div>
                        <div class="form-group">
                            <label for="inputDeadline" class="bmd-label-floating">Batas waktu</label>
                            <input name="deadline" class="form-control" id="inputDeadline" onfocus="(this.type='date')" onfocusout="(this.type='text')">
                            <span class="bmd-help">Isi dengan batas terakhir waktu penerimaan donasi</span>
                        </div>
                        <div class="form-group">
                            <label for="inputBannerImage" class="bmd-label-floating">Gambar URL</label>
                            <input name="banner_path" class="form-control" id="inputBannerImage">
                            <span class="bmd-help">isi dengan url gambar yang sesuai dengan jenis kegiatan donasimu</span>
                        </div>
                        <input type="hidden" id="typeCampaign" name="campaign_type" value="{{$type}}">
                        <input type="hidden" id="status" name="status" value="active">
                        <input type="hidden" id="users_id" name="custId" value="{{Auth::user()->id}}">

                        <button class="btn btn-danger btn-raised">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-raised" style="float: right;">Next</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
            
@endsection
