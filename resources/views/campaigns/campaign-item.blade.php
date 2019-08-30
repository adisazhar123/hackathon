@extends('layouts.app')

@section('css')
    <style>
        .card-footer .btn {
            width: 100%;
        }

        .item {
            box-shadow: 0 0 0 0 !important;
        }
    </style>
@endsection

@section('body')
    <div id="body">
        <div class="container">
            <div class="wishlist-header">
                <div class="title">
                    <h1>
                        <i class="fa fa-cart-plus" aria-hidden="true"></i> Pilih Produk
                    </h1>
                </div>
                <p>
                    {{$label}}
                </p>
            </div>

            <div class="card">
                <div class="card-body">
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

                                        <button class="btn btn-primary btn-raised add-item" item-id="{{$item->id}}" campaign-id="{{session()->get('campaign')->id}}" >
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                <form action="/campaign/finish" method="post">
                    <button class="btn btn-success btn-raised">Selesai</button>
                    <br>
                    <small class="text-muted">Klik Selesai jika produk {{$type}} mu sudah komplit.</small>
                </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(".add-item").click(function () {
           const item_id = $(this).attr('item-id');
           const campaign_id = $(this).attr('campaign-id');

           $.ajax({
                url: `/campaign/${campaign_id}/item/${item_id}`,
                method: 'post',
               success:function (data) {
                    $(`.add-item[item-id=${item_id}]`).html(`<i class="fa fa-heart" aria-hidden="true"></i>`);
                   alertify.success('Item successfully added');
                   console.log(data)
               },
               error: function (data) {
                   console.log(data)
               }
           });

        });
    </script>
@endsection
