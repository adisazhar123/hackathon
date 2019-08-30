@extends('layouts.app')

@section('css')
    <style>
        .progress {
            height: 15px;
        }


        @import url(https://fonts.googleapis.com/css?family=Nobile:400italic,700italic);
        @import url(https://fonts.googleapis.com/css?family=Dancing+Script);
        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
        }
        body {
            background: #E5E5E5;
            background-image: url("/gray-floral.png");
            /*padding: 50px;*/
        }

        #card-front {
            color: #FFDFDF;
        }

        #card, #card-front, #card-inside {
            height: 480px;
        }

        .wrap {
            padding: 1.5em 2.5em;
            height: 100%;
        }
        #card-front, #card-inside {
            width: 50%;
            -webkit-box-shadow: 2px 2px 30px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .5);
            -moz-box-shadow: 2px 2px 30px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .5);
            box-shadow: 2px 2px 30px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .5);
            position: absolute;
            left: 50%;
        }


        #card-inside .wrap {
            background: #FFEFEF;
            -webkit-box-shadow: inset 2px 0 1px rgba(0, 0, 0, .05);
            -moz-box-shadow: inset 2px 0 1px rgba(0, 0, 0, .05);
            box-shadow: inset 2px 0 1px rgba(0, 0, 0, .05);
        }
        #card {
            width: 100%;
            margin: 0 auto;
            transform-style: preserve-3d;
            -moz-transform-style: preserve-3d;
            -webkit-transform-style: preserve-3d;
            perspective: 5000px;
            -moz-perspective: 5000px;
            -webkit-perspective: 5000px;
            position: relative;
        }

        #card h1 {
            text-align: center;
            font-family: 'Nobile', sans-serif;
            font-style: italic;
            font-size: 70px;
            text-shadow:
                4px 4px 0px rgba(0, 0, 0, .15),
                1px 1px 0 rgba(255, 200, 200, 255),
                2px 2px 0 rgba(255, 150, 150, 255),
                3px 3px 0 rgba(255, 125, 125, 255);
            color: #FFF;
        }
        #card-inside {
            font-size: 1.1em;
            line-height: 1.4;
            font-family: 'Nobile';
            color: #331717;
            font-style: italic;
        }

        p {
            margin-top: 1em;
        }

        p:first-child {
            margin-top: 0;
        }

        p.signed {
            margin-top: 1.5em;
            text-align: center;
            font-family: 'Dancing Script', sans-serif;
            font-size: 1.5em;
        }

        #card-front {
            background-color: #FF5555;
            background-image: linear-gradient(top, #FF5555 0%, #FF7777 100%);
            background-image: -moz-linear-gradient(top, #FF5555 0%, #FF7777 100%);
            background-image: -webkit-linear-gradient(top, #FF5555 0%, #FF7777 100%);
            transform-origin: left;
            -moz-transform-origin: left;
            -webkit-transform-origin: left;
            transition:         transform 1s linear;
            -moz-transition:    -moz-transform 1s linear;
            -webkit-transition: -webkit-transform 1s linear;
            position: relative;
        }

        #card-front .wrap {
            transition: background 1s linear;
            -moz-transition: background 1s linear;
            -webkit-transition: background 1s linear;
        }

        #card-front button {
            position: absolute;
            bottom: 1em;
            right: -12px;
            background: #F44;
            color: #FFF;
            font-family: 'Nobile', sans-serif;
            font-style: italic;
            font-weight: bold;
            font-size: 1.5em;
            padding: .5em;
            border: none;
            cursor: pointer;
            box-shadow: 2px 2px 3px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .4);
            -moz-box-shadow: 2px 2px 3px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .4);
            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, .25), 0 0 1px rgba(0, 0, 0, .4);
        }

        #card-front button:hover,
        #card-front button:focus {
            background: #F22;
        }

        #close {
            display: none;
        }

        #card.open-fully #close,
        #card-open-half #close {
            display: inline;
        }

        #card.open-fully #open {
            display: none;
        }


        #card.open-half #card-front,
        #card.close-half #card-front {
            transform: rotateY(-90deg);
            -moz-transform: rotateY(-90deg);
            -webkit-transform: rotateY(-90deg);
        }
        #card.open-half #card-front .wrap {
            background-color: rgba(0, 0, 0, .5);
        }

        #card.open-fully #card-front,
        #card.close-half #card-front {
            background: #FFEFEF;
        }

        #card.open-fully #card-front {
            transform: rotateY(-180deg);
            -moz-transform: rotateY(-180deg);
            -webkit-transform: rotateY(-180deg);
        }

        #card.open-fully #card-front .wrap {
            background-color: rgba(0, 0, 0, 0);
        }

        #card.open-fully #card-front .wrap *,
        #card.close-half #card-front .wrap * {
            display: none;
        }

        footer {
            max-width: 500px;
            margin: 40px auto;
            font-family: 'Nobile', sans-serif;
            font-size: 14px;
            line-height: 1.6;
            color: #888;
            text-align: center;
        }
    </style>
@endsection

@section('body')
    <div id="body">
        <div class="container">
            <div class="card">
                <img class="card-img-top" src="{{$donation->banner_path}}" alt="">

                @if($donation->fulfillment_percentage == 100.00)
                    <div class="alert alert-success">
                        <p>Donasi ini sudah tutup!</p>
                    </div>
                @endif

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
                        <a href="https://wa.me/?text=Temen-temen%20kita%20patungan%20yuk%20di%20sini%20{{$url}}" class="btn fa fa-share-alt" aria-hidden="true" ></a>
                    </div>

                    <div class="progress mb-3">
                        <div data-toggle="tooltip" data-placement="top" title="{{$donation->fulfillment_percentage . "%"}}" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{$donation->fulfillment_percentage }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$donation->fulfillment_percentage . "%"}}"></div>

                    </div>

                    <div class="progress-info">
                        <div class="left" style="float: left">
                            <h6>
                                Jumlah donatur: <strong>{{$donation->contributors->count()}}</strong>
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
                        @if($donation->fulfillment_percentage < 100.00)
                            <button class="btn btn-success btn-raised donate" target-amount="{{$donation->target_amount}}" campaign-id="{{$donation->id}}">Donasi Sekarang</button>
                        @endif
                        @if(Auth::check() && Auth::user()->id == $donation->users_id)
                            <button class="btn btn-info btn-raised read-special-messages">Baca Pesan dari Kontributor</button>
                        @endif
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

    <div class="modal message fade">
        <div class="modal-dialog modal-lg" style="width: 800px;">
            <div class="modal-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="box-shadow: 0 0 0 0">
                            <div class="card-body">
                                @foreach($messages as $c)
                                    <button class="btn btn-default btn-raised read-message" c-id="{{$c->id}}">Baca pesan dari: {{$c->user->name}}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div id="card">
                            <div id="card-inside">
                                <div class="wrap">
                                    <p class="special-message"></p>
                                    <p class="signed">
                                    </p>
                                </div>
                            </div>

                            <div id="card-front">
                                <div class="wrap">
                                    <h3>Pesan Khusus untuk {{$donation->user->name}}</h3>
                                    <img src="" alt="" class="message-image" width="90%">
                                </div>
                                <button id="open">&gt;</button>
                                <button id="close">&lt;</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
    <script>

        function rnd(min,max){
            return Math.floor(Math.random()*(max-min+1)+min );
        }

        $(".read-message").click(function () {
            const c_id = $(this).attr('c-id');

            $.ajax({
                url: '/contributors/' + c_id + '/message',
                success: function (data) {
                    $(".special-message").text(data.message);
                    $(".signed").text(data.user.name);
                    $("#open").trigger('click');
                },
                error: function (data) {
                    alert("error")
                    console.log(data);
                }
            });

        });

        $(".read-special-messages").click(function () {

            $.ajax({
                url: 'https://api.giphy.com/v1/gifs/search?q=cute&api_key=F8gG4FUmUNNMXoEvJ0FYHBZFBPM6Me6L',
                success: function (data) {
                    const idx = rnd(0, data.data.length);

                    const gifUrl = data.data[idx].images.fixed_height_still.url;
                    $(".message-image").attr('src', gifUrl);
                    $(".modal.message").modal('show');
                }
            });
        });



        var card = document.getElementById('card'),
            openB = document.getElementById('open'),
            closeB = document.getElementById('close'),
            timer = null;

        openB.addEventListener('click', function () {
            card.setAttribute('class', 'open-half');
            if (timer) clearTimeout(timer);
            timer = setTimeout(function () {
                card.setAttribute('class', 'open-fully');
                timer = null;
            }, 1000);
        });

        closeB.addEventListener('click', function () {
            card.setAttribute('class', 'close-half');
            if (timer) clearTimerout(timer);
            timer = setTimeout(function () {
                card.setAttribute('class', '');
                timer = null;
            }, 1000);
        });


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
                $(".price-input").prop("min", 1);
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
                if (amount == "" || parseInt(amount) <= 0) {
                    alert("Mohon untuk mengisi jumlah donasi!");
                    return false;
                }
                donation.amount = amount;
            }

            donation.message = $(".donation-message").val();
            console.log(donation);

            $.ajax({
                url: `/contribution`,
                method: 'POST',
                data: donation,
                success: function(data) {
                    console.log(data);

                    other = 0;
                    donation.amount = '';
                    donation.message = '';
                    donation.campaign_id = '';

                    $(".donation.modal-donate").modal('hide');

                    swal("Hebat!", 'Terima kasih sudah melakukan donasi', "success");

                    setTimeout(function () {
                        location.reload();
                    }, 1500);

                },
                error: function (data) {
                    console.log(data);
                    alert("error")
                }
            });
        });

    </script>
@endsection
