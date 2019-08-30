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

        .prices:hover {
            cursor: pointer;
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
                        @foreach($donations as $donation)
                            <div class="col-md-4">
                                <div class="card donation mb-2 h-100">
                                    <img src="{{$donation->banner_path}}" alt="" height="250px">
                                    <span class="badge badge-secondary requester-name">{{$donation->user->name}}</span>
                                    <div class="card-header campaign-title">
                                        <a href="/donations/{{$donation->id}}">
                                            <h5>
                                                <strong>
                                                    {{\Illuminate\Support\Str::limit($donation->title, 50)}}
                                                </strong>
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            {{
                                            \Illuminate\Support\Str::limit($donation->description, 200)
                                            }}
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
                        @foreach($wishlists as $wishlist)
                            <div class="col-md-4">
                                <div class="card wishlist h-100 mb-2">
                                    <img src="{{$wishlist->banner_path}}" alt="" height="250px">
                                    <span class="badge badge-secondary requester-name">{{$wishlist->user->name}}</span>
                                    <div class="card-header campaign-title">
                                        <a href="/wishlists/{{$wishlist->id}}">
                                            <h5>
                                                <strong>
                                                    {{\Illuminate\Support\Str::limit($wishlist->title, 50)}}
                                                </strong>
                                            </h5>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            {{\Illuminate\Support\Str::limit($wishlist->description, 200)}}
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
                    <div class="prices">
                        <span class="badge badge-pill badge-info">Rp 10.000,00</span>
                        <span class="badge badge-pill badge-info">Rp 50.000,00</span>
                        <span class="badge badge-pill badge-info">Rp 100.000,00</span>
                        <span class="badge badge-pill badge-info other">Lain-lain</span>
                    </div>
                    <p>Anda akan memberi</p>
                    <input type="amount" class="form-control"> <br>
                    <button class="btn btn-success btn-raised">Berikan Donasi Sekarang</button>
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

        $(".prices .badge-pill").click(function () {
            $(this).css('')
        })
    </script>
@endsection

