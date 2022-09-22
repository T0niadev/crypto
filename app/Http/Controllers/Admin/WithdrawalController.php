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

	public function editwithdrawal(Withdrawal $withdrawal)
    {
        return view('admin.withdrawals.edit',compact('withdrawal'));
    }



	public function updatewithdrawal(Request $request, Withdrawal $withdrawal)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $withdrawal->fill($request->post())->save();

        return redirect('/admin/withdrawals')->with('success','Status updated succesfully');
    }

}
