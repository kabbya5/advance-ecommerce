<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::latest()->get();
        
        return view('admin.category.subcategory.index',compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcat = new Subcategory();
        return view('admin.category.subcategory.create',compact('subcat','categories'));
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
            'subcat_name' => 'required|unique:subcategories',
            'category_id' => 'required|max:3',
        ]);
        Subcategory::create([
            'category_id' => $request->category_id,
            'subcat_name' => $name = $request->subcat_name,
            'slug' => str_slug($name),
        ]);
        return redirect()->route('subcategories.index')->with('message', 'Subcategory Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.category.subcategory.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'subcat_name' => 'required|unique:subcategories,id',
            'category_id' => 'required|max:3',
        ]);
        $subcategory->update([
            'category_id' => $request->category_id,
            'subcat_name' => $name = $request->subcat_name,
            'slug' => str_slug($name),
        ]);
        return redirect()->route('subcategories.index')->with('message', 'Subcategory Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return back()->with('message','Successfully Category Deleted');
    }
}
