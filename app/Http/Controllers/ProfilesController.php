<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Campaign;

class ProfilesController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Patungan Kuy');
    }

    public function index()
    {
        $id = Auth::id();
        $wishlist = Campaign::where([
            ['users_id', '=', ($id == null) ? 1 : $id],
            ['campaign_type', '=', 'wishlist']
        ])->get();
        $donations = Campaign::where([
            ['users_id', '=', ($id == null) ? 1 : $id],
            ['campaign_type', '=', 'donation']
        ])->get();
        $contributions = DB::table('contributions')->count(DB::raw('DISTINCT campaigns_id'));
        return view('profiles.index', compact('wishlist', 'donations', 'contributions'));
    }
}
