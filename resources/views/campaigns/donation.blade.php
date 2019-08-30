@extends('layouts.app')

@section('css')
    <style>
        .progress {
            height: 15px;
        }
    </style>
@endsection

@section('body')
    <div id="body">
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="{{$donation->banner_path}}" alt="">
                <div class="card-body">
                    <div class="donation-header mb-3">
                        <h4>
                            <strong>
                                {{$donation->title}}
                            </strong>
                        </h4>
                        <span>
                            <strong>
                                Rp 2443.453.225
                            </strong>
                            terkumpul dari Rp {{ number_format($donation->target_amount, 2, ',' , '.') }}
                        </span>
                        <a href="https://wa.me/?text=Temen-temen%20kita%20patungan%20yuk%20di%20sini%20{{$url}}" class="btn fa fa-share-alt" aria-hidden="true" ></a>
                    </div>

                    <div class="progress mb-3">
                        <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>

                    <div class="progress-info">
                        <div class="left" style="float: left">
                            <h6>
                                300 donasi
                            </h6>
                        </div>
                        <div class="right" style="float: right">
                            <h6>
                                50 hari lagi
                            </h6>
                        </div>
                    </div>
                    <br><br>
                    <div class="donate-now">
                        <button class="btn btn-success btn-raised">Donasi Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="card donation-description mt-2">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aut commodi dolorem eligendi eos esse id, ipsum nulla officia perspiciatis, quia quod repellat reprehenderit sapiente sint sit unde voluptate?</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad adipisci aut commodi dolorem eligendi eos esse id, ipsum nulla officia perspiciatis, quia quod repellat reprehenderit sapiente sint sit unde voluptate?</p>
                </div>
            </div>

            <div class="card donation-items mt-2 mb-2">
                <div class="card-body">
                    @foreach($donation->items as $item)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>
                                        <strong>
                                            {{$item->item->title}}
                                        </strong>
                                    </h5>
                                    <p>{{$item->description}}</p>
                                </div>
                                <div class="col-md-4">
                                    x {{$item->quantity}} @ Rp {{ number_format( $item->item->price, 2, ',' , '.')}}
                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

