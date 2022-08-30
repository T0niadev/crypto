<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;

class WithdrawalController extends Controller
{
    public function index() {

		$withdrawals = Withdrawal::latest()->get();


		return view('admin.withdrawals.index', compact('withdrawals'));
	}

	public function create() {


		return view ('admin.withdrawals.create');
	}


	public function store(Request $request){

		$request->validate([
			"username" => 'required',
			"amount" => 'required',
			"amountpayable" => 'required',
			"bankdetails_wallet" => 'required|max:255',
			"date" => 'required',
			"status" => 'required',



			]);



			$withdrawals = new Withdrawal([

				'username'=> request('username'),
				'amount' => request('amount'),
                'amountpayable' => request('amountpayable'),
				'bankdetails_wallet' => request('bankdetails_wallet'),
				'date' => request('date'),
				'status' => request('status'),



				]);


                $withdrawals->save();


				return redirect('/withdrawals');
			}


			public function edit($id) {

				$withdrawals= Withdrawal::findorfail($id);

				return view('admin.withdrawals.edit', compact('withdrawals'));


			}


			public function update(Request $request,$id) {


				$request->validate([

                    "username" => 'required',
                    "amount" => 'required',
                    "amountpayable" => 'required',
                    "bankdetails_wallet" => 'required|max:255',
                    "date" => 'required',
                    "status" => 'required',
					]);

					$input = $request->except(['image']);

					$withdrawals = Withdrawal::findorfail($id);

					$withdrawals->username= $request->get('username');

					$withdrawals->amount = $request->get('amount');

					$withdrawals->amountpayable = $request->get('amountpayable');

					$withdrawals->bankdetails_wallet = $request->get('bankdetails_wallet');

					$withdrawals->date = $request->get('date');

					$withdrawals->status = $request->get('status');









					$withdrawals->update($input);






					return redirect('/withdrawals');

				}
}
