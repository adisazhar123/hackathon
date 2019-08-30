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
                    <h1>Wishlist: {{$wishlist->title}}
                    </h1>
                </div>
            </div>

            <div class="card mb-2">

                @if($wishlist->fulfillment_percentage == 100.00)
                <div class="alert alert-success">
                    <p>Wishlist ini sudah terpenuhi!</p>
                </div>
                @endif

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
                    @if(! $wishlist->fulfillment_percentage == 100.00)
                        <button class="btn btn-warning btn-raised buy-all">Belikan Semua</button>
                    @endif
                </div>
            </div>

            <div class="row">
                @foreach($wishlist->items as $campaignItem)

                @if($campaignItem->percentage < 100.00)
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
                                Rp {{ number_format( $campaignItem->contributors->sum('amount'), 2, ',', '.') }} terkumpul dari Rp {{ number_format( $campaignItem->item->price, 2, ',', '.')}}
                            </p>
                            <div class="progress">
                                <div data-toggle="tooltip" data-placement="top" title="{{$campaignItem->percentage . "%"}}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $campaignItem->percentage  }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $campaignItem->percentage . "%" }}"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info btn-raised donate-item" item-id="{{$campaignItem->item->id}}">Belikan</button>
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
                                    <p>
                                        Rp {{ number_format( $campaignItem->contributors->sum('amount'), 2, ',', '.') }} terkumpul dari Rp {{ number_format( $campaignItem->item->price, 2, ',', '.')}}
                                    </p>
                                    <div class="progress">
                                        <div data-toggle="tooltip" data-placement="top" title="100%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$campaignItem->percentage}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$campaignItem->percentage . "%"}}"></div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-success btn-raised">Produk Sudah Debelikan</button>
                                </div>
                            </div>
                        </div>
                @endif
                @endforeach

            </div>

        </div>
    </div>

    <div class="modal buy fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Kamu akan membelikan {{$wishlist->user->name}} seluruh item di wishlist. Dengan total harga
                        <strong>Rp {{ number_format($totalPrice, 2, ',', '.')}}</strong>.
                    </p>
                    <hr>
                    <form action="/campaigns/buy/all" method="post">
                        <p>Pesan Khusus:</p>
                        <textarea class="form-control" name="message" id="" cols="30" rows="10">
                            Ini buat teman-ku yang paling spesial! Enjoy ya {{$wishlist->user->name}}
                        </textarea>
                        <input type="hidden" name="campaign_id" value="{{$wishlist->id}}">
                        <br>
                        <button type="submit" class="btn btn-primary btn-raised">Belikan untuk {{$wishlist->user->name}}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal buy-item fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="/campaigns/buy/single" method="POST">
                        <input type="hidden" name="campaign_id" value="{{$wishlist->id}}">
                        <input type="hidden" name="item_id" value="">
                        <p>
                            Berapa yang akan kamu patung untuk {{$wishlist->user->name}}?
                        </p>
                        <input class="form-control" type="number" name="amount" id="" min="1" max="">
                        <hr>
                        <p>Pesan Khusus:</p>
                        <textarea name="message" id="" cols="30" rows="10" class="form-control">
                            Ini buat teman-ku yang paling spesial! Enjoy ya {{$wishlist->user->name}}
                        </textarea><br>
                        <button class="btn btn-primary btn-raised">Belikan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(".buy-all").click(function () {
           $(".modal.buy").modal('show')
        });

        $('.donate-item').click(function () {
            const itemId = $(this).attr('item-id');
            $("input[name=item_id]").val(itemId);

           $('.modal.buy-item').modal('show');
        });

        @if(Session::has('success'))
            swal("Hebat!", '{{\Session::has('success')}}', "success");
        @endif

    </script>
@endsection

