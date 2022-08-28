@extends('admin.layouts.header')
@section('content')
{{-- Search order  --}}
@include('admin.orders._searchForm')

<div class="my-4 lg:my-10 border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl"> Order Details: <span class="font-semibold text-amber-800"> #{{ $order->order_code }} </span>  </h4>
    <a href="{{ route('tags.create')}}" class="font-semibold text-amber-800">
        <i class="fa-solid fa-file-pdf"></i> Download PDF 
    </a>
</div>

<div class="bg-slate-200/60 px-3">
    <div class="grid grid-cols-4 gap-4">
        <div class="col-span-4 lg:col-span-3 bg-white border-gray-200 my-5">
            <div class="border shadow-md m-3">
                <div class="">
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 shadow border-b border-gray-200 sm:rounded-lg">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                <thead class="border-b text-left my-5">
                                    <tr>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Image
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Product Name
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Size
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Color
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Quantity
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Price
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-2 py-2 text-left">
                                            Total
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($order->order_details as $cart)
                                        <tr class="border-b">
                                            <td class="px-2 py-2 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <div> 
                                                    <a href="{{ route('product.show',$cart->product_name) }}">
                                                        <img src="{{ asset($cart->product->image->img_path) }}" alt="{{ $cart->product_name }}" class="-ml-2 w-10 h-10 rounded-md">
                                                    </a>                                                         
                                                </div>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                <div class="flex flex-col">
                                                    <a href="{{ route('product.show',$cart->product->product_name) }}">
                                                        <span class="text-sm text-black"> {{ $cart->product_name }}</span>
                                                    </a> 
                                                </div> 
                                            </td>                             
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                {{ $cart->size}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                {{ $cart->color}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                {{ $cart->quantity}}
                                            </td>
                                            
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                {{$cart->single_price}}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-2 py-2 whitespace-nowrap">
                                                {{$cart->total_price}}
                                            </td>                      
                                        </tr>
                                    @endforeach  
                                        <tr class="mt-5">
                                            <td colspan="5" align="right"> 
                                               <span class="font-bold text-black text-md">
                                                    Sub-total + Shipping :
                                                </span> 
                                            </td>
                                            <td colspan="3"> 
                                                <span class="text-red-900 text-md pl-5 font-bold"> {{ $order->subtotal }} Tk</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if ($order->coupon)
                                            <td colspan="5" align="right"> 
                                                <span class="font-bold text-black text-md">
                                                    {{ $order->coupon }} Discount:
                                                 </span> 
                                            </td>
                                            <td colspan="3"> 
                                                <span class="text-red-900 text-md pl-5 font-bold">
                                                    {{$order->discount}} TK
                                                </span>
                                                
                                            </td>
                                            @endif    
                                        </tr>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

            {{-- shipping address  --}}

            <div class="my-5 bg-slate-200/60 py-5">
                <h4 class="font-semibold text-xl text-center"> Customer And Order Details  </h4>
               
                <div class="flex justify-between items-center border-gray-200 mt-5">
                    <h4 class="font-bold text-md mb-2"> Customer Name: </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->first_name }} {{  $order->shipping->last_name  }}</p>
                </div>
                <div class="flex justify-between items-center border-gray-200 mt-5">
                    <h4 class="font-bold text-md mb-2"> Customer Phone: </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->phone }}</p>
                </div>
                <div class="flex justify-between items-center border-gray-200 mt-5">
                    <h4 class="font-bold text-md mb-2"> Customer Email: </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->email }}</p>
                </div>
                <div class="flex justify-between items-center border-gray-200 mt-5">
                    <h4 class="font-bold text-md mb-2"> Customer City: </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->city }}</p>
                </div>
                <div class="flex justify-between items-center border-gray-200 mt-5">
                    <h4 class="font-bold text-md mb-2"> Customer Zone: </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->zone }}</p>
                </div>
            </div>
            <div class="my-5 bg-slate-200/60 py-5">
                @if ($order->payment === 'op')
                <div class="flex items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2">{{ $payment_system }} </h4>   
                </div> 
                @endif
            </div>

            <div class="flex justify-center my-5 bg-slate-200/60 py-5 text-center">
                @if ($order->status === 0)
                <a href="{{ route('accept.order',$order->slug)}}" class=" ">
                    <div class="py-2 px-5 mx-5 w-full bg-blue-800 text-white transition hover:bg-blue-700 duration-300">
                        <p class="font-bold text-lg  text-center"> Accept Order </p>        
                    </div>
                </a>
                <a href="{{ route('cancle.order',$order->slug)}}">
                    <div class="py-2 px-5 mx-5 w-full bg-red-800 text-white transition hover:bg-red-400 duration-300">
                        <p class="font-bold text-lg  text-center"> Cancle Order </p>        
                    </div>
                </a>
    
                @elseif ($order->status === 1)
                <a href="{{ route('process.order',$order->slug)}}">
                    <div class="py-2 px-5 mx-5 w-full bg-red-800 text-white transition hover:bg-red-500 duration-300">
                        <p class="font-bold text-lg  text-center"> Processing Order </p>        
                    </div>
                </a>
                
                @elseif ($order->status === 2)
                <a href="{{ route('delivery.order',$order->slug)}}">
                    <div class="py-2 px-5 mx-5  w-full bg-blue-600 text-white transition hover:bg-blue-500 duration-300">
                        <p class="font-bold text-lg  text-center">  Delivery Order  </p>        
                    </div>
                </a>
                @elseif ($order->status === 4)
                <a href="{{ route('accept.order',$order->slug)}}">
                    <div class="py-2 px-5 mx-5  w-full bg-red-800 text-white ">
                        <p class="font-bold text-lg  text-center">  Accept Again </p>        
                    </div> 
                 </a>

                 @else
                 <a href="#">
                    <div class="py-2 px-5 mx-5  w-full bg-green-800 text-white ">
                        <p class="font-bold text-lg  text-center">  Order Complete  </p>        
                    </div> 
                 </a>
                @endif 
            </div>
        </div>
        <div class="col-span-4 lg:col-span-1 my-5">
            <div class="p-5 w-full bg-white">
                <h4 class="font-semibold text-xl"> Order Details  </h4>
                <div class="flex items-center border-gray-200 py-2">
                    <img src="{{ asset($order->user->profile_photo_url) }}" alt="" class="w-10 h-10 rounded-full">
                    <a href="{{ route('users.update',$order->user->id) }}" class="mx-2"> {{ $order->user->name }}</a>
                </div>
                
            </div>

            <div class="my-3 p-5 w-full bg-white">
                <h4 class="font-bold text-lg text-gray-900 my-2 lg:text-center"> Order Summary  </h4>
                <div class="flex items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2"> Created : </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->created_at->format('m-d-y') }}</p>
                </div>
                <div class="flex items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2"> Time : </h4>
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->created_at->format('g:i A') }}</p>
                </div>
                @if ($order->payment === 'cod')
                <div class="flex items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2">Payment: </h4>
                    <p class="mx-1 font-bold text-md mb-2"> Cash on Delivery </p>
                </div> 
                @else
                <div class="flex items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2"> Payment : </h4>
                    <p class="mx-1 font-bold text-md mb-2"> Online Payment  </p>
                </div> 
                @endif
                            
            </div>

            <div class="my-3 p-5 w-full bg-white">
                <div class="flex justify-between items-center border-gray-200">
                    <h4 class="font-bold text-md mb-2"> Subtotal : </h4>
                    <p class="font-bold text-md mb-2 lg:text-right">{{ $order->subtotal  }} TK</p>
                </div>               
            </div>

            <div class="my-3 p-5 w-full bg-white">
                <h4 class="font-bold text-lg text-gray-900 my-2 lg:text-center"> Delivery Address </h4>
                <div class="flex items-center border-gray-200">
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->address }}</p>
                </div>          
            </div>

            <div class="my-3 p-5 w-full bg-white">
                @if ($order->shipping->comment)
                <h4 class="font-bold text-lg text-gray-900 my-2 lg:text-center"> Delivery Comment </h4>
                <div class="flex items-center border-gray-200">
                    <p class="mx-1 font-bold text-md mb-2">{{ $order->shipping->comment }}</p>
                </div>  
                @endif           
            </div>
            @if ($order->status === 0)
            <div class="py-2 w-full bg-red-500 text-white">
                <p class="font-bold text-lg  text-center"> New Order </p>        
            </div>

            @elseif ($order->status === 1)
            <div class="py-2 w-full bg-green-800 text-white">
                <p class="font-bold text-lg  text-center">Order Accepted </p>        
            </div>
            
            @elseif ($order->status === 2)
            <div class="py-2 w-full bg-blue-600 text-white">
                <p class="font-bold text-lg  text-center">  Order Processing </p>        
            </div>
           
            @elseif ($order->status === 3)
            <div class="py-2 w-full bg-blue-800 text-white">
                <p class="font-bold text-lg  text-center">  Order  Deliveried </p>        
            </div>
            @elseif ($order->status === 4)
            <div class="py-2 w-full bg-red-800 text-white">
                <p class="font-bold text-lg  text-center">  Order Cancled </p>        
            </div> 
            @endif 
        </div>
    </div>
</div>
@endsection