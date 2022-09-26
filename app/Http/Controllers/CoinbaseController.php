<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CoinbaseCommerce\ApiClient;
use CoinbaseCommerce\Resources\Checkout;

class CoinbaseController extends Controller
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
        //
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

    public function initiatePayment()
    {

        $apiClientObj = ApiClient::init(env('COINBASE_API_KEY'));
        $apiClientObj->setTimeout(3);
        // $apiClientObj->verifySsl(false);

        $checkoutData = [
            'name' => 'The Sovereign Individual',
            'description' => 'Mastering the Transition to the Information Age',
            'pricing_type' => 'fixed_price',
            'local_price' => [
                'amount' => '100.00',
                'currency' => 'USD'
            ],
            'requested_info' => ['name', 'email']
        ];
        $newCheckoutObj = Checkout::create($checkoutData);


        dd($newCheckoutObj);

    }
}