<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function free_shipping_products (){
        $free_shipping_products = Product::where('free_shipping',1)->orderBy('updated_at','desc')->paginate(25);
        return view('pages.shops_page.free_shipping',compact('free_shipping_products'));
    }
}
