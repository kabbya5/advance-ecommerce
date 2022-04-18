@extends('admin.layouts.header')
@section('content')
<div class="bg-slate-200/60 col-span-12 overflow-auto lg:overflow-visible my-5">
    <div class="flex justify-around bg-white py-4 border ">
        <div class="">
            <a href="{{ route('categories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All Category </a>
        </div>
        <div class="flex flex-col md:flex-row">
            <a href="{{ route('subcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All SubCategory </a>
            <a href="{{ route('childcategories.index') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> All ChildCategory </a>
        </div> 
    </div>
    <div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
              <table class="min-w-full divide-y divide-gray-200/60 ">
                <thead class="text-left my-5 bg-slate-200/60">
                    <tr>
                        <th class="py-3"> Category </th>
                        <th class="py-3"> Sub Category </th>
                        <th class="py-3 text-center"> Child Category </th>
                        <th class="py-3"> ACTIONS </th>
                    </tr>
                </thead>
                <tbody class="divide-y-8 divide-gray-200">
                    @foreach ($childcategories as $cat)
                    <tr class="my-3 bg-white mt-5">
                        <td class="text-left bg-white py-2">
                            {{ $cat->subcategory->category->cat_name }}
                        </td>
                        <td class="text-left bg-white py-2">
                            {{ $cat->subcategory->subcat_name }}
                        </td>
                        <td class="text-center bg-white py-2">
                             {{ $cat->childcat_name }}
                        </td>
                        
                        <td class="flex text-left bg-white py-2">
                            <a class="mr-3 text-gray-700" href="{{route('childcategories.edit',$cat->id)}}">
                                <i class="far fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{route('childcategories.destroy', $cat->id)}}" method="POST" class="delete-confirm">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600"> <i class="fas fa-trash"> </i>  Delete </button>
                            </form>
                        </td>
                    </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>

    <div class="flex justify-around bg-white py-4 border mt-1 md:mt-8 ">
        <div class="">
            <a href="{{ route('categories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create Category </a>
        </div>
        <div class="flex flex-col md:flex-row">
            <a href="{{ route('subcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create SubCategory </a>
            <a href="{{ route('childcategories.create') }}" class="text-blue-800 transition duration-300 hover:text-slate-600 mr-4"> Create ChildCategory </a>
        </div> 
    </div>
</div>
@endsection