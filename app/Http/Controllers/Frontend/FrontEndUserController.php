<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Custom\Helper;
use Session;
use DB;

class FrontEndUserController extends Controller
{

    public function userLogin()
    {
    	return view('Frontend.userLogin');
    }
   

    


}
