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

    public function create()
    {

    }


    public function store(Request $request)
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


        $investments = new Investment([

            "slots" => required('slots'),
            "amount" => required('amount'),
            "total_return" => required('total_return'),
            "investment_date" => required('investment_date'),
            "start_date" => required('start_date'),
           "withdrawal_date" => required('withdrawal_date'),
           "status" => required('status'),


        ]);



        $investments->save();

        return redirect('/investments');
    }


    public function edit($id)
    {

        $investment = Investment::findorfail($id);

        return view('admin.investments.edit', compact('investment'));
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
