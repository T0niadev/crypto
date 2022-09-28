<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit;

class DepositController extends Controller
{
    public function index() {

		$deposits = Deposit::latest()->orderBy('updated_at', 'desc')->get();


		return view('admin.deposits.index', compact('deposits'));
	}

    public function search(Request $request)
    {
        $name = $request->name;

        $deposits = Deposit::whereHas('user', function ($q) use ($name) {
            $q->where('first_name', 'LIKE', "%{$name}%")->orWhere('last_name', 'LIKE', "%{$name}%");
        })->get();

        return view('admin.deposits.index', compact('deposits'));
    }


	public function editdeposit(Deposit $deposit)
    {
        return view('admin.deposits.edit',compact('deposit'));
    }



	public function updatedeposit(Request $request, Deposit $deposit)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $deposit->fill($request->post())->save();

		return redirect('/admin/deposits')->with('success','Status updated succesfully');
    }

}