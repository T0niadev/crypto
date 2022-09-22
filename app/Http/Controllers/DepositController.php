<?php

namespace App\Http\Controllers;
use App\Models\Deposit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {

        return view('user.Deposit.index')->with([
       
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


        Deposit::create([
            "amount" => $request->amount,
            "bankname_currency" => $request->bankname_currency,
            "accountname_ID" => $request->accountname_ID,
            "bank_wallet" => $request->bank_wallet,
            


        ]);



        return redirect('/wallet')->with([
            "success" => "Deposit awaiting confirmation"
        ]);
    }
}
