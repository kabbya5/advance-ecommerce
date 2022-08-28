<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Cart;
use Session;
use App\Models\Coupon;
use App\Models\DeliveryCharge;
class CartController extends Controller
{
    public function addCart($id){
        
        // get product first image 
        $product_id = DB::table('product_images')->where('product_id', $id)->first();
        $image_id = $product_id->image_id;
        $image = DB::table('images')->where('id' ,$image_id)->first();

        $product = Product::find($id);

        $cart = array();
        $cart['id'] = $product->id;
        $cart['name'] = $product->slug;
        $cart['qty'] = 1; 
        $cart['weight'] = 1;
        $cart['options']['image'] = $image->img_path;
        $cart['options']['seller_id'] = $product->seller_id;
        $cart['options']['color'] = '';
        $cart['options']['size'] = '';

        if($product->free_shipping == 1){
            $cart['options']['free_shipping'] = 'free-shipping';
        }

        if($product->discount_price){
            $cart['price'] = $product->discount_price;
        }else{
            $cart['price'] = $product->selling_price;
        }
        Cart::add($cart);
        
        return response()->json(['success' =>'Successfully Add Cart']);    
    }

    public function cart(){    
        $carts = Cart::content();
        foreach($carts as $cart){
            if($cart->options->free_shipping== 'free-shipping'){
                Session::put('charge',[
                    'charge' => 0
                ]); 
            }else{
                Session::put('charge',[
                    'charge' => DeliveryCharge::max('charge')
                ]); 
            }
        }

        
        Session::put('payment',[
            'method' => 'cod'
        ]); 
        return view('pages.cart.cart',compact('carts'));
    }

    public function updateColor(Request $request,$color, $id){
        //get cart
        $cart = Cart::get($id); 
        $option = $cart->options->merge(['color' => $color]);
        Cart::update($id, ['options' => $option]);
        
        return response()->json(['success' => "updated color successfully"]);
    }
    public function updateSize(Request $request,$size, $id){
        //get cart
        $cart = Cart::get($id); 
        $option = $cart->options->merge(['size' => $size]);
        Cart::update($id, ['options' => $option]);
        
        return response()->json(['success' => "Updated size successfully"]);
    }
    public function updateQty(Request $request,$qty,$id){
        Cart::update($id,$qty);
        return response()->json(['success' => "Updated qty successfully"]);
    }

    public function cartDestroy($id){
        Cart::remove($id);
        return back()->with('message','Successfully Proudct Remove From Cart');   
    }
    //apply Coupon 

    public function applyCoupon(Request $request){
        $coupon = $request->coupon;
        $check_coupon = Coupon::where('coupon_name',$coupon)->first();

        if($check_coupon){
            $subTotal =  (int)str_replace(',', '', Cart::Subtotal());
            $amount = $check_coupon->discount;
            $persenInAmount = $amount/number_format(100);
            $discount =  $subTotal * $persenInAmount;
            $finalAmount = $subTotal - $discount;

            Session::put('coupon',[
                'name' => $check_coupon->coupon_name,
                'couponPersent' =>$amount,
                'discount' => $discount,
                'finalAmount' => $finalAmount,
            ]);
  
            return back()->with('message','Successfully Coupon Added');
        }
        else{
            return back()->with('error','Invalid Coupon');
        }
    }


    // coppon remove
    public function couponRemove(){
        Session::forget('coupon');
        return back()->with('message',"Successfully Coupon Removed");
    }
}
