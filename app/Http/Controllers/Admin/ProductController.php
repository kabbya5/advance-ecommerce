<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::latest()->get();
        return view ('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        return view('admin.product.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:30|unique:products,product_name,except,id',
            'product_quantity' => 'required',
            'selling_price' => 'required',     
        ]);
        $input = $request->except(['tag_id','slider_id','image_id']);
        $input['slug'] = str_slug($request->product_name);
        $input['seller_id'] = Auth::id();

        $tags_id = $request->tag_id;
        $tags = \App\Models\Tag::find($tags_id);

        $slider_id = $request->slider_id;
        $sliders = \App\Models\Slider::find($slider_id);

        $image_id = $request->image_id;
        $images = \App\Models\Image::find($image_id);

        $product = Product::create($input);

        $product->tags()->attach($tags);
        $product->images()->attach($images);
        $product->sliders()->attach($sliders);

        return back()->with('message','Successfully Product Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function status (Product $product)
    {
        $product->update([
            'status' => ($product->status == 1) ? 0:1,
        ]);

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|max:30|unique:products,product_name,'.$product->id,
            'product_quantity' => 'required',
            'selling_price' => 'required',     
        ]);
        
        $input = $request->except(['tag_id','slider_id','image_id',]);
        $input['slug'] = str_slug($request->product_name);
        $input['seller_id'] = Auth::id();

        if(! array_key_exists('upcomming',$input)){
            $input['upcomming'] = 0;
        }

        if(! array_key_exists('free_shipping',$input)){
            $input['free_shipping'] = 0;
        }

        $tags_id = $request->tag_id;
        $tags = \App\Models\Tag::find($tags_id);

        $slider_id = $request->slider_id;
        $sliders = \App\Models\Slider::find($slider_id);

        $image_id = $request->image_id;
        $images = \App\Models\Image::find($image_id);

        $product->update($input);

        $product->tags()->sync($tags);
        $product->images()->sync($images);
        $product->sliders()->sync($sliders);

        return redirect()->route('products.index')->with('message','Successfully Product Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->tags()->detach();
        $product->sliders()->detach();
        $product->images()->detach();
        $product->delete();

        return back()->with('message',"Successfully Product Delete");
    }
}
