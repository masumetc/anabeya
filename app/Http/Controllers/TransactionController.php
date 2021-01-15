<?php

namespace App\Http\Controllers;

use App\Review;
use App\Order;
use App\Refound;
use App\Payment;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function transaction()
    {
                if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin'){
            $transactions = Transaction::orderBy('id', 'desc')->get();
        }else{
            $transactions = Transaction::where('seller_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        }
        return view('Backend.transaction.transaction_list', compact('transactions'));
    }

    public function user()
    {
        $count = 0;
        $users = User::where('role', 'seller')->orWhere('role', 'curier')->with('payment')->get();
        return view('Backend.transaction.user_list', compact('users', 'count'));
    }

    public function create($id){
        $payment_due = Payment::where('seller_id', $id)->sum('amount');
        $seller = User::find($id);
        return view('Backend.transaction.transaction_create', compact('payment_due', 'id', 'seller'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'amount' => 'required',
        ]);

        if ($request->amount > $request->due){
            return redirect()->back()->with('error', 'Transaction amount cannot greater than due amount');
        }

        $transaction = new Transaction();
        $transaction->amount = $request->amount;
        $transaction->seller_id = $request->seller_id;
        $transaction->name = $request->name;
        $transaction->email = $request->email;
        $transaction->phone = $request->phone;
        $transaction->save();

        $payment_dues = Payment::where('seller_id', $request->seller_id)->get();
        foreach ($payment_dues as $payment_due){
            $payment_delete = Payment::find($payment_due->id);
            $payment_delete->delete();
        }


        $payment_new = new Payment();
        $payment_new->seller_id = $request->seller_id;
        $payment_new->order_id = '1';
        $payment_new->amount = $request->due - $transaction->amount;
        $payment_new->getway_id = '1';
        $payment_new->status = '1';
        $payment_new->save();
        return redirect()->back()->with('success', 'Transaction complete  ');

    }
    
    public function refund(Request $request){
        $this->validate($request, [
            'details_refund' => 'required',
        ]);
        $refund = new Refound();
        $refund->order_id = $request->productid;
        $refund->details_refund = $request->details_refund;
        $refund->save();
        
        $order = Order::find($request->productid);
        $order->status = '10';
        $order->save();
        return redirect()->back()->with('success', 'Order send for refund :)');
    }
    
    
    public function pending_refund(){
        $pending_refunds = Order::where('status', '10')->with('refund')->get();
        return view('Backend.refund.pending_refund', compact('pending_refunds'));
    }
    
    public function success_refund(){
       $pending_refunds = Order::where('status', '11')->with('refund')->get();
        return view('Backend.refund.success_refund', compact('pending_refunds'));
    }
    
    
    
    public function view_refund(){
        
    }
    
    
    public function execute_refund($id){
        $order = Order::find($id);
        $order->status = '11';
        $order->save();
        return redirect()->back()->with('success', 'Order send for success refund :)');
    }
    
    
    
    
    
    public function rating(Request $request){
        if(!Auth::check()) {
            return redirect()->route('login');
        }
        
        $this->validate($request, [
            'details' => 'required',
            'rating' => 'required',
        ]);
        
        $reviiew = new Review();
        $reviiew->product_id = $request->product_id;
        $reviiew->name = Auth::user()->name;
        $reviiew->details = $request->details;
        $reviiew->stars = $request->rating;
        $reviiew->save();
        return redirect()->back()->with('success', 'Review Successfull :)');
    }
    
    
    
    
    
    
    
    
    
    
    
}
