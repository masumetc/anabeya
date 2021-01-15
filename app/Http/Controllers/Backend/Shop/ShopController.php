<?php

namespace App\Http\Controllers\Backend\Shop;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Backend\Models\Category\Category;
use App\Backend\Models\Brand\Brand;
use App\Backend\Models\Shop\Product;
use App\Backend\Models\Shop\ProductImage;
use App\Backend\Models\Shop\PriceChart;
use App\User;
use Carbon\Carbon;
use App\Custom\Helper;
use DB,Session;
use Auth;
use Image;
use File;

class ShopController extends Controller
{
    
    public $view_page_url;

	public function __construct()
	{
		$this->view_page_url = 'Backend.shop.';
	} 

    public function product()
    {
         $sellerId = Auth::user()->id;
        if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
        $products = Product::join('product_image','product_image.product_id','=','products.product_id')
                    ->join('price_charts','price_charts.product_id','=','products.product_id')
                    ->whereIn('products.status',[0,1])
                    ->orderBy('products.product_id',"DESC")
                    ->groupBy('product_image.product_id')
                    ->groupBy('price_charts.product_id')
                    ->select([
                        'products.product_id',
                        'products.title',
                        'products.status',
                        'products.what_in_box',
                        'product_image.product_image_id',
                        'product_image.name',
                        'product_image.image',
                        'price_charts.price_chart_id',
                        'price_charts.discount_price',
                        'price_charts.regular_price',
                        'price_charts.color',
                        'price_charts.size',
                        'price_charts.comission'
                    ])
                    ->paginate(12);
                    
            }else {
                $products = Product::join('product_image','product_image.product_id','=','products.product_id')
                    ->join('price_charts','price_charts.product_id','=','products.product_id')
                    ->whereIn('products.status',[0,1])
                    ->where('seller_id',Auth::user()->id)
                    ->orderBy('products.product_id',"DESC")
                    ->groupBy('product_image.product_id')
                    ->groupBy('price_charts.product_id')
                    ->select([
                        'products.product_id',
                        'products.title',
                        'products.what_in_box',
                        'product_image.product_image_id',
                        'product_image.name',
                        'product_image.image',
                        'price_charts.price_chart_id',
                        'price_charts.discount_price',
                        'price_charts.regular_price',
                        'price_charts.color',
                        'price_charts.size',
                        'price_charts.comission'
                    ])
                    ->paginate(12);
            } 

    	return view($this->view_page_url.'product',compact('products'));
    }

    public function addProduct()
    {
        $sellerId = Auth::user()->id;

        if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){  
        $brands = ['' => 'Please Select a Brand'] +
                        Brand::where('status',1)
                        ->pluck('name','brand_id')
                        ->all();
        }else {
            $brands = ['' => 'Please Select a Brand'] +
                        Brand::where('status',1)
                        ->where('seller_id',$sellerId)
                        ->pluck('name','brand_id')
                        ->all();
        }

        $categories = ['' => 'Please Select a Category'] +
                        Category::where('status',1)
                        ->pluck('name','category_id')
                        ->all();
        return view($this->view_page_url.'addProduct',compact('categories','brands'));
    }

    public function saveProduct(Request $request)
    {
        //return $request->all();
        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'curier_unit' => 'required',
            'title' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'regular_price' => 'required',
        ]);
        $slug = $request->title;
        $productSlug = str_slug($slug, '-');
        DB::beginTransaction();
        try{
            $saveProduct = Product::insertGetId([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'seller_id' => Auth::user()->id,
                'curier_unit' => $request->curier_unit,
                'title' => $request->title,
                'what_in_box' => $request->what_in_box,
                'weight' => $request->weight,
                'cm' => $request->cm,
                'description' => $request->description,
                'slug' => Auth::user()->id. '-' .time(). '-' .$productSlug,
                //'cupon_check' => $request->cupon_check,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id
            ]);

            if($saveProduct){
                //image
                $data = $request->all();
                //$folderPath = '/images/product/';
                for ($i = 0; $i < count($data['name']); $i++) {
                     $fileName = $saveProduct.$i . '-' .time() . '.' .$data['image'][$i]->getClientOriginalExtension();
                     //return $fileName;
                $img = Image::make($data['image'][$i])->resize(700, 1200)->save(public_path('images/product/' . $fileName));
                    ProductImage::insert([
                            'product_id' => $saveProduct,
                            'name' => $data['name'][$i],
                            'image' => $fileName,
                            'created_at' => date('Y-m-d h:i:s'),
                            'created_by' => Auth::user()->id,
                        ]);
                }
                for ($i = 0; $i < count($data['color']); $i++) {
                     $fileName = $saveProduct.$i . '-' .time() . '.' .$data['files'][$i]->getClientOriginalExtension();
                     //return $fileName;
                $img = Image::make($data['files'][$i])->resize(50, 60)->save(public_path('images/color_image/' . $fileName));
                    PriceChart::insert([
                        'product_id'       => $saveProduct,
                        'color'            => $data['color'][$i],
                        'color_image'      => $fileName,
                        'size'             => $data['size'][$i],
                        'stock'            => $data['stock'][$i],
                        'regular_price'    => $data['regular_price'][$i],
                        'comission'        => $data['commission'][$i],
                        'discount_price'   => $data['regular_price'][$i]-($data['regular_price'][$i] * $data['commission'][$i]/100),
                        'created_at'       => date('Y-m-d h:i:s'),
                        'created_by'       => Auth::user()->id,
                    ]);
                }


                DB::commit();
                Alert::success('success','Product Save Successfully !!');
            }else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
            }
        }catch(\Exception $e){
            //return $e;
            DB::rollback();
            Alert::error('warning',$e->errorInfo[2]);
        } 
        return redirect()->route('product.product');
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
         $modelPath = 'App\Backend\Models\Shop\\'.$modelName;
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


    public function productViewDetails($productId)
    {
        $product = Product::join('product_image','product_image.product_id','=','products.product_id')
                    ->join('price_charts','price_charts.product_id','=','products.product_id')
                    ->where('products.product_id',$productId)
                    ->first();
         $category = Product::join('categories','categories.category_id','=','products.category_id')
            ->where('products.product_id',$productId)
            ->first();
        $brand = Product::join('brands','brands.brand_id','=','products.brand_id')
            ->where('products.product_id',$productId)
            ->first();    
        return view($this->view_page_url.'productViewDetails',compact('product','category','brand'));
    }

     //Only for developer
    public function testProduct()
    {
         $sellerId = Auth::user()->id;

        $brands = ['' => 'Please Select a Brand'] +
                        Brand::where('seller_id',$sellerId)
                        ->where('status',1)
                        ->pluck('name','brand_id')
                        ->all();

        $categories = ['' => 'Please Select a Category'] +
                        Category::where('status',1)
                        ->pluck('name','category_id')
                        ->all();
                  
         if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'manager'){
                $products = Product::whereIn('status',[0,1])
                         ->get();
            }else {
                $products = Product::whereIn('status',[0,1])
                         ->where('seller_id',Auth::user()->id)
                         ->get();
            }
              
        return view($this->view_page_url.'testProduct',compact('categories','brands','products'));
    }


    public function productEdit($productId)
    {
        $categories = Category::where('status',1)->get();
        $brands = Brand::where('status',1)->get();
        $product = Product::where('product_id',$productId)
                    ->first();
        return view($this->view_page_url.'productEdit',compact('categories','brands','product'));
    }

    public function updateProduct(Request $request,$productId)
    {
        //return $productId;
        //return $request->all();
        $findProduct = Product::where('product_id',$productId)->first();
        $slug = $request->title;
        $productSlug = str_slug($slug, '-');
        if($findProduct){
            DB::beginTransaction();
        try{
            $updateProduct = Product::where('product_id',$findProduct->product_id)
            ->update([
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'seller_id' => Auth::user()->id,
                'curier_unit' => $request->curier_unit,
                'title' => $request->title,
                'what_in_box' => $request->what_in_box,
                'weight' => $request->weight,
                'cm' => $request->cm,
                'description' => $request->description,
                'slug' => Auth::user()->id. '-' .time(). '-' .$productSlug,
                //'cupon_check' => $request->cupon_check,
                'created_at' => Carbon::now(),
                'created_by' => Auth::user()->id
            ]);

            if($updateProduct){
                if (isset($request->image)) {
                foreach ($request->image as $key => $image) {
                    if (!is_null($image['image_id'])) {
                        if(isset($image['product_image'])){
                            $fileName = $findProduct->product_id.$key. '-' .time().'-'.rand(100,2000) . '.' .$image['product_image']->getClientOriginalExtension();
                            //return $fileName;
                            $img = Image::make($image['product_image'])->resize(700, 1200)->save(public_path('images/product/' . $fileName));
                            if($fileName != null ){
                                $updateProductImg = ProductImage::updateOrCreate(
                                [
                                    'product_image_id' => $image['image_id']
                                ],[
                                    'name'  =>$image['name'],
                                    'image' =>$fileName,
                                    'updated_by' => Auth::user()->id,
                                    'updated_at' => Carbon::now()
                                ]);
                            }
                            
                         }   
                  }
                }
            }

            if (isset($request->chartPrice)) {
                foreach ($request->chartPrice as $key => $chartPriceProduct) {
                    if (!is_null($chartPriceProduct['image_id'])) { 
                    //if(isset($chartPriceProduct['color_image'])){
                    if (!empty($chartPriceProduct['color_image'])){
                        $fileNameColorImg = $findProduct->product_id.$key. '-' .time() .'-'.rand(500,500). '.' .$chartPriceProduct['color_image']->getClientOriginalExtension();
                            //return $fileNameColorImg;
                            $img = Image::make($chartPriceProduct['color_image'])->resize(50, 60)->save(public_path('images/color_image/' . $fileNameColorImg));
                            if($fileNameColorImg != null || $fileNameColorImg == null){
                                $updatePriceChart = PriceChart::updateOrCreate(
                                [
                                    'price_chart_id' => $chartPriceProduct['image_id']
                                ],[
                                'color'  =>$chartPriceProduct['color'],
                                'color_image' =>$fileNameColorImg,

                                'updated_by' => Auth::user()->id,
                                'updated_at' => Carbon::now()
                                ]);
                            }
                         } 
                          
                    }
                }
            }

                if (isset($request->chartPrice)) {
                foreach ($request->chartPrice as $key => $chartPriceProduct) {
                    if (!is_null($chartPriceProduct['price_chart_id'])) { 
                    //if(isset($chartPriceProduct['color_image'])){
                    if (!empty($chartPriceProduct['regular_price'])){
                                $updatePriceChart = PriceChart::updateOrCreate(
                                [
                                    'price_chart_id' => $chartPriceProduct['price_chart_id']
                                ],[
                                'color'  =>$chartPriceProduct['color'],
                                'size' =>$chartPriceProduct['size'],
                                'stock' =>$chartPriceProduct['stock'],
                                'regular_price' =>$chartPriceProduct['regular_price'],
                                'comission' =>$chartPriceProduct['comission'],

                                'discount_price' =>($chartPriceProduct['regular_price']-($chartPriceProduct['regular_price']*$chartPriceProduct['comission'])/100),
                                'updated_by' => Auth::user()->id,
                                'updated_at' => Carbon::now()
                                ]);
                            
                         } 
                          
                    }
                }
            }
                DB::commit();
                Alert::success('success','Product Updated Successfully !!');
            }else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
            }
        }catch(\Exception $e){
            return $e;
            DB::rollback();
            Alert::error('warning',$e->errorInfo[2]);
        } 
    }
        
        return redirect()->route('product.product');
    }

    public function productOrder()
    {
    	return view($this->view_page_url.'productOrder');
    }
    public function productCart()
    {
    	return view($this->view_page_url.'productCart');
    }
    public function productCheckout()
    {
    	return view($this->view_page_url.'productCheckout');
    }

    
}
