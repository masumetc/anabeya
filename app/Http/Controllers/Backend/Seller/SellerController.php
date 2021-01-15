<?php

namespace App\Http\Controllers\Backend\Seller;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SellerController extends Controller
{
    public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.seller.';
	} 

    public function newSeller()
    {
        $data = DB::table('users')->where('role','seller')->where('status','0')->orderBy('id','desc')->get();
        return view($this->view_page_url.'newSeller')->with('tasks', $data);
    }
    
    public function addSeller(Request $request)
    {
    	$data = array();
    	$data['name'] = $request->name;
    	$data['user_name'] = $request->username;
    	$data['email'] = $request->email;
    	$data['password'] = bcrypt($request->password);
    	$data['role'] = 'seller';
    	$data['user_type'] = 'seller';
        $intime = new Carbon();
    	$data['created_at'] = $intime;
    	$data['status'] = '0';
    	$verify_code = str_random(20);
    	$data['email_verify_code'] = $verify_code;
    	
    	$insert = DB::table('users')->insert($data);
    	if($insert)
    	{
    	    $mail = array(
    	        'email' => 'no-replay@anabeya.com',
    	        'name' => 'Anabeya BD',
    	        'to_email' => $request->email,
    	        'to_seller_name' => $request->name,
    	        'subject' => 'please verify your email address'
    	        );
    	    $seller = array(
    	        'seller_name' => $request->name,
    	        'seller_email' => $request->email,
    	        'email_verify_code' => $verify_code
    	        );
    	   Mail::send('Backend.seller.confrim',$seller,function($message) use ($mail) {
    	       $message->from($mail['email'], $mail['name'])
    	       ->to($mail['to_email'], $mail['to_seller_name'])
    	       ->subject($mail['subject']);
    	   });
    		Session::put('success','seller add successfully also confrim mail send this user!');
    	    return Redirect::to('/seller/new-seller');
    	}
    	else
    	{
    		Session::put('error','Something went wrong!');
    	    return Redirect::to('/seller/new-seller');
    	}
    }
    
    public function editPrivacy(Request $request)
    {
        $get = $request->id;
        $data = array();
        $data['name'] = $request->edit_name;
        $data['mobile'] = $request->mobile;
        $brands_check = DB::table('brands')->where('seller_id',$get)->count();
        if($brands_check > 0)
        {
            $brands_data = array();
            $brands_data['name'] = $request->shop_name;
            DB::table('brands')->where('seller_id',$get)->update($brands_data);
            Session::put('success','privacy edit successfully');
        }
        else
        {
            $brands_data = array();
            $brands_data['seller_id'] = $get;
            $brands_data['name'] = $request->shop_name;
            $brands_data['created_by'] = '1';
            DB::table('brands')->insert($brands_data);
            Session::put('success','privacy edit successfully');
        }
        $insert = DB::table('users')->where('id',$get)->update($data);
        if($insert)
        {
            Session::put('success','privacy edit successfully');
    	    return Redirect::to('/seller/new-seller');
        }
        else
        {
            Session::put('error','Something went wrong!');
    	    return Redirect::to('/seller/new-seller');
        }
    }
    
    public function editpasswordPrivacy(Request $request)
    {
            $pass_id = $request->pass_id;
            $data = array();
            $data['password'] = bcrypt($request->update_password);
            $update = DB::table('users')->where('id',$pass_id)->update($data);
            if($update)
            {
                Session::put('success','Password Changed!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
    }
    
    public function editAddress(Request $request)
    {
        $address_id = $request->address_id;
        if($request->collect_city == '' && $request->collect_zip == '' && $request->collect_address == '')
        {
        $data = array();
        $data['user_country'] = 'Bangladesh';
        $data['user_city'] = $request->city;
        $data['user_zip'] = $request->zip;
        $data['user_address'] = $request->address;
        $data['collect_country'] = 'Bangladesh';
        $data['collect_city'] = $request->city;
        $data['collect_zip'] = $request->zip;
        $data['collect_address'] = $request->address;
        $intime = new Carbon();
    	$data['updated_at'] = $intime;
    	$update = DB::table('users')->where('id',$address_id)->update($data);
            if($update)
            {
                Session::put('success','address updateted successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
        else
        {
        $data = array();
        $data['user_country'] = 'Bangladesh';
        $data['user_city'] = $request->city;
        $data['user_zip'] = $request->zip;
        $data['user_address'] = $request->address;
        $data['collect_country'] = 'Bangladesh';
        $data['collect_city'] = $request->collect_city;
        $data['collect_zip'] = $request->collect_zip;
        $data['collect_address'] = $request->collect_address;
        $intime = new Carbon();
    	$data['updated_at'] = $intime;
    	$update = DB::table('users')->where('id',$address_id)->update($data);
            if($update)
            {
                Session::put('success','address updateted successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
    }
    
    public function editNid(Request $request)
    {
        $nid_id = $request->nid_id;
        
        if($request->file('nid_front') == '' && $request->file('nid_black') == '' && $request->file('check_book') == '')
        {
            Session::put('error','please upload images!');
    	    return Redirect::to('/seller/new-seller');
        }
        elseif($request->file('nid_front') != '' && $request->file('nid_black') == '' && $request->file('check_book') == '')
        {
            $user_nid_front = $request->file('nid_front');
            $image_name_nid_front = str_random(20);
            $ext_nid_front = strtolower($user_nid_front->getClientOriginalExtension());
            $image_full_name_nid_front = $image_name_nid_front.'.'.$ext_nid_front;
            $upload_path_nid_front = 'public/images/nid_img/';
            $image_url_nid_front = $image_full_name_nid_front;
            $success = $user_nid_front->move($upload_path_nid_front,$image_full_name_nid_front);
            if($success)
            {
                $data = array();
                $data['nid_front'] = $image_url_nid_front;
                $update = DB::table('users')->where('id',$nid_id)->update($data);
                Session::put('success','nid front upload successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
        elseif($request->file('nid_front') == '' && $request->file('nid_black') != '' && $request->file('check_book') == '')
        {
            $user_nid_back = $request->file('nid_back');
            $image_name_nid_back = str_random(20);
            $ext_nid_back = strtolower($user_nid_back->getClientOriginalExtension());
            $image_full_name_nid_back = $image_name_nid_back.'.'.$ext_nid_back;
            $upload_path_nid_back = 'public/images/nid_img/';
            $image_url_nid_back = $image_full_name_nid_back;
            $success = $user_nid_back->move($upload_path_nid_back,$image_full_name_nid_back);
            if($success)
            {
                $data = array();
                $data['nid_back'] = $image_url_nid_back;
                $update = DB::table('users')->where('id',$nid_id)->update($data);
                Session::put('success','nid back upload successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
        elseif($request->file('nid_front') == '' && $request->file('nid_back') == '' && $request->file('check_book') != '')
        {
            $user_check_book = $request->file('check_book');
            $image_name_check_book = str_random(20);
            $ext_check_book = strtolower($user_check_book->getClientOriginalExtension());
            $image_full_name_check_book = $image_name_check_book.'.'.$ext_check_book;
            $upload_path_check_book = 'public/images/nid_img/';
            $image_url_check_book = $image_full_name_check_book;
            $success = $user_check_book->move($upload_path_check_book,$image_full_name_check_book);
            if($success)
            {
                $data = array();
                $data['checkbook_image'] = $image_url_check_book;
                $update = DB::table('users')->where('id',$nid_id)->update($data);
                Session::put('success','checkbook upload successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
        else
        {
        $user_nid_front = $request->file('nid_front');
        $user_nid_back = $request->file('nid_back');
        $user_check_book = $request->file('check_book');
            $image_name_nid_front = str_random(20);
            $ext_nid_front = strtolower($user_nid_front->getClientOriginalExtension());
            $image_full_name_nid_front = $image_name_nid_front.'.'.$ext_nid_front;
            $upload_path_nid_front = 'public/images/nid_img/';
            $image_url_nid_front = $image_full_name_nid_front;
            $success = $user_nid_front->move($upload_path_nid_front,$image_full_name_nid_front);
            
            $image_name_nid_back = str_random(20);
            $ext_nid_back = strtolower($user_nid_back->getClientOriginalExtension());
            $image_full_name_nid_back = $image_name_nid_back.'.'.$ext_nid_back;
            $upload_path_nid_back = 'public/images/nid_img/';
            $image_url_nid_back = $image_full_name_nid_back;
            $success = $user_nid_back->move($upload_path_nid_back,$image_full_name_nid_back);
            
            $image_name_check_book = str_random(20);
            $ext_check_book = strtolower($user_check_book->getClientOriginalExtension());
            $image_full_name_check_book = $image_name_check_book.'.'.$ext_check_book;
            $upload_path_check_book = 'public/images/nid_img/';
            $image_url_check_book = $image_full_name_check_book;
            $success = $user_check_book->move($upload_path_check_book,$image_full_name_check_book);
            if($success)
            {
                $data = array();
                $data['nid_front'] = $image_url_nid_front;
                $data['nid_back'] = $image_url_nid_back;
                $data['checkbook_image'] = $image_url_check_book;
                $update = DB::table('users')->where('id',$nid_id)->update($data);
                Session::put('success','nid upload successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }  
        }
        
    }
    
    public function editProfile(Request $request)
    {
        $profile_id = $request->profile_id;
        if($request->file('profile_img') == '')
        {
            Session::put('error','Something went wrong!');
    	    return Redirect::to('/seller/new-seller');
        }
        else
        {
        $user_profile_img = $request->file('profile_img');
            $image_name_profile_img = str_random(20);
            $ext_profile_img = strtolower($user_profile_img->getClientOriginalExtension());
            $image_full_name_profile_img = $image_name_profile_img.'.'.$ext_profile_img;
            $upload_path_profile_img = 'public/images/nid_img/';
            $image_url_profile_img = $image_full_name_profile_img;
            $success = $user_profile_img->move($upload_path_profile_img,$image_full_name_profile_img);
            if($success)
            {
                $data = array();
                $data['profile_img'] = $image_url_profile_img;
                $update = DB::table('users')->where('id',$profile_id)->update($data);
                Session::put('success','profile upload successfully!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
        }
    }
    
    public function edit(Request $request)
    {   
        $id = $request->id;
        $data = DB::table('users')->find($id);
        $m_data = DB::table('brands')->where('seller_id',$id)->first();
        $output = array(
            'id' => $data->id,
            'name' => $data->name,
            'profile_img' => $data->profile_img,
            'username' => $data->user_name,
            'email' => $data->email,
            'nid_front' => $data->nid_front,
            'nid_back' => $data->nid_back,
            'checkbook_image' => $data->checkbook_image,
            'mobile' => $data->mobile,
            'user_country' => $data->user_country,
            'user_city' => $data->user_city,
            'user_zip' => $data->user_zip,
            'user_address' => $data->user_address,
            'collect_country' => $data->collect_country,
            'collect_city' => $data->collect_city,
            'collect_zip' => $data->collect_zip,
            'collect_address' => $data->collect_address,
            'shop_name' => $m_data->name,
        );
        echo json_encode($output);
    }
    
    public function userApprove($id)
    {
        $id = \Crypt::decrypt($id);
        $data = array();
        $intime = new Carbon();
    	$data['created_at'] = $intime;
        $data['status'] = '1';
        $update = DB::table('users')->where('id',$id)->update($data);
        if($update)
            {
                Session::put('success','seller id approved!');
    	        return Redirect::to('/seller/new-seller');
            }
            else
            {
                Session::put('error','Something went wrong!');
    	        return Redirect::to('/seller/new-seller');
            }
    }
    
    public function distroy($id)
    {
    	$id = \Crypt::decrypt($id);
    	$check = DB::table('users')->find($id);
    	if($check->status == '1')
            {
                $delete = DB::table('users')->where('id',$id)->delete();
                if($delete)
                {
                Session::put('success','seler id deleted successfully!');
    	        return Redirect::to('/seller/all-seller');
                }
                else
                {
                    Session::put('error','Something went wrong!');
    	            return Redirect::to('/seller/all-seller');
                }
            }
            else
            {
                $delete = DB::table('users')->where('id',$id)->delete();
                if($delete)
                {
                Session::put('success','seler id deleted successfully!');
    	        return Redirect::to('/seller/new-seller');
                }
                else
                {
                    Session::put('error','Something went wrong!');
    	            return Redirect::to('/seller/new-seller');
                }
            }
    }
    
    public function checkusername(Request $request)
    {
        $data = array();
        $data['user_name'] = $request->username;
        $check = DB::table('users')->where('user_name',$data)->count();
        if($check > 0)
        {
            echo json_encode(['status'=>'success']);
        }
        else
        {
            echo json_encode(['status'=>'error']);
        }
    }
    
    public function checkemail(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $check = DB::table('users')->where('email',$data)->count();
        if($check > 0)
        {
            echo json_encode(['status'=>'success']);
        }
        else
        {
            echo json_encode(['status'=>'error']);
        }
    }
    
    public function allSeller()
    {
        $data = DB::table('users')->where('role','seller')->where('status','1')->get();
        return view($this->view_page_url.'allSeller')->with('tasks', $data);
    }
    
    public function backPending($id)
    {
        $id = \Crypt::decrypt($id);
        $data = array();
        $data['status'] = '0';
        $update = DB::table('users')->where('id',$id)->update($data);
        if($update)
        {
            Session::put('success','seler back to pending!');
    	    return Redirect::to('/seller/all-seller');
        }
        else
        {
            Session::put('error','Something went wrong!');
    	    return Redirect::to('/seller/all-seller');
        }
    }
    
    public function sellerProfile()
    {
    	return view($this->view_page_url.'sellerProfile');
    }
    
    public function sellerVerify($id)
    {
        $id = \Crypt::decrypt($id);
        $check = DB::table('users')->where('email',$id)->first();
        $out = array(
            'email_verify_code' => $check->email_verify_code
            );
        if($out['email_verify_code'] == '0')
        {
            Session::put('message','Your email allready verified!');
    	    return Redirect::to('/login');
        }
        else
        {
            $data = array();
            $data['email_verify_code'] = '0';
            $update = DB::table('users')->where('email',$id)->update($data);
            if($update)
            {
                Session::put('message','Your email verified now you login!');
    	        return Redirect::to('/login');
            }
            else
            {
    	        return Redirect::to('/login');
            }
        }
    }
    
    public function sellerProfileS(Request $request)
    {
        $id = $request->id;
        $data = DB::table('users')->where('id',$id)->first();
        if($data)
        {
            echo json_encode($data);
        }
    }
    
    public function sellerPaid(Request $request)
    {
        $id = $request->id;
        $data = array();
        $data['user_due'] = '0';
        $update = DB::table('users')->where('id',$id)->update($data);
        if($update)
        {
        echo json_encode($update);    
        }
    }
    
    
    public function editCommission($id){
        $user = User::find($id);
        return view($this->view_page_url.'edit_commission', compact('user'));
    }
    
    
    
    public function updateCommission(Request $request, $id){
        $this->validate($request, [
                'commission' => 'required',
            ]);
            
            $user = User::find($id);
            $user->commission = $request->commission;
            $user->save();
            return redirect()->back()->with('success','Commission updated Successfully :)');
    } 
    
    
    
    
    
    
    
}
