<?php

namespace App\Http\Controllers;

use App\Campaign;
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
        $donations = Campaign::active()
            ->donation()
            ->get();
        $wishlists = Campaign::active()
            ->wishlist()
            ->get();

        return view('campaigns.index', ['donations' => $donations, 'wishlists' => $wishlists]);
    }

    public function showDonation($id)
    {
        $donation = Campaign::where('id', $id)
            ->donation()
            ->items()
            ->first();

        return view('campaigns.donation', ['donation' => $donation]);
    }

    public function showWishlist($id)
    {
        $wishlist = Campaign::where('id', $id)
            ->wishlist()
            ->items()
            ->first();

        return view('campaigns.wishlist', ['wishlist' => $wishlist]);
    }
}
