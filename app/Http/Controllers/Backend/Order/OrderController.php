<?php

namespace App\Http\Controllers\Backend\Order;

use App\CancelOrder;
use App\Order;
use App\User;
use App\Payment;
use App\Payment2s;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public $view_page_url;

    public function __construct()
    {
        $this->view_page_url = 'Backend.order.';
    }
    public function newOrder()
    {
        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('status', '1')->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('status', '1')->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('status', '1')->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'newOrder', compact('orders'));
    }
    public function shipView(){
        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('status', '2')->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('status', '2')->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('status', '2')->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'order_ship', compact('orders'));
    }
    public function orderProcessing()
    {
        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('status', '3')->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('status', '3')->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('status', '3')->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'orderProcessing', compact('orders'));
    }
    public function orderDelivery()
    {
        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('status', '4')->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('status', '4')->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('status', '4')->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'orderDelivery', compact('orders'));
    }
    public function orderComplete()
    {
        return view($this->view_page_url.'orderComplete');
    }
    public function invoice()
    {
        return view($this->view_page_url.'invoice');
    }

    public function readyShip(){
        $datetime = Carbon::now()->subHours(6)->format("Y-m-d H:i:s");

        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('status', '0')->where('created_at', '<', $datetime)->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('status', '0')->where('created_at', '<', $datetime)->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('status', '0')->where('created_at', '<', $datetime)->get();
        }
        return view($this->view_page_url.'ready_ship', compact('orders'));
    }

    public function waitingOrder(){
        $date = new \DateTime();
        $date->modify('-6 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');

        if (Auth::user()->role == 'seller'){
            $orders = Order::where('seller_id', Auth::user()->id)->where('payment_status', '1')->where('created_at','>=',$formatted_date)->get();
        }
        if (Auth::user()->role == 'curier'){
            $orders = Order::where('curier_id', Auth::user()->id)->where('payment_status', '1')->where('created_at','>=',$formatted_date)->get();
        }
        if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
            $orders = Order::where('payment_status', '1')->where('created_at','>=',$formatted_date)->get();
        }

        return view($this->view_page_url.'waiting_order', compact('orders'));
    }

    public function cancelOrder($id){
        $order = Order::find($id);

        $cancel_order = new CancelOrder();
        $cancel_order->name = $order->name;
        $cancel_order->price = $order->price;
        $cancel_order->quantity = $order->quantity;
        $cancel_order->image = $order->image;
        $cancel_order->unit_charge = $order->unit_charge;
        $cancel_order->curier_id = $order->curier_id;
        $cancel_order->seller_id = $order->seller_id;
        $cancel_order->first_name = $order->first_name;
        $cancel_order->last_name = $order->last_name;
        $cancel_order->email = $order->email;
        $cancel_order->address1 = $order->address1;
        $cancel_order->address2 = $order->address2;
        $cancel_order->country = $order->country;
        $cancel_order->state = $order->state;
        $cancel_order->zip = $order->zip;
        $cancel_order->payment_status = $order->payment_status;
        $cancel_order->status = $order->status;
        $cancel_order->cancelled_by = Auth::user()->role;
        $cancel_order->color = $order->color;
        $cancel_order->product_id = $order->product_id;
        $cancel_order->size = $order->size;
        $cancel_order->color_image = $order->color_image;
        $cancel_order->save();
        if ($cancel_order->save()){
            $order->delete();
        }
        return redirect()->back()->with('success', 'Order Canceled');
    }

    public function shipNew($id){
        $order = Order::find($id);
        $order->status = '1';
        $order->save();
        
        $user = User::find($order->seller_id);

        //price calculater
        $order_price = ($order->price / 100) * $user->commission;
        $net_price = $order->price - $order_price;
        
        $super_admins = User::where('role', 'superadmin')->get();
        foreach($super_admins as $super_admin){
            $find_super = User::find($super_admin->id);
            $find_super->user_earning = $find_super->user_earning + $order_price;
            $find_super->save();
        }
        
        if ($order->save()){
            $payment = new Payment();
            $payment->seller_id = $order->seller_id;
            $payment->order_id = $order->id;
            $payment->amount = $net_price;
            $payment->getway_id = $order->payment_status;
            $payment->status = '1';
            $payment->save();

            $payment2 = new Payment2s();
            $payment2->seller_id = $order->seller_id;
            $payment2->order_id = $order->id;
            $payment2->amount = $net_price;
            $payment2->getway_id = $order->payment_status;
            $payment2->status = '1';
            $payment2->save();

            if ($payment2->save()){
                $payment3 = new Payment();
                $payment3->seller_id = $order->curier_id;
                $payment3->order_id = $order->id;
                $payment3->amount = $order->unit_charge;
                $payment3->getway_id = $order->payment_status;
                $payment3->status = '1';
                $payment3->save();

                $payment4 = new Payment2s();
                $payment4->seller_id = $order->curier_id;
                $payment4->order_id = $order->id;
                $payment4->amount = $order->unit_charge;
                $payment4->getway_id = $order->payment_status;
                $payment4->status = '1';
                $payment4->save();
            }

        }
        return redirect()->back()->with('success', 'Order ship to new order');
    }



    public function orderShip($id){
        $order = Order::find($id);
        $order->status = '2';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to ship order');
    }

    public function orderProcess(Request $request, $id){
        $this->validate($request, [
            'tracking' => 'required'
        ]);
        $order = Order::find($id);
        $order->status = '3';
        $order->tracking_id = $request->tracking;
        $order->save();
        return redirect()->back()->with('success', 'Order ship to Order Processing');
    }

    public function orderDeliverys($id){
        $order = Order::find($id);
        $order->status = '4';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to Order Delivery');
    }


    public function cancel_customer(){
        if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin'){
            $orders = CancelOrder::where('cancelled_by', 'customer')->orderBy('id', 'desc')->get();
        }else{
            $orders = CancelOrder::where('cancelled_by', 'customer')->where('seller_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }

        return view($this->view_page_url.'cancel_customer', compact('orders'));
    }
    public function cancel_seller(){
        if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin'){
            $orders = CancelOrder::where('cancelled_by', 'seller')->orderBy('id', 'desc')->get();
        }else{
            $orders = CancelOrder::where('cancelled_by', 'seller')->where('seller_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'cancel_seller', compact('orders'));
    }
    public function cancel_admin(){
        if(Auth::user()->role == 'manager' || Auth::user()->role == 'superadmin'){
            $orders = CancelOrder::where('cancelled_by', 'admin')->orderBy('id', 'desc')->get();
        }else{
            $orders = CancelOrder::where('cancelled_by', 'admin')->where('seller_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        return view($this->view_page_url.'cancel_admin', compact('orders'));
    }

    public function pending_order(){
        $orders = Order::where('payment_status', '3')->orWhere('payment_status', '4')->orderBy('id', 'desc')->get();
        return view($this->view_page_url.'pending_order', compact('orders','sellers'));
    }

    public function shipSixHOur($id){
        $order = Order::find($id);
        $order->payment_status = '1';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to six hour');
    }
    
    
    
    
    
    
    
    
    //up order
    public function uporder_one($id){
        $order = Order::find($id);
        $order->created_at = Carbon::now();
        $order->save();
        return redirect()->back()->with('success', 'Order ship to six hour');
    }
    
    public function uporder_two($id){

    }
    
    public function uporder_three($id){
        $order = Order::find($id);
        $order->status = '1';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to up');
    }
    
    public function uporder_four($id){
        $order = Order::find($id);
        $order->status = '2';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to up');
    }
    
    public function uporder_five($id){
        $order = Order::find($id);
        $order->status = '3';
        $order->save();
        return redirect()->back()->with('success', 'Order ship to up');
    }
    
    
    
    
    
    
    
    
    
    
    

}
