<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function index() {

		$deposit = Deposit::latest()->get();


		return view('admin.deposits.index', compact('deposit'));
	}

	public function create() {


		return view ('admin.deposits.create');
	}


	public function store(Request $request){

		$request->validate([

			"username" => 'required',
			"amount" => 'required',
			"accountname_ID" => 'required',
			"accountno_wallet" => 'required|max:255',
			"method" => 'required',
			"trans_date" => 'required',
			"status" => 'required',

			]);



			$deposits = new Deposits([

				'username'=> request('username'),
				'amount' => request('amount'),
				'accountname_ID' => request('accountname_ID'),
				'accountno_wallet' => request('accountno_wallet'),
				'method' => request('method'),
				'trans_date' => request('trans_date'),
                'status' => request('status'),


				]);


				// $this->addImage(request()->file('image'));
				// $deposit->save();


				return redirect('/deposits');
			}


			public function edit($id) {

				$deposit= Deposit::findorfail($id);

				return view('admin.deposits.edit', compact('deposit'));


			}


			public function update(Request $request,$id) {


				$request->validate([

                    "username" => 'required',
                    "amount" => 'required',
                    "accountname_ID" => 'required',
                    "accountno_wallet" => 'required|max:255',
                    "method" => 'required',
                    "trans_date" => 'required',
                    "status" => 'required',

					]);

					// $input = $request->except(['image']);

                    $input = $request;

					$deposit = Deposit::findorfail($id);

					$deposit->username = $request->get('username');

					$deposit->amount = $request->get('amount');

					$deposit->accountname_ID = $request->get('accountname_ID');

					$deposit->accountno_wallet = $request->get('accountno_wallet');

					$deposit->method = $request->get('method');


					$deposit->trans_date = $request->get('trans_date');



					$deposit->update($input);






					return redirect('/deposits');

				}
}
