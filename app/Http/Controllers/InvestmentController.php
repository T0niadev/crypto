<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreInvestmentRequest;
use App\Http\Requests\UpdateInvestmentRequest;

class InvestmentController extends Controller
{

    public function index()
    {

        return view('user.Investment.index')->with([
            "packages" => Package::all(),
            "pack" => Package::latest()->first(),
            "investments" => Investment::all(),
        ]);
    }

    public function create($id)
    {
        return view('user.Investment.add')->with([

            "package" => Package::findOrFail($id)
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
          
            "amount" => 'required',
            "total_return" => 'required',
            "start_date" => 'required',
            "withdrawal_date" => 'required',
            "package_id" => 'required',

        ]);

        //   $inv = investment::find($id);
        //  $inv_user = User::find($inv->user_id);



        $user_id = Auth::id();

        // Find package and check if investment is enabled
        $package = Package::all()->where('id', $request['package_id'])->first();
        if (!($package && $package->canRunInvestment())){
            return back()->with('error', 'Can\'t process investment, package not found, disabled or closed');
        }

        Investment::create([

            
            "amount" => $request->amount,
            "total_return" => $request->total_return,
            "investment_date" => now()->format('Y-m-d H:i:s'),
            "start_date" => $request->start_date,
            "withdrawal_date" => $request->withdrawal_date,
            "package_id" => $request->package_id,
            'package_data' => json_encode($package)


        ]);



        return redirect('/investment')->with([
            "success" => "Package Added Successfully"
        ]);
    }


    public function edit($id)
    {

        $investment = Investment::findorfail($id);

        return view('investments.edit', compact('investment'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            "slots" => 'required',
            "amount" => 'required',
            "total_return" => 'required',
            "investment_date" => 'required',
            "start_date" => 'required',
            "withdrawal_date" => 'required',
            "status" => 'required',
        ]);

        // $input = $request->except(['image']);

        $input = $request;

        $investment = Investment::findorfail($id);

        $investment->slots = $request->get('slots');

        $investment->amount = $request->get('amount');

        $investment->total_return = $request->get('total_return');

        $investment->investment_date = $request->get('investment_date');

        $investment->start_date = $request->get('start_date');


        $investment->withdrawal_date = $request->get('withdrawal_date');


        $investment->status = $request->get('status');



        $investment->update($input);






        return redirect('/admin/investments');
    }
}