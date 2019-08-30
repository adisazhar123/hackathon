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
                    <h1>Wishlist Ulang Tahun
                    </h1>
                </div>
            </div>

            <div class="card mb-2">
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium adipisci aut autem corporis deleniti earum esse et ex facilis fugiat impedit laborum mollitia nam nesciunt porro, possimus recusandae. Beatae, quae.</p>

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


                    <button class="btn btn-warning btn-raised">Belikan Semua</button>
                </div>
            </div>

            <div class="row">
                @foreach([1,2,3] as $item)
                <div class="col-md-3">
                    <div class="card item mb-2">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/610JhsyZV1L._SX355_.jpg" alt="">
                        <span class="badge badge-secondary requester-name">Nama Requester</span>
                        <div class="card-header campaign-title">
                            <a href="#">
                                <h5>
                                    <strong>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </strong>
                                </h5>
                            </a>
                        </div>
                        <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias dolorem dolores eligendi esse expedita id illum minima, nulla numquam, porro, quaerat quas quasi qui quia quis similique veniam voluptas voluptatem!
                            </p>
                            <div class="progress">
                                <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info btn-raised donate">Belikan</button>
                        </div>
                    </div>
                </div>
                @endforeach

                    <div class="col-md-3">
                        <div class="card item mb-2">
                            <img src="https://images-na.ssl-images-amazon.com/images/I/610JhsyZV1L._SX355_.jpg" alt="">
                            <span class="badge badge-secondary requester-name">Nama Requester</span>
                            <div class="card-header campaign-title">
                                <a href="#">
                                    <h5>
                                        <strong>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        </strong>
                                    </h5>
                                </a>
                            </div>
                            <div class="card-body">
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias dolorem dolores eligendi esse expedita id illum minima, nulla numquam, porro, quaerat quas quasi qui quia quis similique veniam voluptas voluptatem!
                                </p>
                                <div class="progress">
                                    <div data-toggle="tooltip" data-placement="top" title="100%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success btn-raised donate">Produk Sudah Debelikan</button>
                            </div>
                        </div>
                    </div>

            </div>

        </div>
    </div>
@endsection

