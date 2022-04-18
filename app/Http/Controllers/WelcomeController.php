<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\Tag;
use App\Models\product;
use DB;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function welcome(){
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->get();
        $brands = Brand::latest()->get();
        $tags = Tag::take(20)->get();
        $products = Product::all(); 
        
        return view ('welcome',compact(
            'sliders',
            'brands',
            'tags',
            'products'
        ));
    }

    public function product_show(Product $product){
        return view('pages.product_show',compact('product'));
    }
}
