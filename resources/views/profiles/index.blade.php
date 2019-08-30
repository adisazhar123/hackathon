@extends('layouts.app')

@section('css')
    <style>
        .profile-img img{
            width: 300px;
        }
        .profile-left {
            /*background-color: #adb5bd;*/
            text-align: center;

        }

        .profile-points {
            color: #ffe924;
            font-size: 32px;
        }

        .wish-icon, .donation-icon {
            font-size: 32px;
        }

        .wishlist-row, .donation-row {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .wishlists {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('body')
    <div id="body">
        <div class="container">
            <div class="profile-title">
                <h1>Kontribusi Ku</h1>
            </div>
            <div class="profile">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                             <div class="profile-left">
                                    <div class="profile-img">
                                        <img src="https://cdn.dribbble.com/users/504585/screenshots/2006389/terrible_designer_avatar-01.jpg" alt="">
                                    </div>

                                    <div class="profile-points">
                                        <i class="fa fa-star" aria-hidden="true"></i> {{$contributions}}
                                    </div>
                                    <div class="profile-info">
                                        <p><strong>Nama:</strong> Nama Orang</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <div class="profile-right">
                                    <div class="wishlists">
                                    <h4>
                                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                            Wishlist Ku
                                    </h4>
                                            <table style="height: 100px;">
                                                <tbody>
                                                @foreach($wishlist as $wish)
                                                    <tr class="wishlist-row mr-2">
                                                        <td class="align-middle"><i style="margin-right: 20px" class="fa fa-gratipay wish-icon" aria-hidden="true"></i></td>
                                                        <td>
                                                            <a href="#">{{$wish->title}}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                    </div>

                                    <div class="donations">
                                        <h4>
                                            <i class="fa fa-handshake-o" aria-hidden="true"></i>
                                            Bantuan Sosial
                                        </h4>
                                        <table style="height: 100px;">
                                            <tbody>
                                            @foreach($donations as $donation)
                                                <tr class="donation-row mr-2">
                                                    <td class="align-middle"><i style="margin-right: 20px" class="fa fa-medkit donation-icon" aria-hidden="true"></i></td>
                                                    <td>
                                                        <a href="#">{{$donation->title}}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
