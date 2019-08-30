<?php

namespace App\Http\Controllers;

use App\CampaignItem;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Contribution;
use App\Campaign;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Contribution;

//        $validator = Validator::make($request->all(), [
//            'amount' => 'required',
//            'user_id' => 'required',
//            'campaign_id' => 'required',
//        ]);
         
//        if ($validator->fails()) {
//            $output = [
//                'message' => 'Your input is doesnt valid'
//            ];
//              return redirect()->back()->withInput();
//             return response()->json($output);
//        }
        
        $payment->message = (empty($request->message)) ? '' : $request->message;
        $payment->amount = $request->amount;
        $payment->users_id = 1; //TODO: Change User Id
        $payment->campaigns_id = $request->campaign_id;
        $payment->save();

        $amount = Contribution::where('campaigns_id', $request->campaign_id)->sum('amount');

        $campaign = Campaign::find($request->campaign_id);
        $campaign->update(['fulfillment_percentage' => ($amount / $campaign->target_amount) * 100 ]);

        return response()->json($payment);
    }

    public function buyAllWishlistItems(Request $request)
    {
        $itemIds = CampaignItem::where('campaign_id', $request->campaign_id)
            ->pluck('item_id');

        $amount = Item::whereIn('id', $itemIds)->sum('price');

        Contribution::create([
            'message' => $request->message,
            'amount' => $amount,
            'users_id' => 1, //TODO: Change User Id,
            'campaigns_id' => $request->campaign_id
        ]);

        CampaignItem::where('campaign_id', $request->campaign_id)
            ->update(['percentage' => 100]);

        Campaign::find($request->campaign_id)->update(['status' => 'inactive', 'fulfillment_percentage' => 100]);

        return redirect()->back()->with('success', 'Berhasil membeli barang wishlist!');
    }

    public function buySingleWishlistItem(Request $request)
    {
//        return $request->all();
        $contribution = Contribution::create([
            'message' => $request->message,
            'amount' => $request->amount,
            'users_id' => 1, //TODO: Change User Id,
            'campaigns_id' => $request->campaign_id,
        ]);

        $item = Item::find($request->item_id);

        $ciToUpdate = CampaignItem::where('campaign_id', $request->campaign_id)
            ->where('item_id', $request->item_id)->first();

//        return $ciToUpdate;

        $oldPercentage = $ciToUpdate->percentage;

        $ciToUpdate->update(['percentage' => $oldPercentage + ( ($request->amount / $item->price) * 100) ]);


        $ci = CampaignItem::where('campaign_id', $request->campaign_id)
            ->where('item_id', $request->item_id)->first();

        $contribution->update(['campaign_item_id'=> $ci->id]);

        return redirect()->back()->with('success', 'Berhasil membeli barang wishlist!');
    }
}
