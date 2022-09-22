<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;
use App\Models\Package;
use App\Models\User;

class InvestmentController extends Controller
{
    public function index()
    {

        $investments = Investment::latest()->get();


        return view('admin.investments.index', compact('investments'));
    }

   

    public function editinvestment(Investment $investment)
    {
        return view('admin.investments.edit',compact('investment'));
    }



	public function updateinvestment(Request $request, Investment $investment)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $investment->fill($request->post())->save();

        return redirect('/admin/investments')->with('success','Status updated succesfully');
    }

}
