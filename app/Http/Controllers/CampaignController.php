<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Campaign;
use App\CampaignItem;

use Auth;

class CampaignController extends BaseController
{
    public function __construct()
    {
        view()->share('title', 'Buat donasi');
    }

    public function index()
    {
        return view('campaigns.create');
    }

    public function create(Request $request){
        $user_id =  1;
        $campaign_type = $request->input('campaign_type');

        $campaign = Campaign::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'deadline' => $request->input('deadline'),
            'banner_path' => $request->input('banner_path'),
            'fulfillment_percentage' => 0,
            'shortlink' => $request->input('shortlink'),
            'campaign_type' => $request->input('campaign_type'),
            'target_amount' => $request->input('target_amount'),
            'status' => $request->input('status'),
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
                    'quantity' => $item['quantity']
                ]);
                array_push($list_of_campaign_array, $campaign_item);
            }
        }

        return response()->json([
            $campaign
        ], 200);
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
