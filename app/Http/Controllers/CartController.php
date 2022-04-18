<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;
use Cart;

class CartController extends Controller
{
    public function addCart($id){
        
        // get product first image 
        $product_id = DB::table('product_images')->where('product_id', $id)->first();
        $image_id = $product_id->image_id;
        $image = DB::table('images')->where('id' ,$image_id)->first();

        $product = Product::find($id);
        $cart['id'] = $product->id;
        $cart['name'] = $product->product_name;
        $cart['qty'] = 1; 
        $cart['weight'] = 1;
        $cart['options']['image'] = $image->img_path;
        $cart['options']['seller_id'] = $product->seller_id;

        if($product->discount_price){
            $cart['price'] = $product->discount_price;
        }else{
            $cart['price'] = $product->selling_price;
        }
        Cart::add($cart);
        
        return response()->json(['success' =>'Successfully Add Cart']);    
    }

    public function cartCheckout(){      
        return view('pages.cart.checkout',['carts' => Cart::content()]);
    }

    public function cartDestroy($id){
        Cart::remove($id);
        return back()->with('message','Successfully Proudct Remove From Cart');   
    }
}
