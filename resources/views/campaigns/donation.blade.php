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
                                Rp {{ number_format($donation->contributors->sum('amount'), 2, ',', '.') }}
                            </strong>
                            terkumpul dari Rp {{ number_format($donation->target_amount, 2, ',' , '.') }}
                        </span>
                        <button class="btn"><i class="fa fa-share-alt" aria-hidden="true"></i></button>
                    </div>

                    <div class="progress mb-3">
                        <div data-toggle="tooltip" data-placement="top" title="75%" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                    </div>

                    <div class="progress-info">
                        <div class="left" style="float: left">
                            <h6>
                                {{$donation->contributors->count()}}
                            </h6>
                        </div>
                        <div class="right" style="float: right">
                            <h6>
                                50 hari lagi
                            </h6>
                        </div>
                    </div>
                    <br><br>
                    <div class="donate-now-btn">
                        <button class="btn btn-success btn-raised donate" target-amount="{{$donation->target_amount}}" campaign-id="{{$donation->id}}">Donasi Sekarang</button>
                    </div>
                </div>
            </div>

            <div class="card donation-description mt-2">
                <div class="card-header">
                    <h5>
                        <strong>Deskripsi</strong>
                    </h5>

                </div>
                <div class="card-body">
                    <p>
                        {{$donation->description}}
                    </p>
                </div>
            </div>

            <div class="card donation-items mt-2 mb-2">
                <div class="card-header">
                    <h5> <strong>Produk yang Dibutuhkan</strong> </h5>
                </div>
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
@endsection


@section('script')
    <script>

        let donation = {
            amount: '', campaign_id: '', message: ''
        };

        let target_amount = 0;

        let other = 0;


        $(".btn.donate").click(function () {
            const campaign_id = $(this).attr('campaign-id');
            donation.campaign_id = campaign_id;
            console.log(campaign_id);

            target_amount = $(this).attr('target-amount');

            $(".donation.modal-donate").modal('show');
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
