<?php

namespace App\Http\Controllers;

use App\Currency;
use App\CurrencySession;
use App\Flag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class FrontendController extends Controller
{
    public function currency(Request $request){
        if ($request->country){
            $flag = new Flag();
            $flag->sid = Session::getId();
            $flag->name = $request->name;
            $flag->image = $request->image;
            $flag->save();
        }
        $name = 'currency_id';
        $value = $request->id;
        $minutes = 5000;
        Cookie::queue(Cookie::make($name, $value, $minutes));
        $value = Cookie::get('currency_id');

        return redirect()->back();
    }
}
