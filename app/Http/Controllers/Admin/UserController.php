<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {

		$users = User::orderBy('created_at', 'desc')->get();
		return view('admin.users.index', compact('users'));
	}

    public function search(Request $request)
    {
        $name = $request->name;

        $users = User::where('first_name', 'like', "%{$name}%")->orWhere('last_name', 'like', "%{$name}%")->get();



        return view('admin.users.index', compact('users'));
    }

	public function create() {
		return view('admin.users.create');
	}

	public function store(Request $request) {

		$request->validate([

			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',

		]);

		$users = User::Create([

			'name' => request('name'),
			'email' => request('email'),
			'password' => Hash::make(request('password')),


		]);

        $users->save();

		return redirect('/users');


	}

	public function edit($id){

		$users = User::findorfail($id);

		return view('admin.users.edit', compact('users'));

	}

	public function update(Request $request, $id) {


		$request->validate([

			'name' => 'required|string|max:255',

			'current-password' => 'required',

			'password' => 'required|min:6',

		]);


		$users = User::findorfail($id);


			//current password check //
		if (Hash::check($request->get('current-password'), $users->password)) {
            // The passwords matches

            $users->name = $request->get('name');

			$users->password = Hash::make($request->get('password'));

			$users->save();

		}

		else{

			return alert("wrong pass");
		}

		return redirect('/users');

	}


    public function editwallet(User $user)
    {
        return view('admin.users.edit',compact('user'));
    }



	public function updatewallet(Request $request, User $user)
    {
        $request->validate([
            'wallet' => 'required',
        ]);

        $user->fill($request->post())->save();

        return redirect()->route('admin.user')->with('success','wallet Has Been updated successfully');
    }

}