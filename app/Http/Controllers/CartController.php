<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Lang;

class CartController extends Controller
{
    public function viewCart(Request $request)
    {
        if (!Auth::check())
            return \Redirect::to('/account');

        return view('cart', [
            'title' => Lang::get(114),  // $title
            //'minAmount' => DB::table('restaurants')->where("id", '1')->
            //select('minAmount')->get()->first()->minAmount
        ]);
    }
}
