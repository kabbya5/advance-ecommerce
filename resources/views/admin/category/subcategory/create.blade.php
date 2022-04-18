@extends('admin.layouts.header')
@section('content')
<div class="flex justify-around bg-white py-4 border ">
    <div class="">
        <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Category </a>
    </div>
    <div class="flex flex-col md:flex-row">
        <a href="{{ route('subcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create SubCategory </a>
        <a href="{{ route('childcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create ChildCategory </a>
    </div> 
</div>
<div class="mt-8">
    <div class="w-full md:w-2/3 lg:w-1/2 xl:2/5 mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Subcategor Name 
                </label>
                <input class=" @error('subcat_name') border border-red-500 @enderror shadow appearance-none border rounded 
                    w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="subcat_name" name="subcat_name" value="{{ old('subcat_name',$subcat->subcat_name) }}" type="text" placeholder="Subcategory Name ">
                @error('subcat_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>    
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"for="category_id"> Select Category </label>
                <select class="w-full @error('category_id') border border-red-500 @enderror" name="category_id" id="category_id">
                    <option class="text-slate-500" > Select Category  </option>
                    @foreach ($categories as $cat)
                        <option class="text-slate-500" value="{{$cat->id }}"> {{ $cat->cat_name }}</option>
                    @endforeach
                     
                </select>
                @error('category_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>    
                @enderror
            </div> 
            <button class=" px-4 py-2 bg-blue-800 text-white trangition duration-300 hover:text-slate-500 hover:bg-white"> Create Category  </button>
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