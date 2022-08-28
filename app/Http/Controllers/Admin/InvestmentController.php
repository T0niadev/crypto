<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Investment;

class InvestmentController extends Controller
{
    public function index() {

		$investment = Investment::latest()->get();


		return view('admin.investments.index', compact('investment'));
	}

	public function create() {


		return view ('admin.investments.create');
	}


	public function store(Request $request){

		$request->validate([
			"name" => 'required',
			"max_invest" => 'required',
			"min_invest" => 'required',
			"withdrawal_date" => 'required|max:255',
			"start_date" => 'required',
			"end_date" => 'required',
			"duration" => 'required',


			]);


			$investments = new Investments([

				'name'=> request('name'),
				'max_invest' => request('max_invest'),
                'min_invest' => request('min_invest'),
				'withdrawal_date' => request('withdrawal_date'),
				'start_date' => request('start_date'),
				'end_date' => request('end_date'),
				'duration' => request('duration'),


				]);





				return redirect('/investments');
			}


			public function edit($id) {

				$investment= Investment::findorfail($id);

				return view('admin.investments.edit', compact('investment'));


			}


			public function update(Request $request,$id) {


				$request->validate([
					"name" => 'required',
                    "max_invest" => 'required',
                    "min_invest" => 'required',
                    "withdrawal_date" => 'required|max:255',
                    "start_date" => 'required',
                    "end_date" => 'required',
                    "duration" => 'required',
					]);

					// $input = $request->except(['image']);

                    $input = $request;

					$investment = Investment::findorfail($id);

					$investment->name = $request->get('name');

					$investment->max_invest = $request->get('max_invest');

					$investment->min_invest = $request->get('min_invest');

					$investment->withdrawal_date = $request->get('withdrawal_date');

					$investment->end_date = $request->get('end_date');


					$investment->duration = $request->get('duration');



					$investment->update($input);






					return redirect('/deposits');

				}
}
