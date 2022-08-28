<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\product;
use DB;
use Carbon\Carbon;
use Auth;
use App\Models\ResentView;

class WelcomeController extends Controller
{
    public function welcome(){
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->get();
        $brands = Brand::latest()->get();
        $tags = Tag::take(20)->get();
        $products = Product::all(); 
        $resent_view_products = ResentView::where('user_id',Auth::id())->orderBy('created_at','desc')->limit(15)->get();
        $free_shipping_products = Product::where('free_shipping',1)->latest()->take(20)->get();
        return view ('welcome',compact(
            'sliders',
            'brands',
            'tags',
            'products',
            'resent_view_products',
            'free_shipping_products',
        ));
    }

    public function product_show(Product $product){

        if(Auth::check()){
            $user_id = Auth::id();
            $array = [
                'user_id' =>$user_id,
                'product_id' => $product->id,
            ];
            $check = ResentView::where('product_id',$product->id)->where('user_id',$user_id)->first();
           
            if($check){
                $product->resentView()->update($array);
            }
            else{
                $product->resentView()->create($array);  
            }
            
        }
        return view('pages.product_show',compact('product'));    
    }
}
