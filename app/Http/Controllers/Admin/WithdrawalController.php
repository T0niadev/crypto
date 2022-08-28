<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdrawal;

class WithdrawalController extends Controller
{
    public function index() {

		$withdrawal = Withdrawal::latest()->get();


		return view('admin.withdrawals.index', compact('withdrawal'));
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



			$withdrawals = new Withdrawals([

				'username'=> request('username'),
				'amount' => request('amount'),
                'amountpayable' => request('amountpayable'),
				'bankdetails_wallet' => request('bankdetails_wallet'),
				'date' => request('date'),
				'status' => request('status'),



				]);


				// $this->addImage(request()->file('image'));
				// $withdrawal->save();


				return redirect('/withdrawals');
			}


			public function edit($id) {

				$withdrawal= Withdrawal::findorfail($id);

				return view('admin.withdrawals.edit', compact('withdrawal'));


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

					$withdrawal = Withdrawal::findorfail($id);

					$withdrawal->username= $request->get('username');

					$withdrawal->amount = $request->get('amount');

					$withdrawal->amountpayable = $request->get('amountpayable');

					$withdrawal->bankdetails_wallet = $request->get('bankdetails_wallet');

					$withdrawal->date = $request->get('date');

					$withdrawal->status = $request->get('status');



					// /** Upade Photo and Recent Photo Delete **/
					// if ($file = request()->file('image')) {
					// 	\File::delete(public_path(). '/multimages/package/' .$withdrawal->image);

					// 	$this->addImage(request()->file('image'));

					// 	$extension =request()->file('image')->getClientOriginalExtension();
					// 	$name = time();


					// 	$input['image'] = $name.".".$extension;
					// }





					$withdrawal->update($input);






					return redirect('/withdrawals');

				}
}
