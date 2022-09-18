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
            "bankname_currency" => 'required',
            "accountname_ID" => 'required',
            "bank_wallet" => 'required',
            

        ]);

  



        

        

        Withdrawal::create([

            "bankname_currency" => $request->slots,
            "accountname_ID" => $request->amount,
            "bank_wallet" => $request->total_return,
            


        ]);



        return redirect('/withdrawal')->with([
            "success" => "Withdrawal Method Added Successfully"
        ]);
    }
}
