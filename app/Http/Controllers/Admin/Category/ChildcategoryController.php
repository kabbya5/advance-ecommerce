<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ChildcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childcategories = Childcategory::all();
        return view('admin.category.childcategory.index',compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $childcat = new Childcategory();
        return view('admin.category.childcategory.create',compact('childcat','subcategories'));
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
            'childcat_name' => 'required|unique:childcategories,childcat_name,except,id',
            'subcategory_id' => 'required',
        ]);
        Childcategory::create([
            'subcategory_id' => $request->subcategory_id,
            'childcat_name' => $name = $request->childcat_name,
            'slug' => $name,
        ]);
        return redirect()->route('childcategories.index')->with('message', 'Childcategory Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Childcategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Childcategory $childcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Childcategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Childcategory $childcategory)
    {
        $subcategories = Subcategory::all();
        return view('admin.category.childcategory.edit',compact('childcategory','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Childcategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Childcategory $childcategory)
    {
        $request->validate([
            'childcat_name' => 'required|unique:childcategories,childcat_name,except,id',
            'subcategory_id' => 'required',
        ]);
        $childcategory->update([
            'subcategory_id' => $request->subcategory_id,
            'childcat_name' => $name = $request->childcat_name,
            'slug' => $name,
        ]);
        return redirect()->route('childcategories.index')->with('message', 'Childcategory Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Childcategory  $childcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Childcategory $childcategory)
    {
        $childcategory->delete;
        return back()->with('message','Successfully Category Deleted');
    }
}
