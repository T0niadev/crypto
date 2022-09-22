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
            "bankname_currency" => 'required',
            "accountname_ID" => 'required',
            "bank_wallet" => 'required',
            

        ]);


        Withdrawal::create([
            "amount" => $request->amount,
            "bankname_currency" => $request->bankname_currency,
            "accountname_ID" => $request->accountname_ID,
            "bank_wallet" => $request->bank_wallet,
            


        ]);



        return redirect('/wallet')->with([
            "success" => "Withdrawal process in progress"
        ]);
    }








}
