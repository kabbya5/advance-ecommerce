@extends('admin.layouts.header')
@section('content')
<div class="flex justify-around bg-white py-4 border ">
    <div class="">
        <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Category </a>
    </div>
    <div class="flex flex-col md:flex-row">
        <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create category </a>
        <a href="" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create ChildCategory </a>
    </div> 
</div>
<div class="mt-8">
    <div class="w-full md:w-2/3 lg:w-1/2 xl:2/5 mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{ route('categories.update',$category->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Category Name 
                </label>
                <input class=" @error('cat_name') border border-red-500 @enderror shadow appearance-none border rounded 
                    w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="cat_name" name="cat_name" value="{{ old('cat_name',$category->cat_name) }}" type="text" placeholder="Username">
                @error('cat_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>    
                @enderror
            </div>
            <button class=" px-4 py-2 bg-blue-800 text-white trangition duration-300 hover:text-slate-500 hover:bg-white"> Create Category </button>
        </form>
    </div>
</div>
<div class="flex justify-around bg-white py-4 border ">
    <div class="">
        <a href="{{ route('categories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All Category </a>
    </div>
    <div class="flex flex-col md:flex-row">
        <a href="{{ route('subcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All SubCategory </a>
        <a href="{{ route('childcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All ChildCategory </a>
    </div> 
</div>
@endsection