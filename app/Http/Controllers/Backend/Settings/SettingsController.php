<?php

namespace App\Http\Controllers\Backend\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SettingsController extends Controller
{
    public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.settings.';
	} 

    // public function frontendSettings()
    // {
    //     $data = DB::table('settings')->where('type','logo')->get();
    //     $slider = DB::table('settings')->where('type','slider')->get();
    // 	return view($this->view_page_url.'frontEndSettings')->with('tasks', $data);
    // }
    
    public function frontendSettings()
    {
        $tasks = DB::table('settings')->where('type','logo')->get();
        $slider = DB::table('settings')->where('type','slider')->get();
        // var_dump($slider);exit();
    	return view($this->view_page_url.'frontEndSettings', compact('tasks','slider'));
    }
    
    public function logoSettings(Request $request)
    {
        if($request->file('logo_img') == '')
        {
            Session::put('error','Please insert a logo!');
    		return Redirect::to('settings/frontend-settings');
        }
        else
        {
        $logo_image = $request->file('logo_img');
        
            $logo_name = str_random(20);
    		$ext = strtolower($logo_image->getClientOriginalExtension());
    		$logo_full_name = $logo_name.'.'.$ext;
    		$upload_path = 'public/images/logo_img/';
    		$image_url = $logo_full_name;
    		$success = $logo_image->move($upload_path,$logo_full_name);
    		
    		if($success)
    		{
    		    $data = array();
    		    $data['image'] = $image_url;
    		    $data['type'] = 'logo';
    		    $data['title'] = 'logo';
    		    $data['content'] = 'logo';
    		    $data['status'] = '0';
    		    $data['created_by'] = '0';
    		    $insert = DB::table('settings')->insert($data);
    		    if($insert)
    		    {
    		        Session::put('success','logo upload successfully!');
    				return Redirect::to('settings/frontend-settings');
    		    }
    		    else
    		    {
    		        Session::put('error','Something went wrong!');
    				return Redirect::to('settings/frontend-settings');
    		    }
    		}
    		else
    		    {
    		        Session::put('error','Something went wrong!');
    				return Redirect::to('settings/frontend-settings');
    		    }
        }
    }
    
    public function changelogoSettings($id)
    {
        $update_data = array();
        $update_data['status'] = '0';
        $update = DB::table('settings')->where('type','logo')->update($update_data);
        if($update)
        {
            $change_data = array();
            $change_data['status'] = '1';
            $change = DB::table('settings')->where('setting_id',$id)->update($change_data);
            if($change)
            {
                Session::put('success','logo active now!');
    			return Redirect::to('settings/frontend-settings');
            }
            else
    		    {
    		        Session::put('error','Something went wrong!');
    				return Redirect::to('settings/frontend-settings');
    		    }
        }
        else
    		    {
    		        Session::put('error','Something went wrong!');
    				return Redirect::to('settings/frontend-settings');
    		    }
    }
    
    public function deletelogoSettings($id)
    {
        $delete = DB::table('settings')->where('setting_id',$id)->delete();
        if($delete)
        {
            Session::put('success','logo delete successfully!');
    		return Redirect::to('settings/frontend-settings');
        }
        else
    		    {
    		        Session::put('error','Something went wrong!');
    				return Redirect::to('settings/frontend-settings');
    		    }
    }
    
    public function sliderData(Request $request)
    {
        if($request->ajax())
        {
            $data = DB::table('settings')->where('type','slider')->orderBy('setting_id','desc')->get();
            echo json_encode($data);
        }
    }
    
    public function sliderSettings(Request $request)
    {
        $slider_image = $request->file('s_img');
        $slider_name = str_random(20);
    		$ext = strtolower($slider_image->getClientOriginalExtension());
    		$slider_full_name = $slider_name.'.'.$ext;
    		$upload_path = 'public/images/slider_img/';
    		$image_url = $slider_full_name;
    		$success = $slider_image->move($upload_path,$slider_full_name);
    		
    		if($success)
    		{
    		    $data = array();
    		    $data['image'] = $image_url;
    		    $data['type'] = 'slider';
    		    $data['title'] = $request->title;
    		    $data['description'] = $request->desc;
    		    $data['content'] = 'slider';
    		    $data['status'] = '1';
    		    $data['created_by'] = '0';
    		    $insert = DB::table('settings')->insert($data);
    		    if($insert)
    		    {
    		        echo json_encode(['status'=>'success']);
    		    }
    		    else
    		    {
    		        echo json_encode(['status'=>'error']);
    		    }
    		}
    		else
    		{
    		    echo json_encode(['status'=>'error']);
    		}
    }
    
    public function sliderEdit(Request $request)
    {
        $id = $request->id;
        $data = DB::table('settings')->where('setting_id',$id)->first();
        $output = array(
            'title' => $data->title,
            'desc' => $data->description,
            's_img' => $data->image,
            );
        echo json_encode($output);
    }
    
    public function sliderUpdate(Request $request)
    {
        $id = $request->id;
         $slider_image = $request->file('edit_s_img');
        $slider_name = str_random(20);
    		$ext = strtolower($slider_image->getClientOriginalExtension());
    		$slider_full_name = $slider_name.'.'.$ext;
    		$upload_path = 'public/images/slider_img/';
    		$image_url = $upload_path.$slider_full_name;
    		$success = $slider_image->move($upload_path,$slider_full_name);
    		
    		if($success)
    		{
    		    $data = array();
    		    $data['image'] = $image_url;
    		    $data['title'] = $request->edit_title;
    		    $data['description'] = $request->edit_desc;
    		    $insert = DB::table('settings')->where('setting_id',$id)->update($data);
    		    if($insert)
    		    {
    		        echo json_encode(['status'=>'success']);
    		    }
    		    else
    		    {
    		        echo json_encode(['status'=>'error']);
    		    }
    		}
    		else
    		{
    		    echo json_encode(['status'=>'error']);
    		}
    }
    
    public function sliderDelete(Request $request)
    {
        $id = $request->id;
        $delete = DB::table('settings')->where('setting_id',$id)->delete();
        if($delete)
        {
            echo json_encode($delete);
        }
    }
    
    public function bannertopLeft(Request $request)
    {
        $banner_top_left_image = $request->file('img_top_left');
        $banner_top_left_name = str_random(20);
    		$ext = strtolower($banner_top_left_image->getClientOriginalExtension());
    		$banner_top_left_full_name = $banner_top_left_name.'.'.$ext;
    		$upload_path = 'public/images/banner_img/';
    		$image_url = $banner_top_left_full_name;
    		$success = $banner_top_left_image->move($upload_path,$banner_top_left_full_name);
    		
    		if($success)
    		{
    		    $data = array();
    		    $data['image'] = $image_url;
    		    $data['type'] = $request->banner_section;
    		    $data['title'] = 'Banner';
    		    $data['content'] = 'banner';
    		    $data['status'] = '0';
    		    $data['created_by'] = '0';
    		    $insert = DB::table('settings')->insert($data);
    		    if($insert)
    		    {
    		        echo json_encode(['status'=>'success']);
    		    }
    		    else
    		    {
    		        echo json_encode(['status'=>'error']);
    		    }
    		}
    		else
    		{
    		    echo json_encode(['status'=>'error']);
    		}
    }
    
    public function bannerChoose(Request $request)
    {
        $verify = $request->verify;
        $data = DB::table('settings')->where('type',$verify)->orderBy('setting_id','desc')->get();
        if($data)
        {
            echo json_encode($data);
        }
    }
    
    public function bannerUse(Request $request)
    {
        $id = $request->id;
        $ch = $request->check;
        $check = array();
        $check['status'] = '0';
        $recheck = DB::table('settings')->where('type',$ch)->update($check);
        $us = array();
        $us['status'] = '1';
        $use = DB::table('settings')->where('setting_id',$id)->update($us);
        if($use)
        {
            echo json_encode($use);
        }
    }
    
    public function bannerDelete(Request $request)
    {
        $id = $request->id;
        $delete = DB::table('settings')->where('setting_id',$id)->delete();
        if($delete)
        {
            echo json_encode($delete);
        }
    }
    
    public function backendSettings()
    {
    	return view($this->view_page_url.'backEndSettings');
    }
}
