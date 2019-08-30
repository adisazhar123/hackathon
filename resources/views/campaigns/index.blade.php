@extends('layouts.app')

@section('css')
    <style>
        .requester-name {
            font-size: 14px;
        }
        .campaign-labels {
            margin-bottom: 20px;
        }

        .campaigns .progress {
            height: 10px;
        }

        .donations .btn.donate {
            width: 100%;
        }
        
        .campaigns .progress:hover {
            cursor: pointer;
        }

        .campaign-title a {
            text-decoration: none;
            /*color: #000000 !important;*/
        }
    </style>
@endsection

@section('body')
    <div id="body">
        <div class="campaigns">
            <div class="container">
                <div class="donations-title">
                    <h1>Donasi Terkini</h1>
                </div>
                <div class="donations">
                    <div class="row">
                        @foreach([1, 2, 3, 4, 5] as $donation)
                            <div class="col-md-4">
                                <div class="card donation mb-2">
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
                                        <div class="campaign-labels">
                                            <span class="badge badge-pill badge-warning">Bantuan Sosial</span>
                                            <span class="badge badge-pill badge-primary">Category X</span><br>
                                        </div>
                                        <div class="progress">
                                            <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-info btn-raised donate">Bantu Sekarang</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="container">
                <div class="wishlist-title">
                    <h1>Wishlist Terkini</h1>
                </div>
                <div class="wishlists">
                    <div class="row">
                        @foreach([1, 2, 3, 4, 5] as $wishlist)
                            <div class="col-md-4">
                                <div class="card wishlist mb-2">
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
                                        <div class="campaign-labels">
                                            <span class="badge badge-pill badge-success">Wishlist</span>
                                            <span class="badge badge-pill badge-primary">Category X</span><br>
                                        </div>
                                        <div class="progress">
                                            <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-info btn-raised donate">Lihat Lebih Lanjut</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal donation modal-donate fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores commodi, consequatur ducimus error est ex fugiat harum illum minus optio, qui repellat voluptas! Culpa ea fuga maxime recusandae rerum?</p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequatur cumque cupiditate distinctio eius, enim illo incidunt iure minima nam numquam officiis similique tempore tenetur ullam velit veniam voluptate voluptatem!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal wishlist modal-donate fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Wishlist Ku</h4>
                   <ul>
                       <li>lorem</li>
                       <li>lorem</li>
                       <li>lorem</li>
                       <li>lorem</li>
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".donation .btn.donate").click(function () {
           $(".donation.modal-donate").modal('show');
        });

        $(".wishlist .btn.donate").click(function () {
            $(".wishlist.modal-donate").modal('show');
        });
    </script>
@endsection

