<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider = new Slider();
        return view('admin.slider.create',compact('slider'));
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
            'img_1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
            'img_2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|',
        ]);
        $input = $request->except(['old_img_1','old_img_2']);
        $img_1 = $request->file('img_1');
        $img_2 = $request->file('img_2');
        if($img_1 && $img_2){
            $img_1_name= hexdec(uniqid()).'.'.$img_1->getClientOriginalExtension();
            Image::make($img_1)->resize(1300,300)->save(public_path('/media/slider/'.$img_1_name));
            $input['img_1'] = 'media/slider/'.$img_1_name;

            $img_2_name = hexdec(uniqid()).".".$img_2->getClientOriginalExtension();
            Image::make($img_2)->resize(320,300)->save(public_path('/media/slider/'.$img_2_name));
            $input['img_2'] = 'media/slider/'.$img_2_name;
        }
        $input['slug'] = str_slug($request->slider_name);
        Slider::create($input);
        return redirect()->route('sliders.index')->with('message', 'Slider Created Successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function status(Slider $slider)
    {
        $slider->update([
            'status' => $slider->staus == 1 ? 0 : 1,
        ]);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {   
        $request->validate([
            'img_1' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'img_2' => 'image|mimes:jpeg,png,jpg.gif,svg',
        ]);

        $old_img_1 = $request->old_img_1;
        $old_img_2 = $request->old_img_2;

        $input = $request->except(['old_img_1','old_img_2']);
        $img_1 = $request->file('img_1');
        $img_2 = $request->file('img_2');

        if($img_1){
            unlink($old_img_1);
            $img_1_name= hexdec(uniqid()).'.'.$img_1->getClientOriginalExtension();
            Image::make($img_1)->resize(1300,300)->save(public_path('/media/slider/'.$img_1_name));
            $input['img_1'] = 'media/slider/'.$img_1_name;
        }
        if($img_2){
            unlink($old_img_2);
            $img_2_name = hexdec(uniqid()).".".$img_2->getClientOriginalExtension();
            Image::make($img_2)->resize(320,300)->save(public_path('/media/slider/'.$img_2_name));
            $input['img_2'] = 'media/slider/'.$img_2_name;
        }
        $input['slug'] = str_slug($request->slider_name);
        $slider->update($input);
        
        return redirect()->route('sliders.index')->with('message', 'Slider Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $img_1 = $slider->img_1;
        $img_2 = $slider->img_2;
        unlink($img_1);
        unlink($img_2);
        $slider->delete();
        return back()->with('message','Successfully Deleted Slider');
    }
}
