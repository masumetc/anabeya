<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Backend\Models\Category\Category;
use Carbon\Carbon;
use App\Custom\Helper;
use DB,Session;
use Auth;
use Image;
use File;
class CategoryController extends Controller
{
    
    public $view_page_url;

    public function __construct()
    {
        $this->view_page_url = 'Backend.category.';
    } 

    public function viewCategory()
    {
        $getCategories = ['0' => 'None'] +
                    Category::where('status','=', [1])
                    ->where('parent_id','=','0')
                    ->pluck('name','category_id')
                    ->all();
        $get_subCategories = ['0' => 'None'] +
                    Category::where('status','=', [1])
                    ->where('parent_id','>','0')
                    ->where('sub_parent_id','=','0')
                    ->pluck('name','category_id')
                    ->all();
        // echo '<pre>';
        // print_r($get_subCategories);
        // exit();
        $categories = Category::whereIn('status',[0,1])->get();
        return view($this->view_page_url.'viewCategory',compact('categories','getCategories','get_subCategories'));
    }

    public function categorySettings()
    {
        return view($this->view_page_url.'categorySettings');
    }

    public function addCategoryModal()
    {   
        $getCategories = ['0' => 'None'] +
                    Category::where('status','=', [1])
                    ->where('parent_id','=','0')
                    ->pluck('name','category_id')
                    ->all();
        $get_subCategories = ['0' => 'None'] +
                    Category::where('status','=', [1])
                    ->where('parent_id','>','0')
                    ->where('sub_parent_id','=','0')
                    ->pluck('name','category_id')
                    ->all();
        return view($this->view_page_url.'addCategoryModal',compact('getCategories','get_subCategories'));
    }

    public function saveCategoryModal(CategoryRequest $request)
    {
        //return $request->all();
        $this->validate($request, [
            'name' => 'required',
            'parent_id' => 'required',
            'sub_parent_id' => 'required',
            'description' => 'required',
            'menu_type' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $saveCatId = Category::insertGetId([
                'name'          => $request->name,
                'parent_id'     => $request->parent_id,
                'sub_parent_id' => $request->sub_parent_id,
                'description'   => $request->description,
                'menu_type'     => $request->menu_type,
                'created_by'    => Auth::user()->id,
                'created_at'    => Carbon::now()
            ]);
              if($saveCatId){
                    if ($request->hasFile('image')) {
                    $pimage = $request->file('image');
                    $fileName = $saveCatId. '-' .time() . '.' . $pimage->getClientOriginalExtension();
                    $img = Image::make($pimage)->resize(250, 250)->save(public_path('images/category_image/' . $fileName));
                        if($fileName != null){
                            $uploadImage = Category::where('category_id',$saveCatId)
                                ->update([
                                    'image' => $fileName,
                                    'updated_by'    => Auth::user()->id,
                                    'updated_at'    => Carbon::now()
                                ]);
                        }    
                }
                DB::commit();
                Alert::success('success','Category Save Successfully !!'); 
              }else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
            }  
        }catch(\Excaption $e){
            //return $e;
            DB::rollback();
            Alert::error('warning', $e->errorInfo[2]);
        }
        return redirect()->route('category.view-category');
    }

     public function statusUpdate($modelReference,$action,$id)
    {
        $modelName = '';
        $stringToArryConvert = explode("-",$modelReference);
        foreach ($stringToArryConvert as $value) {
             $modelName .= ucwords($value);
         }
         $arrayToStringConvert = implode("_",$stringToArryConvert);
         $filterColumn = $arrayToStringConvert."_id";
         $modelPath = 'App\Backend\Models\Category\\'.$modelName;
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
            //return $e;
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
    }     
}

   public function updateSaveCategory(CategoryRequest $request)
    {
        //return $request->all();
        try{
            DB::beginTransaction();
            $updateCategory = Category::where('category_id',$request->category_id)
                ->update([
                    'name'          =>$request->name,
                    'parent_id'     => $request->parent_id,
                    'sub_parent_id' => $request->sub_parent_id,
                    'description'   => $request->description,
                    'menu_type'     => $request->menu_type,
                    'updated_by'    => Auth::user()->id,
                    'updated_at'    => Carbon::now()
                ]);
   
            if($updateCategory){
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Category Updated Successfully !!']);
            }else {
                DB::rollback();
                return response()->json(['error' => true, 'message' => 'Something Went Wrong !!']);
            }    
        }catch(\Exception $e){
            DB::rollback();
            //return $e;
            return response()->json(['error' => true, 'message' => $e->errorInfo[2]]);
        }
    }

    public function categoryImageEdit(Request $request,$catId)
    {
        //echo $catId;
        $editCategoryImage = Category::where('category_id',$catId)->first();
        return view($this->view_page_url.'categoryImageEdit',compact('editCategoryImage'));
    }

    public function categoryImageUpdate(Request $request,$catId)
    {
        $category = Category::where('category_id',$catId)->first();
        if($category){
            DB::beginTransaction();
            try{
                if($request->hasFile('files')){
                        $catImage = $request->file('files');
                        $fileName = $category->category_id . '-' .time() . '.' .$catImage->getClientOriginalExtension();
                    $img = Image::make($catImage)->resize(250, 250)->save(public_path('images/category_image/' . $fileName));
                    if($fileName != null){
                        $updateImage = Category::where('category_id',$category->category_id)
                            ->update([
                                'image' => $fileName,
                                'updated_by'    => Auth::user()->id,
                                'updated_at'    => Carbon::now()
                            ]);
                       }

                        if ($category->image != $fileName) {
                            $oldImagePath = 'images/category_image/'.$category->image;
                            File::delete(public_path($oldImagePath));
                        }
                
                    DB::commit();
                    Alert::success('success','Category Image updated Successfully !!');
                }else{
                    DB::rollback();
                    Alert::warning('warning','Something Went Wrong !!');
                }   
            }catch(\Exception $e){
                DB::rollback();
                return $e;
                Session::flash('error',$e->errorInfo[2]);
            }
        }
        return redirect()->route('category.view-category');
        
    }
}
