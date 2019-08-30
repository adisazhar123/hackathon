<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Campaign;

use Auth;

class CampaignController extends BaseController
{
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

        return response()->json([
            $campaign
        ], 200);
    }

    public function getCampaignByType($campaign_type){
        $campaigns = Campaign::where('campaign_type', $campaign_type);
        // var_dump($campaigns); 
        return response()->json([
            $campaigns
        ],200);
    }

    public function getCampaignById(){

    }

    public function getCampaignByContributorId(){

    }

    public function getCampaignByCampaignerId(){

    }

    public function update(){

    }

    public function delete(){

    }

}
