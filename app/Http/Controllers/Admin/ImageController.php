<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->paginate(15);

        return view('admin.product_image.index',compact('images'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = new Image();

        return view ('admin.product_image.create',compact('image'));
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
            'name' => 'required',
            'img_path' =>'required|mimes:jpeg,png,jpg,svg,gif',
        ]);

        $input = $request->except('old_img_path');

        $image = $request->file('img_path');

        if($image){
            $image_name = hexdec(uniqid()).".".$image->getClientOriginalExtension();
            \Image::make($image)->resize(350,300)->save(public_path('/media/product/'.$image_name));
            $input['img_path'] = 'media/product/'.$image_name;
        }

        Image::create($input);

        return redirect()->route('images.index')->with('message','Image Upload Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $img)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('admin.product_image.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Image $image)
    {
        $request->validate([
            'img_path' => 'mimes:jpeg,jpg,png,gif,svg',
        ]);
        $input = $request->except('old_img_path');
        $img = $request->file('img_path');
        $old_img_path = $request->old_img_path;

        if($img){
            unlink($old_img_path);
            $image_name = hexdec(uniqid()). "." .$img->getClientOriginalExtension();
            \Image::make($img)->resize(350,300)->save(public_path('/media/product/'.$image_name));
            $input['img_path'] = 'media/product/'.$image_name;
        }

        $image->update($input);
        return redirect()->route('images.index')->with('message','Successfully Image Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Image::find($id);
        unlink($img->img_path);
        $img->delete();
        return back()->with('message', 'Successfull Deleted Image');
    }
}
