<?php

namespace App\Http\Controllers;

use App\Models\PaypalPayment;
use App\Http\Requests\StorePaypalPaymentRequest;
use App\Http\Requests\UpdatePaypalPaymentRequest;

class PaypalPaymentController extends Controller
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
     * @param  \App\Http\Requests\StorePaypalPaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaypalPaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaypalPayment  $paypalPayment
     * @return \Illuminate\Http\Response
     */
    public function show(PaypalPayment $paypalPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaypalPayment  $paypalPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(PaypalPayment $paypalPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaypalPaymentRequest  $request
     * @param  \App\Models\PaypalPayment  $paypalPayment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaypalPaymentRequest $request, PaypalPayment $paypalPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaypalPayment  $paypalPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaypalPayment $paypalPayment)
    {
        //
    }
}
