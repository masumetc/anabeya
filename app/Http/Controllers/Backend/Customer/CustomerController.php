<?php

namespace App\Http\Controllers\Backend\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
	public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.customer.';
	} 

    public function newCustomer()
    {
        $users = User::where('role', 'customer')->where('status', null)->get();
    	return view($this->view_page_url.'newCustomer', compact('users'));
    }

    public function bbasicUpdate($id){
	    $user = User::find($id);
        $user->status = '1';
        $user->save();
        return redirect()->back()->with('success', 'Customer upgrade to basic customer');
    }
    public function basicCustomer()
    {
        $users = User::where('role', 'customer')->where('status', '1')->get();
    	return view($this->view_page_url.'basicCustomer', compact('users'));
    }


    public function platinumUpdate($id){
        $user = User::find($id);
        $user->status = '2';
        $user->save();
        return redirect()->back()->with('success', 'Customer upgrade to platinum customer');
    }
    public function plutinumCustomer()
    {
        $users = User::where('role', 'customer')->where('status', '2')->get();
    	return view($this->view_page_url.'plutinumCustomer', compact('users'));
    }


    public function goldUpdate($id){
        $user = User::find($id);
        $user->status = '3';
        $user->save();
        return redirect()->back()->with('success', 'Customer upgrade to gold customer');
    }
    public function goldCustomer()
    {
        $users = User::where('role', 'customer')->where('status', '3')->get();
    	return view($this->view_page_url.'goldCustomer', compact('users'));
    }
    public function customerProfile()
    {
    	return view($this->view_page_url.'customerProfile');
    }
    
    
    public function down_basic($id){
        $user = User::find($id);
        $user->status = '1';
        $user->save();
        return redirect()->back()->with('success', 'Customer down to basic customer');
    }
    
    
   public function down_platinum($id){
        $user = User::find($id);
        $user->status = '2';
        $user->save();
        return redirect()->back()->with('success', 'Customer down to platinum customer');
    }
    
    
    public function down_new($id){
         $user = User::find($id);
        $user->status = '0';
        $user->save();
        return redirect()->back()->with('success', 'Customer down to new customer');
    }
    
}
