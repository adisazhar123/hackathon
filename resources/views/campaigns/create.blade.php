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
                        Buat Donasi
                    </h1>
                </div>
            </div>
            <a class="btn btn-primary" href="https://wa.me/?text=Temen-temen%20kita%20patungan%20yuk%20" role="button">Link</a>

            <form>
            <div class="form-group">
                <label for="inputTitle" class="bmd-label-floating">Judul</label>
                <input class="form-control" id="inputTitle">
                <span class="bmd-help">Isi dengan judul kampanye donasimu</span>
            </div>
            <div class="form-group">
                <label for="inputDescription" class="bmd-label-floating">Deskripsi</label>
                <input class="form-control" id="inputDescription">
                <span class="bmd-help">Jelaska lebih lanjut mengenai kegiatan donasimu seperti tujuan, target, lokasi kegiatan, dan sebagainya</span>
            </div>
            <div class="form-group">
                <label for="inputDeadline" class="bmd-label-floating">Batas waktu</label>
                <input class="form-control" id="inputDeadline" onfocus="(this.type='date')" onfocusout="(this.type='text')">
                <span class="bmd-help">Isi dengan batas terakhir waktu penerimaan donasi</span>
            </div>
            <div class="form-group">
                <label for="inputBannerImage" class="bmd-label-floating">Gambar</label>
                <input class="form-control" id="inputBannerImage">
                <span class="bmd-help">isi dengan url gambar yang sesuai dengan jenis kegiatan donasimu</span>
            </div>

            <div class="form-group">
                <label for="totalAmount" class="bmd-label-floating">Password</label>
                <input type="number" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="exampleSelect1" class="bmd-label-floating">Example select</label>
                <select class="form-control" id="exampleSelect1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleSelect2" class="bmd-label-floating">Example multiple select</label>
                <select multiple class="form-control" id="exampleSelect2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleTextarea" class="bmd-label-floating">Example textarea</label>
                <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile" class="bmd-label-floating">File input</label>
                <input type="file" class="form-control-file" id="exampleInputFile">
                <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
                </label>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can be something else and selecting it will deselect option one
                </label>
            </div>
            <div class="radio disabled">
                <label>
                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                Option three is disabled
                </label>
            </div>
            <div class="checkbox">
                <label>
                <input type="checkbox"> Check me out
                </label>
            </div>
            <button class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-primary btn-raised">Submit</button>
            </form>
        </div>
    </div>
            
@endsection

