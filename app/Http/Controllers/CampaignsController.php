<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CampaignsController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Patungan Kuy');
    }

    public function index()
    {
        return view('campaigns.index');
    }

    public function showDonation()
    {
        return view('campaigns.donation');
    }

    public function showWishlist()
    {
        return view('campaigns.wishlist');
    }
}
