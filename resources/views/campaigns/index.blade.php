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
                                        <button class="btn btn-info btn-raised donate" target-amount="{{$donation->target_amount}}" campaign-id="{{$donation->id}}">Bantu Sekarang</button>
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
                                        <button class="btn btn-info btn-raised donate" campaign-id="{{$wishlist->id}}">Lihat Lebih Lanjut</button>
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
                        <span class="badge badge-pill badge-info" val="10000">Rp 10.000,00</span>
                        <span class="badge badge-pill badge-info" val="50000">Rp 50.000,00</span>
                        <span class="badge badge-pill badge-info" val="100000">Rp 100.000,00</span>
                        <span class="badge badge-pill badge-info other">Lain-lain</span>
                    </div>
                    <br>
                    <input placeholder="Jumlah yang ingin didonasi" class="price-input" type="number" class="form-control" style="display: none;"> <br>
                    <br>
                    <h5 class="price-label"> <strong>Anda akan mendonasi: Rp 0</strong>  </h5>
                    <p>Pesan Khusus:</p>
                    <textarea class="donation-message" name="message" id="" cols="30" rows="10" class="form-control">Opsional</textarea> <br><br>
                    <button class="btn btn-success btn-raised donate-now">Berikan Donasi Sekarang</button>
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

        let donation = {
          amount: '', campaign_id: '', message: ''
        };

        let target_amount = 0;

        let other = 0;


        $(".donation .btn.donate").click(function () {
            const campaign_id = $(this).attr('campaign-id');
            donation.campaign_id = campaign_id;
            console.log(campaign_id);

            target_amount = $(this).attr('target-amount');

           $(".donation.modal-donate").modal('show');
        });

        $(".wishlist .btn.donate").click(function () {
            const campaign_id = $(this).attr('campaign-id');
            console.log(campaign_id);
            donation.campaign_id = campaign_id;
            $(".wishlist.modal-donate").modal('show');
        });

        $(".prices .badge-pill").click(function () {
            const price = $(this).text();
            if (price == "Lain-lain") {
                $(".price-input").show();
                $(".price-input").prop("max", target_amount);
                $(".price-input").attr("class", "form-control price-input");
                other = 1;
            } else {
                const priceVal = $(this).attr('val');
                console.log(priceVal);
                donation.amount = priceVal;
                $(".price-label").html(`<h5 class="price-label"> <strong>Anda akan mendonasi: ${price}</strong>  </h5>`);
            }
        });

        $(".price-input").keyup(function () {
           const amount = $(this).val();
            $(".price-label").html(`<h5 class="price-label"> <strong>Anda akan mendonasi: Rp ${amount}</strong>  </h5>`);
        });



        $(".donate-now").click(function () {
            if ( (donation.amount == "" && !other) || donation.campaign_id == "") {
                alert("Mohon untuk mengisi jumlah donasi!");
                return false;
            }

            if (other) {
                const amount = $(".price-input").val();
                if (amount == "") {
                    alert("Mohon untuk mengisi jumlah donasi!");
                    return false;
                }
                donation.amount = amount;
            }

            donation.message = $(".donation-message").val();
            console.log(donation);

            $.ajax({
               url: `/payment/contribution`,
               method: 'POST',
               data: donation,
                success: function(data) {
                   console.log(data);

                   other = 0;
                   donation.amount = '';
                   donation.message = '';
                   donation.campaign_id = '';

                },
                error: function (data) {
                    console.log(data);
                    alert("error")
                }
            });
        });
    </script>
@endsection

