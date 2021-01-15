<?php

namespace App\Http\Controllers;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->email_verified_at != ''){
            $datetime = Carbon::now()->subHours(6)->format("Y-m-d H:i:s");
        $order_olds = Order::where('buyer_id', \Illuminate\Support\Facades\Auth::user()->id)->where('status', '0')->where('created_at', '<', $datetime)->get();

        $date = new \DateTime();
        $date->modify('-6 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $orders = Order::where('buyer_id', \Illuminate\Support\Facades\Auth::user()->id)->where('created_at','>=',$formatted_date)->get();

        $user = User::where('id',Auth::user()->id)->first();
        return view('home',compact('user', 'orders', 'order_olds'));
        }else {
            return redirect()->route('verification.notice');
        }
        
    }

     public function userInformatonUpdate(Request $request,$userId)
    {
        echo $userId.'-'.'Continue Working';
        exit();
        $user = User::where('id',$userId)->first();
        print_r($user);
   }

    
}
