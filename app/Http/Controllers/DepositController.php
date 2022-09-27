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

    public function show()
    {
        return view('user.Deposit.show')->with([
       
            "deposit" => Deposit::where('user_id',auth()->user()->id)->latest('created_at')->first(),
            
        ]);
    }


    public function create()
    {

    }


    public function store(Request $request)
    {


        

        $request->validate([
            "amount" => 'required',
            "bitcoin_amount" => 'required',
            "wallet" => 'required',
            

        ]);


        Deposit::create([
            "amount" => $request->amount,
            "bitcoin_amount" => $request->bitcoin_amount,
            "wallet" => $request->wallet,
            


        ]);

        return redirect('/showdeposit')->with([
            "success" => "Deposit awaiting confirmation"
        ]);
    }


        public function usereditdeposit(Deposit $deposit)
        {
            
            return view('user.Deposit.edit')->with([
       
                "deposit" => Deposit::where('user_id',auth()->user()->id)->latest('created_at')->first(),
                
            ]);
        }
    
    
    
        public function userupdatedeposit(Request $request, Deposit $deposit)
        {
            $request->validate([
                "amount" => 'required',
                "bitcoin_amount" => 'required',
                "wallet" => 'required',
            ]);
    
            $deposit->fill($request->post())->save();
    
            return redirect('/showdeposit')->with([
                "success" => "Deposit awaiting confirmation"  ]);
        }
    
        public function userupdatestatus(Request $request, Deposit $deposit)
        {
            
            $deposit->fill($request->post())->save();

          
    
            return redirect('/wallet')->with([
                "success" => "Deposit awaiting confirmation"  ]);
        }


      
}
