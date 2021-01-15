<?php

namespace App\Http\Controllers\Backend\PaymentGetway;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentGetwayController extends Controller
{
    public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.paymentGetway.';
	} 

    public function addPaymentGetway()
    {
    	return view($this->view_page_url.'addPaymentGetway');
    }
    public function paymentSettings()
    {
    	return view($this->view_page_url.'paymentSettings');
    }
}
