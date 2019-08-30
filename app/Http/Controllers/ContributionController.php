<?php

namespace App\Http\Controllers;

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

        $validator = Validator::make($request->all(), [
            'amount' => 'required',
            'user_id' => 'required',
            'campaign_id' => 'required',
        ]);
         
        if ($validator->fails()) {
            $output = [
                'message' => 'Your input is doesnt valid'
            ];
            //  return redirect()->back()->withInput();
             return response()->json($output);
        }
        
        $payment->message = (empty($request->message)) ? '' : $request->message;
        $payment->amount = $request->amount;
        $payment->users_id = $request->user_id;
        $payment->campaigns_id = $request->campaign_id;
        $payment->save();

        Campaign::where('id', $request->campaign_id)
            ->update([
                'fulfillment_percentage' => DB::raw("fulfillment_percentage + ($request->amount/target_amount)")
            ]);

        return response()->json($payment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
