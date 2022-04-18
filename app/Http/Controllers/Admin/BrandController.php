<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = new Brand();
        return view('admin.brand.create',compact('brand'));
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
            'name' => "required|unique:brands,name,except,id",
            'brand_img' => 'required|mimes:jpg,jpeg,png,gif,svg',
        ]);

        $input = $request->except('old_brand_img');
        $brand_img = $request->file('brand_img');

        $input['slug'] = str_slug($input['name']);

        if($brand_img){
            $brand_img_name = hexdec(uniqid()).".".$brand_img->getClientOriginalExtension();
            Image::make($brand_img)->resize(200,200)->save(public_path('/media/brand/'.$brand_img_name));
            $input['brand_img'] = 'media/brand/'.$brand_img_name;
        }
        Brand::create($input);
        return redirect()->route('brands.index')->with('message',"Successfully Brand Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id,
            'brand_img' => "mimes:jpeg,jpg,png,gif,svg",
        ]);

        $input = $request->except('old_brand_img');
        $input['slug'] = str_slug($input['name']);
        
        $old_brand_img = $request->old_band_img;
        $brand_img = $request->file('brand_img');

        if($brand_img){
            $brand_img_name = hexdec(uniqid()).".".$brand_img->getClientOriginalExtension();
            Image::make($brand_img)->resize(200,200)->save(public_path('/media/brand/'.$brand_img_name));
            $input['brand_img'] = 'media/brand/'.$brand_img_name;
        }
        $brand->update($input);
        return redirect()->route('brands.index')->with('message','Successfully Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        unlink($brand->brand_img);
        $brand->delete();
        return back()->with('message','Successfully Brand Deleted');
    }
}
