<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Campaign;
use App\CampaignItem;

use Auth;

class CampaignController extends BaseController
{
    public function __construct()
    {
        view()->share('title', 'Buat Donasi');
    }

    public function index($type)
    {;
        return view('campaigns.create', ['type' => $type]);
    }

    public function create(Request $request){

//        TODO: Change user_id
        $user_id =  1;
        $campaign_type = $request->input('campaign_type');
        if (empty($request->input('campaign_type'))) {
            if ($request->input('campaign_type') == 'wishlist') {
                $deadline = date('Y-m-d h:i:s', time());
            } else {
                return 'deadine';
                return Redirect::back()->withErrors(['msg', 'Deadline required']);
            }
        } else $deadline = $request->input('deadline'); 
        $shortlink = $request->input('shortlink');

        $target_amount = $request->input('target_amount');

//        TODO: Change
        $target_amount = 5000;


        if (is_numeric($target_amount)) {
            if ($target_amount < 0) {
                return 'target';
                return Redirect::back()->withErrors(['msg', 'Target amount must greater than 0']);
            }
        } else {
            return 'target 2';
            return Redirect::back()->withErrors(['msg', 'Target amount must be numeric']);
        }


        if (empty($shortlink)) $shortlink = '';

        $campaign = Campaign::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $deadline,
            'banner_path' => $request->input('banner_path'),
            'fulfillment_percentage' => 0,
            'shortlink' => $shortlink,
            'campaign_type' => $request->input('campaign_type'),
            'target_amount' => $target_amount,
            'status' => 'active',
            'users_id' => $user_id
        ]);
        
        $campaign_items = $request->input('campaign_items');

        if ($request->filled('campaign_items')){
            $list_of_campaign_array = [];
            foreach ($campaign_items as $item){
                $campaign_item = CampaignItem::create([
                    'description' => $item['description'],
                    'campaigns_id' => $campaign->id,
                    'items_id' => $item['item_id'],
                    'quantity' => 1
                ]);
                array_push($list_of_campaign_array, $campaign_item);
            }
        }

        session([
            'campaign' => $campaign
        ]);

//        var_dump($request->session()->get('deadline'));
        return redirect('../campaign_item/create');

    }

    public function create_wishlist_page() {
        $type = 'wishlist';
        return view('campaigns.create', compact('type'));
    }

    public function create_campaign_page() {
        $type = 'campaign';
        return view('campaigns.create', compact('type'));
    }

    public function getCampaignByType($campaign_type){
        $campaigns = Campaign::where('campaign_type', $campaign_type)
                            ->get();
  
        return response()->json([
            $campaigns
        ],200);
    }

    public function getCampaignById($id){
        $campaign = Campaign::with(['user', 'items', 'contributes'])->find($id);
        return response()->json($campaign);
    }

    public function getCampaignByContributorId($contributor_id){
        $campaign = Campaign::where('users_id', $contributor_id)
                    ->with(['items', 'user'])
                    ->get();
        return response()->json($campaign);
    }

    public function update(Request $request){
    // kalau udah ada yg bayar gabisa ngedit
        $campaign = Campaign::find($request->input('campaign_id'));
        if ($request->input('campaign_type')=='donation'){
            $percentage = $campaign->percentage;
        }else{
            $wishlist_item = CampaignItem::where('campaigns_id', $request->input('campaign_id'))
                                        ->first();
            $percentage = $wishlist_item->fulfillment_percentage;
        }

        if ($percentage > 0){
            return response()->json([
                "message" => "error"
            ], 400);
        }else{
            $campaign->update([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'deadline' => $request->input('deadline'),
                'banner_path' => $request->input('banner_path'),
                'shortlink' => $request->input('shortlink'),
                'campaign_type' => $request->input('campaign_type'),
                'target_amount' => $request->input('target_amount'),
                'status' => $request->input('status')
            ]);
        }

        return response()->json([
            $campaign
        ]);
    }
}
