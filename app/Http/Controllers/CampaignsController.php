<?php

namespace App\Http\Controllers;

use App\Campaign;
use App\Contribution;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;


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

        $contributors = Contribution::where('campaigns_id', $id)->get();


        $url = url()->current();
    
        return view('campaigns.donation', ['donation' => $donation, 'url' => $url, 'messages' => $contributors]);
    }

    public function showWishlist($id)
    {
        $wishlist = Campaign::where('id', $id)
            ->wishlist()
            ->items()
            ->first();
        
        $url = url()->current();

        $totalPrice = 0;
        foreach ($wishlist->items as $campaignItem)
        {
            $totalPrice += $campaignItem->item->price;
        }

        $contributors = Contribution::where('campaigns_id', $id)->get();

        foreach($contributors as $c)
        {
            $totalPrice -= $c->amount;
        }

        $messages = $contributors;

        return view('campaigns.wishlist', ['wishlist' => $wishlist, 'totalPrice' => $totalPrice, 'url' => $url, 'messages' => $messages]);
    }
}
