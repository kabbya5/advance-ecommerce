<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Image;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(20);
        return view('admin.tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();
        return view('admin.tag.create',compact('tag'));
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
            'tag_name' => 'required|unique:tags,tag_name,except,id',
            'tag_img'  => 'mimes:jpg,jpeg,png,gif,svg',
                            
        ]);
        $input = $request->except('old_tag_img');
        $input['slug'] = str_slug($request->tag_name);

        $tag_img = $request->file('tag_img');

        if($tag_img){
            $tag_img_name = hexdec(uniqid()).".".$tag_img->getClientOriginalExtension();
            Image::make($tag_img)->resize(100,120)->save(public_path('/media/tag/'.$tag_img_name));
            $input['tag_img'] = 'media/tag/'.$tag_img_name;
        }

        Tag::create($input);

        return redirect()->route('tags.index')->with('message','Successfully Tage Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag_name' => 'required|unique:tags,tag_name,'.$tag->id,
            'tag_img'  => 'mimes:jpg,jpeg,png,gif,svg',
                            
        ]);
        $input = $request->except('old_tag_img');
        $input['slug'] = str_slug($request->tag_name);

        $tag_img = $request->file('tag_img');
        $old_tag_img = $request->old_tag_img;

        if($tag_img){
            unlink($old_tag_img);
            $tag_img_name = hexdec(uniqid()).".".$tag_img->getClientOriginalExtension();
            Image::make($tag_img)->resize(100,120)->save(public_path('/media/tag/'.$tag_img_name));
            $input['tag_img'] = 'media/tag/'.$tag_img_name;
        }

        $tag->update($input);

        return redirect()->route('tags.index')->with('message','Successfully Tage Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        unlink($tag->tag_img);
        $tag->delete();
        return back()->with('message','Successfuly Deleted Tags');
    }
}
