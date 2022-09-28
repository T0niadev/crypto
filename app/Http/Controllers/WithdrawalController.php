<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;


class WithdrawalController extends Controller
{
    public function index()
    {

        return view('user.Withdrawal.index')->with([
           // "packages" => Package::all(),
        ]);
    }

    public function create()
    {
    }


    public function store(Request $request)
    {




        $request->validate([
            "amount" => 'required',
            "bank_name_or_currency" => 'required',
            "account_number_or_wallet_address" => 'required',


        ]);

        if (auth()->user()->wallet < $request['amount']) {
            return back()->with('error', "You don't have sufficient amount in your wallet");
        }


        Withdrawal::create([
            "amount" => $request->amount,
            "bank_name_or_currency" => $request->bank_name_or_currency,
            "account_number_or_wallet_address" => $request->account_number_or_wallet_address,



        ]);



        return redirect('/wallet')->with([
            "success" => "Withdrawal process in progress"
        ]);
    }








}