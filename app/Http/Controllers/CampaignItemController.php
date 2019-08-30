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

class CampaignItemController extends BaseController
{
    public function create(Request $request){
        $user_id = 1;
        $campaign_items = $request->input('campaign_items');

        $list_of_campaign_array = [];
        foreach ($campaign_items as $item){
            $campaign_item = CampaignItem::create([
                'description' => $item['description'],
                'campaigns_id' => $request->input('campaigns_id'),
                'items_id' => $item['item_id'],
                'quantity' => $item['quantity']
            ]);
            array_push($list_of_campaign_array, $campaign_item);
        }

        return response()->json([
            $list_of_campaign_array
        ], 200);
    }

    public function getCampaignItems(){
        $campaign_items = CampaignItem::all();

        return response()->json([
            $campaign_items
        ], 200);
    }
}
