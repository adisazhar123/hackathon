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
                <img class="card-img-top" src="https://media4.s-nbcnews.com/j/newscms/2018_49/2669406/181204-japan-tsunami-earthquake-cs-920a_075a953d76eb5447a6bf4fd422e45244.fit-760w.jpg" alt="">
                <div class="card-body">
                    <div class="donation-header mb-3">
                        <h4>
                            <strong>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut dolorum fugit ipsum iusto maxime, mollitia.
                            </strong>
                        </h4>
                        <span>
                            <strong>
                                Rp 2443.453.225
                            </strong>
                            terkumpul dari Rp 300.000.000
                        </span>
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
                    @foreach([1,2,3] as $item)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>
                                        <strong>
                                            Indomie Mie Goreng
                                        </strong>
                                    </h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab consequuntur hic impedit ipsam ipsum magni necessitatibus nulla placeat porro quis quod saepe vel, voluptas. Eligendi et minima molestiae nemo ratione?</p>
                                </div>
                                <div class="col-md-4">
                                    x 5 @ Rp 500 000
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
