<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Backend\Models\Category\Category;
use App\Backend\Models\Brand\Brand;
use App\Backend\Models\Shop\Product;
use App\Backend\Models\Shop\ProductImage;
use App\Backend\Models\Shop\PriceChart;
use App\Backend\Models\Curier\Curier;
use App\Backend\Models\Curier\CurierUnit;
use Illuminate\Support\Facades\Hash;
use App\Custom\Helper;
use Carbon\Carbon;
use App\User;
use App\Review;
use App\Currency;
use App\CurrencySession;
use Session,DB,Auth,Image,File;
use Illuminate\Support\Facades\Cookie;
use Validator, Input, Redirect; 

class HomeController extends Controller
{
    // public function index()
    // {
        
    //     $bannerTopleft     = $this->bannerTopleft(); 
    //     $bannerBottomleft  = $this->bannerBottomleft();  
    //     $bannerCenter      = $this->bannerCenter();
    //     $bannerTopright    = $this->bannerTopright();
    //     $bannerBottomright = $this->bannerBottomright();  
    //     $categories =        self::categoryShow();  
      
    //     $topFlashSellProducts = Product::where('status',1)
    //                   ->orderBy('product_id','DESC')
    //                   ->take(6)
    //                   ->get();
    //     $normalProducts = Product::where('status',1)
    //                   ->orderBy('product_id','DESC')
    //                   ->take(18)
    //                   ->get();              
    //     return view('Frontend.index',compact('topFlashSellProducts','normalProducts','bannerTopleft','bannerBottomleft','bannerCenter','bannerTopright','bannerBottomright','categories'));
    // }
    public function index()
    {
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
                $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }

        $bannerTopleft     = $this->bannerTopleft(); 
        $bannerBottomleft  = $this->bannerBottomleft();  
        $bannerCenter      = $this->bannerCenter();
        $bannerTopright    = $this->bannerTopright();
        $bannerBottomright = $this->bannerBottomright();                      
        $logo = $this->logo();                      
      
        $topFlashSellProducts = Product::where('status',1)
                        ->with('reviews')
                       ->orderBy('product_id','DESC')
                       ->take(6)
                      ->get();
                      
    
       $normalProducts = Product::where('status',1)
                       ->orderBy('product_id','DESC')
                       ->with('reviews')
                       ->take(18)
                       ->select('products.*')
                       //->get();
                       ->paginate(18);    
                       
              
        // $slider = DB::table('settings')->where('type','slider')->get();
        

        
        $slider = DB::table('settings')->where('type','slider')
                        ->OrderBy('setting_id','DESC')
                        ->get();
                        // echo "<pre>";
                        // dd($slider);exit();
        $categories = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','0')
                        ->where('sub_parent_id','0')
                        ->get(); 
        $categories_sub = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','>','0')
                        ->where('sub_parent_id','0')
                        ->get(); 
        $categories_sub_parent = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','>','0')
                        ->where('sub_parent_id','>','0')
                        ->get();      
        return view('Frontend.index',compact('topFlashSellProducts','normalProducts','bannerTopleft','bannerBottomleft','bannerCenter','bannerTopright','bannerBottomright','slider','categories', 'currency', 'logo', 'categories_sub', 'categories_sub_parent'));
        
    }
    public function flashsell()
    {
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
                $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }
                             
        $logo = $this->logo();                      
      
        $topFlashSellProducts = Product::where('status',1)
                       ->orderBy('product_id','DESC')
                      ->get();
        $categories = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','0')
                        ->where('sub_parent_id','0')
                        ->get(); 
        $categories_sub = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','>','0')
                        ->where('sub_parent_id','0')
                        ->get(); 
        $categories_sub_parent = DB::table('categories')
                        ->where('status','1')
                        ->where('parent_id','>','0')
                        ->where('sub_parent_id','>','0')
                        ->get();      
        return view('Frontend.flashsell',compact('topFlashSellProducts','categories', 'currency', 'logo', 'categories_sub', 'categories_sub_parent'));
        
    }

    protected function bannerTopleft()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','banner_top_left')
                    ->get();
    }
    
    protected function bannerBottomleft()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','banner_bottom_left')
                    ->get(); 
    }
    
    protected function bannerCenter()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','banner_center')
                    ->get();   
    }
    
    protected function bannerTopright()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','banner_top_right')
                    ->get();  
    }
    
    protected function bannerBottomright()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','banner_bottom_right')
                    ->get();
    }
    protected function logo()
    {
        return  DB::table('settings')
                    ->where('status',1)
                    ->where('type','logo')
                    ->get();
    }
    
    public static function categoryShow()
    {
        return Category::where('status',1)->get();
    }
    
    public function singleProductView($productId)
    {
        
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
                $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }
        
        $reviews = Review::where('product_id', $productId)->orderBy('id', 'desc')->paginate(3);
        
         $getSingleProducts = Product::where('product_id',$productId)
                                ->with('reviews')
                                 ->get();
          $recomandedProducts = self::recomandedProduct($productId);
          $results = self::curierNameWiseUnitCharge($productId);                                              
         return view('Frontend.product.singleProductView',compact('getSingleProducts','recomandedProducts', 'currency','results', 'reviews'));
    } 
    
    public static function curierNameWiseUnitCharge($productId)
    {
      $product = Product::where('product_id',$productId)
                    ->first(); 

      $cuerierUnits = CurierUnit::where('status',1)
                      ->where('curier_unit',$product->curier_unit)
                      ->get();

          foreach ($cuerierUnits as $cuerierUnit) {
              $results[$cuerierUnit->unit_charge.'#'.$cuerierUnit->user_id][] = Curier::where('status',1)
                             ->where('user_id',$cuerierUnit->user_id) 
                             ->get();  
              }  
           return $results;                                   
    }
    
    public static function recomandedProduct($productId)
    {
        $catId = [];
        $getSingleProducts = Product::where('product_id',$productId)->get();
            foreach ($getSingleProducts as $getSingleProduct) {
                 $catId[] =  $getSingleProduct->category_id;                     
            }                         
        return Product::whereIn('category_id',$catId)->orderBy('product_id','DESC')->take(3)->get();                            

    }
    
    public function frontendUserRegistration()
    {
        return view('Frontend.userRegistration');
    }
    
//Help controller Start
    public function tarmsCondition()
    {
        return view('Frontend.tarmsCondition');
    }
    
    public function privacyPolicy()
    {
        return view('Frontend.privacyPolicy');
    }
    public function helpCenter()
    {
        return view('Frontend.helpCenter');
    }
    public function aboutanabeya()
    {
        return view('Frontend.aboutanabeya');
    }
    public function contactus()
    {
        return view('Frontend.contactus');
    }
    public function trackorder()
    {
        $curierUnits = CurierUnit::whereIn('status',[1,0])->groupBy('user_id')->get();
        return view('Frontend.trackorder',compact('curierUnits'));
    }
    public function affiliate()
    {
        return view('Frontend.affiliate');
    }
//Help Controller end
    public function userLogin()
    {
        return view('Frontend.userLogin');
    }
    public function category($id=NULL){
        if(isset($id)){
            $category = DB::table('categories')->where('category_id',$id)->get();      
            $product=Product::where('category_id',$id)
                       ->orderBy('product_id','DESC')
                      ->get(); 
        }
        return view('Frontend.category',compact('category','product'));
    }
    
       public function categoryWiseProduct($catId)
    {
        //return $catId;
        $category = Category::where('status',1)->where('category_id',$catId)->first();
        //for currency show
        $sid = Session::getId();
        $session_id = CurrencySession::where('sid', $sid)->get();
        if ($session_id->count() != null){
            foreach ($session_id as $session_idn){
                $currency = Currency::find($session_idn->currency_id);
            }
        }else{
            $currency = Currency::find('2');
        }
        // echo '<pre>';
        // print_r($category);
        // exit();
        $products = Product::join('product_image','product_image.product_id','=','products.product_id')
                    ->join('price_charts','price_charts.product_id','=','products.product_id')
                    ->where('products.status',1)
                    ->where('products.category_id',$category->category_id)
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
                    ->paginate(18);
        return view('Frontend.product.categoryWiseProduct',compact('products','currency','category'));
    }
   

//=====================@@Frontend Seller Panel Start@@=============

    public function sellerLogin()
    {
        return view('Frontend.sellerLogin');
    }

    public function sellerRegistration()
    {
        return view('Frontend.sellerRegistration');
    }

   public function saveSellerRegistration(Request $request)
    {
        //return $request->all();
        DB::beginTransaction();
        try{
            if($request->collect_city == '' && $request->collect_zip == '' && $request->collect_address == ''){
            $saveUserId         = User::insertGetId([
                'name'          => $request->name,
                'user_name'     => $request->user_name,
                'email'         => $request->email,
                'mobile'        => $request->mobile,
                'user_country'  => 'Bangladesh',
                'user_city'     => $request->user_city,
                'user_zip'      => $request->user_zip,
                'user_address'  => $request->user_address,
                'collect_country'  => 'Bangladesh',
                'collect_city'     => $request->user_city,
                'collect_zip'  => $request->user_zip,
                'collect_address'=> $request->user_address,
                'role'          => 'seller',
                'user_type'     => 'seller',
                'email_verify_code' => str_random(10),
                'status'        => '0',
                'password'      => Hash::make($request->password),
                'created_by'    => 1,
                'created_at'    => Carbon::now()
            ]);
            }else {
                $saveUserId     = User::insertGetId([
                'name'          => $request->name,
                'user_name'     => $request->user_name,
                'email'         => $request->email,
                'mobile'        => $request->mobile,
                'user_country'  => 'Bangladesh',
                'user_city'     => $request->user_city,
                'user_zip'      => $request->user_zip,
                'user_address'  => $request->user_address,
                'collect_country'  => 'Bangladesh',
                'collect_city'     => $request->collect_city,
                'collect_zip'  => $request->collect_zip,
                'collect_address'=> $request->collect_address,
                'role'          => 'seller',
                'user_type'     => 'seller',
                'email_verify_code' => str_random(10),
                'status'        => '0',
                'password'      => Hash::make($request->password),
                'created_by'    => 1,
                'created_at'    => Carbon::now()
            ]);
        }

         if($saveUserId){
            if ($request->hasFile('nid_front') && $request->hasFile('nid_back') && $request->hasFile('checkbook_image') && $request->hasFile('profile_img') && $request->hasFile('document_image')) {
                    $nidFrontImg = $request->file('nid_front');
                    $nidBackImg = $request->file('nid_back');
                    $checkBookImg = $request->file('checkbook_image');
                    $pimage = $request->file('profile_img');
                    $documentImage = $request->file('document_image');

                    $fileName1 = $saveUserId. '-' .time() . '.' . $nidFrontImg->getClientOriginalExtension();
                    $fileName2 = $saveUserId. '-' .time() . '.' . $nidBackImg->getClientOriginalExtension();
                    $fileName3 = $saveUserId. '-' .time() . '.' . $checkBookImg->getClientOriginalExtension();
                    $fileName4 = $saveUserId. '-' .time() . '.' . $pimage->getClientOriginalExtension();
                    $fileName5 = $saveUserId. '-' .time() . '.' . $documentImage->getClientOriginalExtension();

                    $img = Image::make($nidFrontImg)->resize(250, 250)->save(public_path('images/front_nid_image/' . $fileName1));
                    $img = Image::make($nidBackImg)->resize(250, 250)->save(public_path('images/back_nid_image/' . $fileName2));
                    $img = Image::make($checkBookImg)->resize(250, 250)->save(public_path('images/checkbook_image/' . $fileName3));
                    $img = Image::make($pimage)->resize(250, 250)->save(public_path('images/users/' . $fileName4));
                    $img = Image::make($documentImage)->resize(250, 250)->save(public_path('images/document_image/' . $fileName5));

                        if($fileName1 != null && $fileName2 != null && $fileName3 != null && $fileName4 != null && $fileName5 != null){
                            $uploadImage = User::where('id',$saveUserId)
                                ->update([
                                    'nid_front' => $fileName1,
                                    'nid_back' => $fileName2,
                                    'checkbook_image' => $fileName3,
                                    'profile_img' => $fileName4,
                                    'document_image' => $fileName5,
                                    'updated_by'  => 1,
                                    'updated_at'  => Carbon::now()
                                ]);
                        }    
                    }
                    $saveBrand     = Brand::insertGetId([
                    'seller_id'     => $saveUserId,
                    'name'          => $request->shop_name,
                    'created_by'    => 1,
                    'created_at'    => Carbon::now()
                ]);
                DB::commit();
                Alert::success('success','Seller Added Successfully !!'); 

         } else {
                DB::rollback();
                Alert::error('error','Something Went Wrong!!');
            }  
        }catch(\Exception $e){
            //return $e;
            DB::rollback();
            Alert::warning('warning',$e->errorInfo[2]);

        }
    return redirect()->route('seller-login');    
    }
//=====================@@Frontend Seller Panel End@@=============

    public function searchProduct(Request $request)
    {
    $value = Cookie::get('currency_id');
        if ($value != null){
                $currency = Currency::find($value);
        }else{
            $currency = Currency::find('2');
        } 
        
        $searchContent = trim($request->search_content);
        $query = Product::where('products.status',1);
            if(isset($request->search_content)){
                $searchProduct = $query->join('product_image','product_image.product_id','=','products.product_id')
                ->join('price_charts','price_charts.product_id','=','products.product_id')
                ->groupBy('product_image.product_id')
                ->groupBy('price_charts.product_id')
                ->where(function($qry) use ($searchContent){
                    $qry->where('products.title','like',"%$searchContent%")
                    ->orWhere('products.what_in_box','like',"%$searchContent%");
                })
                ->get([
                    'products.*',
                    'product_image.*',
                    'price_charts.*'
                ]);
        }else {
            $searchProduct = $query->join('product_image','product_image.product_id','=','products.product_id')
                ->join('price_charts','price_charts.product_id','=','products.product_id')
                ->groupBy('product_image.product_id')
                ->groupBy('price_charts.product_id')
                ->where('products.title','like',"%$searchContent%")
                ->orWhere('products.what_in_box','like',"%$searchContent%")
                ->get([
                    'products.*',
                    'product_image.*',
                    'price_charts.*'
                ]);
        }
    return view('Frontend.product.searchProduct',compact('searchProduct','currency'));
   } 

}


