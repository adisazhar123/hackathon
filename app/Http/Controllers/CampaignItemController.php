<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Campaign;
use App\CampaignItem;
use App\Item;

use Auth;

class CampaignItemController extends BaseController
{
    public function index(){
        $items = Item::all();
        $campaign = session()->get('campaign');
        $label = $campaign->campaign_type == 'wishlist' ?
            'Pilih produk untuk dimasukkan ke wishlist: ' . $campaign->title . " mu"
            : 'Pilih produk mitra yang dibutuhkan untuk kampanye donasi: ' . $campaign->title . " mu";

        return view('campaigns.campaign-item', ['items' => $items, 'label' => $label, 'type' => $campaign->campaign_type]);
    }

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

    public function addItemToCampaign(Request $request, $campaignId, $itemId)
    {
        $ci = CampaignItem::create([
            'description' => $request->message,
            'quantity' => 1,
            'campaign_id' => $campaignId,
            'item_id' => $itemId,
            'percentage' => 0
        ]);

        $campaign = Campaign::find($campaignId);
        $campaign->target_amount = $campaign->target_amount + $ci->item->price;
        $campaign->save();

        return response()->json($ci);
    }

    public function finishAddingItemToCampaign($type)
    {
        session()->forget("campaign");
        return redirect("/")->with('success', 'Berhasil membuat ' . $type);
    }
}
