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
                    <h1>Wishlist {{$wishlist->title}}
                    </h1>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <p>{{$wishlist->description}}</p>

                    <div class="progress-info">
                        <div class="left" style="float: left">
                            <h6>
                                {{$wishlist->contributors->count()}} donasi
                            </h6>
                        </div>
                        <div class="right" style="float: right">
                            <h6>
                                50 hari lagi
                            </h6>
                        </div>
                    </div>
                    <br><br>

                    <button class="btn btn-warning btn-raised">Belikan Semua</button>
                    <a href="https://wa.me/?text=Temen-temen%20kita%20patungan%20yuk%20di%20sini%20{{$url}}" class="btn fa fa-share-alt" aria-hidden="true" ></a>

                </div>
            </div>

            <div class="row">
                @foreach($wishlist->items as $campaignItem)

                @if($campaignItem->percentage != 100.00)
                <div class="col-md-3">
                    <div class="card item h-100 mb-2">
                        <img src="{{$campaignItem->item->image_path}}" alt="" height="200px">
                        <div class="card-header campaign-title">
                            <a href="{{$campaignItem->item->item_url}}" target="_blank">
                            <h5>
                                    <strong>
                                        {{$campaignItem->item->title}}
                                    </strong>
                                </h5>
                            </a>
                        </div>
                        <div class="card-body">
                            <p>
                                {{$campaignItem->description}}
                            </p>
                            <p>
                                Rp {{$campaignItem->contributors->sum('amount')}} terkumpul dari Rp 3.405.463,00
                            </p>
                            <div class="progress">
                                <div data-toggle="tooltip" data-placement="top" title="{{ ( $campaignItem->contributors->sum('amount') / $campaignItem->item->price ) * 100}}%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ ( $campaignItem->contributors->sum('amount') / $campaignItem->item->price ) * 100}}" aria-valuemin="0" aria-valuemax="100" style="width:{{ ( $campaignItem->contributors->sum('amount') / $campaignItem->item->price ) * 100}}%"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info btn-raised donate">Belikan</button>
                        </div>
                    </div>
                </div>
                @else
                        <div class="col-md-3">
                            <div class="card item mb-2">
                                <img src="{{$campaignItem->item->image_path}}" alt="" height="200px">
                                <div class="card-header campaign-title">
                                    <a href="{{$campaignItem->item->item_url}}" target="_blank">
                                        <h5>
                                            <strong>
                                                {{$campaignItem->item->title}}
                                            </strong>
                                        </h5>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <p>
                                        {{$campaignItem->description}}
                                    </p>
                                    <div class="progress">
                                        <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success btn-raised donate">Produk Sudah Debelikan</button>

                                </div>
                            </div>
                        </div>
                @endif
                @endforeach

            </div>

        </div>
    </div>
@endsection

