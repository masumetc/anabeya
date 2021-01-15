<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Payment2s;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashBoardController extends Controller
{
    public function dashboard()
    {
      if(Auth::user()->role == 'customer' && Auth::user()->email_verified_at !=''){
            return redirect()->route('home');
        }else if(Auth::user()->email_verified_at !='' && Auth::user()->role == 'superadmin'){
            $payment_due = Payment::sum('amount');
            $payment_total = Auth::user()->user_earning;
            $totalOrder = Order::count();
            $totalSell = Order::count('quantity');
            return view('Backend.index', compact('payment_due', 'payment_total','totalOrder','totalSell'));
        }
        else if(Auth::user()->email_verified_at !=''){
             $payment_due = Payment::where('seller_id', Auth::user()->id)->sum('amount');
            $payment_total = Payment2s::where('seller_id', Auth::user()->id)->sum('amount');
            
            $totalOrder = Order::where('seller_id', Auth::user()->id)->count();
            return view('Backend.index', compact('payment_due', 'payment_total','totalOrder'));
        }
        else {
            return redirect()->route('verification.notice');
        }

    }
}

    