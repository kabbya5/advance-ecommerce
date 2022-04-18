@extends('admin.layouts.header')
@section('content')
<div class="flex justify-around bg-white py-4 border ">
    <div class="">
        <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Category </a>
    </div>
    <div class="flex flex-col md:flex-row">
        <a href="{{ route('childcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Child Category </a>
        <a href="{{ route('subcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Sub Category </a>
    </div> 
</div>
<div class="mt-8">
    <div class="w-full md:w-2/3 lg:w-1/2 xl:2/5 mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
            action="{{ route('childcategories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Childcategor Name 
                </label>
                <input class=" @error('childcat_name') border border-red-500 @enderror shadow appearance-none border rounded 
                    w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                    id="childcat_name" name="childcat_name" value="{{ old('childcat_name',$childcat->childcat_name) }}" type="text" placeholder="childcategory Name ">
                @error('childcat_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>    
                @enderror
            </div>
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2"for="subcategory_id"> Select Child Category </label>
                <select class="w-full @error('subcategory_id') border border-red-500 @enderror" name="subcategory_id" id="subcategory_id">
                    <option class="text-slate-500" > Select Child Category </option>
                    @foreach ($subcategories as $cat)
                        <option class="text-slate-500" value="{{$cat->id }}"> {{ $cat->subcat_name }}</option>
                    @endforeach
                     
                </select>
                @error('subcategory_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>    
                @enderror
            </div> 
            <button class=" px-4 py-2 bg-blue-800 text-white trangition duration-300 hover:text-slate-500 hover:bg-white"> Create Category  </button>
        </form>
    </div>

    <div class="flex justify-around bg-white pt-4 md:pt-8 border ">
        <div class="">
            <a href="{{ route('categories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All Category </a>
        </div>
        <div class="flex flex-col md:flex-row">
            <a href="{{ route('subcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All SubCategory </a>
            <a href="{{ route('childcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All ChildCategory </a>
        </div> 
    </div>
</div>
@endsection