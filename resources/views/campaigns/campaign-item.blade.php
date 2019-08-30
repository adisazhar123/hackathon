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
            <div class="wishlist-header">
                <div class="title">
                    <h1>Pilih produk 
                    </h1>
                </div>
                <p>
                    Pilih produk mitra yang dibutuhkan untuk kampanye donasimu
                </p>
            </div>

            <div class="row">
                @foreach($items as $item)
                <div class="col-md-3">
                    <div class="card item h-100 mb-2">
                        <img src="{{$item->image_path}}" alt="" height="200px">
                        <div class="card-header campaign-title">
                            <a href="{{$item->item_url}}" target="_blank">
                            <h5>
                                <strong>
                                    {{$item->title}}
                                </strong>
                            </h5>
                            </a>
                            <form action="">
                                <input type="number" value=1>
                                <button type="submit" class="btn">+
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
