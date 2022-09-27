<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Cryptocap\Facades\Cryptocap;

class PayController extends Controller
{
    public function paybitcoin()
    {
        // dd( Cryptocap::getAssets());
        return view('paybitcoin')->with([
       
        ]);
    }
}
