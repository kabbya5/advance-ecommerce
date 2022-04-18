<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;

class WishlistController extends Controller
{
    public function add($id){
        $userid = Auth::id();
        $check = Wishlist::where('user_id',$userid)->where('product_id',$id)->first();

        if(Auth::check()){
            if($check){
                return response()->json(['error' => 'Product Already Has on Your Wishlist']);
                
            }else{
                Wishlist::create([
                    'product_id' => $id,
                    'user_id' => $userid, 
                ]);
                
                return response()->jsone(['success' => 'Product Added On Wishlist']);
            }
            
        }else{
            return response()->json(['error'=> 'At First Loging Your Account']);
        }
    }
}
