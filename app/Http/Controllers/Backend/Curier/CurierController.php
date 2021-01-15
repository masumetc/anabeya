<?php

namespace App\Http\Controllers\Backend\Curier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Backend\Models\Curier\Curier;
use App\Backend\Models\Curier\CurierUnit;
use App\User;
use Carbon\Carbon;
use App\Custom\Helper;
use DB,Session;
use Auth;
use Image;
use File;
class CurierController extends Controller
{
    public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.curier.';
	} 

    public function curier()
    {
       
        $curierUnits = CurierUnit::whereIn('status',[1,0])->groupBy('user_id')->get();
        return view($this->view_page_url.'curier',compact('curierUnits'));
    }
    public function curierProfile()
    {
    	return view($this->view_page_url.'curierProfile');
    }

     public function saveCurier(Request $request)
    {
        //return $request->all();
        $request->validate([
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8','confirmed'],
        ]);

        DB::beginTransaction();
        try{
            $saveCurierUserId   = User::insertGetId([
                'name'          => $request->name,
                'user_name'     => $request->user_name,
                'email'         => $request->email,
                'mobile'        => $request->mobile,
                'user_country'  => $request->user_country,
                'user_city'     => $request->user_city,
                'user_zip'      => $request->user_zip,
                'user_address'  => $request->user_address,
                'role'          => 'curier',
                'user_type'     => 'curier',
                'password'      => Hash::make($request->password),
                'created_by'    => Auth::user()->id,
                'created_at'    => Carbon::now()
            ]);

              if($saveCurierUserId){
                    if ($request->hasFile('profile_img')) {
                    $pimage = $request->file('profile_img');
                    $fileName = $saveCurierUserId. '-' .time() . '.' . $pimage->getClientOriginalExtension();
                    $img = Image::make($pimage)->resize(250, 250)->save(public_path('images/users/' . $fileName));
                        if($fileName != null){
                            $uploadImage = User::where('id',$saveCurierUserId)
                                ->update([
                                    'profile_img' => $fileName,
                                    'updated_by'  => Auth::user()->id,
                                    'updated_at'  => Carbon::now()
                                ]);
                        }    
                    }

                $saveCurier         = Curier::insertGetId([
                    'user_id'       => $saveCurierUserId,
                    'name'          => $request->c_name,
                    'default_link'  => $request->default_link,
                    'created_by'    => Auth::user()->id,
                    'created_at'    => Carbon::now()
                ]);

                foreach ($request->curier_unit as $key=>$curier_unit) {
                    $saveCurier     = CurierUnit::insertGetId([
                    'user_id'       => $saveCurierUserId,
                    'unit_charge'   => $request->unit_charge[$key],
                    'curier_unit'   => $request->curier_unit[$key],
                    'created_by'    => Auth::user()->id,
                    'created_at'    => Carbon::now()
                ]);
                }
                

                DB::commit();
                Alert::success('success','Curier Added Successfully !!'); 
              }else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
              }
        }catch(\Exception $e){
            return $e;
            DB::rollback();
            Alert::warning('warning','Something Went Wrong !!!');
        }
        return redirect()->back();
    }

    public function curierUnitEdit($id)
    {
        $user = User::where('id',$id)->first();
        return view($this->view_page_url.'curierEdit',compact('user'));
    }

    public function UpdateCurierUnit(Request $request,$curierUserId)
    {
        //echo $curierId;
        $findCurierUser = User::where('id',$curierUserId)->first();

        if($findCurierUser){
            DB::beginTransaction();
        try{
            $updateCurierUser  = User::where('id',$findCurierUser->id)
            ->update([
                'name'          => $request->name,
                'user_name'     => $request->user_name,
                'email'         => $request->email,
                'mobile'        => $request->mobile,
                'user_country'  => $request->user_country,
                'user_city'     => $request->user_city,
                'user_zip'      => $request->user_zip,
                'user_address'  => $request->user_address,
                'role'          => 'curier',
                'user_type'     => 'curier',
                'password'      => Hash::make($request->password),
                'updated_by'    => Auth::user()->id,
                'updated_at'    => Carbon::now()
            ]);

              if($updateCurierUser){
                    if ($request->hasFile('profile_img')) {
                    $pimage = $request->file('profile_img');
                    $fileName = $findCurierUser->id. '-' .time() . '.' . $pimage->getClientOriginalExtension();
                    $img = Image::make($pimage)->resize(250, 250)->save(public_path('images/users/' . $fileName));
                        if($fileName != null){
                            $uploadImage = User::where('id',$findCurierUser->id)
                                ->update([
                                    'profile_img' => $fileName,
                                    'updated_by'  => Auth::user()->id,
                                    'updated_at'  => Carbon::now()
                                ]);
                        } 

                        if ($findCurierUser->profile_img != $fileName) {
                            $oldImagePath = 'images/users/'.$findCurierUser->profile_img;
                            File::delete(public_path($oldImagePath));
                        }   
                    }

                $updateCurier         = Curier::where('user_id',$findCurierUser->id)
                ->update([
                    'user_id'       => $findCurierUser->id,
                    'name'          => $request->c_name,
                    'default_link'  => $request->default_link,
                    'updated_by'    => Auth::user()->id,
                    'updated_at'    => Carbon::now()
                ]);

            if(isset($request->curierUnit)){
                foreach ($request->curierUnit as $key=>$curierUnit) {
                    if(!is_null($curierUnit['curier_unit_id'])){
                        if(isset($curierUnit['curier_unit'])){
                            $updateCurierUnit = CurierUnit::updateOrCreate(
                                [
                                    'curier_unit_id' => $curierUnit['curier_unit_id']
                                ],[
                                    'curier_unit' =>$curierUnit['curier_unit'],
                                    'unit_charge' =>$curierUnit['unit_charge'],
                                ]);
                        }
                    }
                }

            }
                DB::commit();
                Alert::success('success','Curier Updated Successfully !!'); 
              }else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
              }
        }catch(\Exception $e){
            return $e;
            DB::rollback();
            Alert::warning('warning','Something Went Wrong !!!');
        }
        }
        return redirect()->route('curier.curier');
    }

     public function statusUpdate($modelReference,$action,$id)
    {
        $modelName = '';
        $stringToArryConvert = explode("-",$modelReference);
        foreach ($stringToArryConvert as $value) {
             $modelName .= ucwords($value);
         }
         $arrayToStringConvert = implode("_",$stringToArryConvert);
         //$filterColumn = $arrayToStringConvert."_id";
         $filterColumn = "user_id";
         $modelPath = 'App\Backend\Models\Curier\\'.$modelName;
         $model = new $modelPath();
        try{
            DB::beginTransaction();
            $result = $model::where($filterColumn,$id)
                    ->update([
                        'status' =>Helper::getStatus($action),
                        'updated_by'    => Auth::user()->id,
                        'updated_at'    => Carbon::now()
                    ]);
            if($result){
                DB::commit();
                return response()->json(['success' => true, 'message' => ucwords($action) . ' Successfull !!']);
            }else{
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
            }       
        }catch(\Exception $e){
            DB::rollback();
            return $e;
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
    }     
}
    

}
