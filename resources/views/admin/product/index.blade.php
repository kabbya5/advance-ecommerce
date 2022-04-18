@extends('admin.layouts.header')
@section('content')
    <h2 class="text-lg font-medium mt-10 ml-5"> All Product List </h2> 
    <div class="grid grid-cols-12 gap-6 mt-5 ml-5">
        <div class="col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 relative">
            <a href="{{ route('products.create')}}" class="bg-blue-800 shadow-md mr-2 py-1 px-2 text-white">Add New Product</a>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form action="">
                    <div class="group-form w-56 relative bg-slate-200/60 text-slate-500">
                        <input type="text" class="w-56 box pr-10 input" placeholder="Search..." required>
                        <button class="absolute  right-2 top-2">
                            <i class="fas fa-search"> </i>
                        </button>
                    </div>
                </form>
            </div>
        </div>        
    </div> 
    <div class="">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 shadow border-b border-gray-200 sm:rounded-lg">
                <div class="overflow-x-auto">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="border-b text-left my-5">
                        <tr>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Image
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Product Name
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Stock 
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Status
                            </th>
                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y-8 divide-gray-200">
                        @foreach ($products as $product)
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex">
                                        @foreach ($product->images as $image )
                                            <img src="{{ asset($image->img_path) }}" alt="{{ $image->name }}" class="-ml-2 w-10 h-10 rounded-full">
                                        @endforeach
                                    </div>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-lg text-black"> {{ $product->product_name }}</span>
                                        <span class="text-md text-slate-500"> {{ $product->category->cat_name }}</span>
                                    </div> 
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    {{ $product->product_quantity }}
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('products.status',$product->id) }}" class="text-white px-3 py-2 {{ ($product->status == 1) ? 'bg-green-800' : 'bg-red-500' }}">
                                        {{ $product->active_status }}
                                    </a>
                                </td>
                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                    <a class="mr-3 text-gray-700" href="{{route('products.edit',$product->id)}}">
                                        <i class="far fa-edit"></i>
                                        Edit
                                    </a>
                                    <a class="mr-3 text-red-800 delete-confirm" href="{{route('products.destroy',$product->id)}}">
                                        <i class="fa-solid fa-trash"></i>
                                        Delete
                                    </a> 
                                </td>
                            </tr>
                        @endforeach  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
    
@endsection
 