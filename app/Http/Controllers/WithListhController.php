<?php

namespace App\Http\Controllers;

use Session,DB,Auth,Image,File,Cart;
use App\Wish;
use App\Backend\Models\Shop\Product;
use App\Backend\Models\Shop\ProductImage;
use Illuminate\Http\Request;
use App\Backend\Models\Shop\PriceChart;

class WithListhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::check()){
           $wishs = Wish::where('customer_id', Auth::user()->id)->get();
           $user = Auth::user();
            return view('Frontend.wish_list', compact('wishs', 'user'));
       }else{
           return redirect()->route('login');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $wish = Wish::where('product_id', $id)->where('customer_id', Auth::user()->id)->first();
            if($wish){
                return redirect()->back()->with('error','Porduct already added your wish list :)');
            }else{
                $product = Product::find($id);
                $price_chart = PriceChart::where('product_id', $id)->first();
                $product_image = ProductImage::where('product_id', $id)->first();
                
                $wish = new Wish();
                $wish->product_id = $product->product_id;
                $wish->customer_id = Auth::user()->id;
                $wish->product_name = $product->title;
                
                $wish->price = $price_chart->regular_price;
                $wish->discount_price = $price_chart->discount_price;
                $wish->image = $product_image->image;
                $wish->save();
                
                return redirect()->back()->with('success','Porduct added your wish list :)');
            }
        }else{
            return redirect()->route('login');
        }
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function wishDelete($id){
        $wish = Wish::find($id);
        $wish->delete();
        return redirect()->back()->with('success','Porduct delete from your wish list :)');
    }
}
