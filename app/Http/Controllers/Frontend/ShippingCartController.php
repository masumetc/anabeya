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
use App\Custom\Helper;
use App\User;
use App\Currency;
use App\CurrencySession;
use Session,DB,Auth,Image,File,Cart;
use Illuminate\Support\Facades\Cookie;

class ShippingCartController extends Controller
{
    
    public function addToCart(Request $request)
    {
        //return $request->all();
        $product  = Product::where('status',1)
                 ->where('product_id',$request->product_id)
                 ->first();
        $curier = Curier::where('curier_id',$request->curier_id)->first();
        $curierUnit = CurierUnit::where('status',1)
                     ->where('user_id',$curier->user_id)
                     ->where('curier_unit',$product->curier_unit)
                     ->first();
        $price_chart = PriceChart::where('product_id', $request->product_id)->first();

        foreach ($product->productImages as $imgkey=> $productImage) {
            if($imgkey == 0){
              $image = $productImage->image; 
            }   
        }

        foreach ($product->priceCharts as $chartkey=> $priceChart) {
            if($chartkey == 0){
              $discountPrice = $priceChart->discount_price; 
            }   
        }     
         
        Cart::add(array(
            'id' => $product->product_id, // inique row ID
            'name' => $product->title,
            'price' => $discountPrice,
            'quantity' => $request->quantity,
            'attributes' => array(
                'product_id' => $request->product_id,
                'image' => $image,
                'unit_charge' => $curierUnit->unit_charge,
                'curier_id' => $curier->curier_id,
                'seller_id' => $product->seller_id,
                'color' => $price_chart->color,
                'size' => $price_chart->size,
                'color_image' => $price_chart->color_image,
                )
        ));         
               
        return redirect()->route('product.view-cart');
    }

    public function viewCart()
    {
        //for currency show
        $value = Cookie::get('currency_id');
        if ($value != null){
                $currency = Currency::find($value);
        }else{
            $currency = Currency::find(1);
        }
        
        $cartCollection = Cart::getContent();
        return view('Frontend.product.viewCart',compact('cartCollection', 'currency'));
    }

    public function deleteToCart($productId)
    {
        Cart::remove($productId);
        return redirect()->route('product.view-cart');
    }

    public function updteCart(Request $request)
    {
       Cart::update($request->product_id, array(
            'quantity' => array(
            'relative' => false,
            'value'    => $request->update_quantity
            ),
        ));
       return redirect()->route('product.view-cart'); 
    }
   

}
