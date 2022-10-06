<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tag;

class ShopController extends Controller
{
    public function free_shipping_products (){
        $products = Product::where('free_shipping',1)->orderBy('updated_at','desc');
        $productsCount = $products->count();
        $free_shipping_products =  $products->paginate(20);
        
        return view('pages.shops_page.shop',compact('free_shipping_products', 'productsCount'));
    }

    public function categoryProducts(Category $category){
        $categoryProduct = $category->products()->paginate(1);
        $categoryName = $category->cat_name;
        $productsCount = $category->products()->count();
        return view('pages.shops_page.shop', compact('categoryProduct', 'categoryName','productsCount'));
    }

    public function tagProducts (Tag $tag){
        $products = $tag->products();
        $productsCount = $products->count();
        $tagProducts = $products->paginate(1);
        $tagName = $tag->tag_name;
        return view('pages.shops_page.shop', compact('tagProducts','productsCount', 'tagName'));

    }
}
