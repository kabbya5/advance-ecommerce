@extends('admin.layouts.header')
@section('content')
{{-- Search order  --}}
@include('admin.orders._searchForm')

@if (count($order_search) > 0)
<div class="flex flex-col mt-1 md:mt-4 lg:mt-6 bg-white">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200/60 ">
            <thead class="text-left my-5 bg-slate-200/60">
                <tr>
                    <th class="py-3"> Order Code </th>
                    <th class="py-3"> Coupon </th>
                    <th class="py-3 text-center"> Discount </th>
                    <th class="py-3 text-center"> Payment Type </th>
                    <th class="py-3 text-center"> Subtotal </th>
                    <th class="py-3 text-center"> Status </th>
                    <th class="py-3"> ACTIONS </th>
                </tr>
            </thead>
            <tbody class="divide-y-8 divide-gray-200">
                @foreach ($order_search as $order)
                <tr class="my-3 bg-white mt-5">
                    <td class="text-left bg-white py-2">
                        {{ $order->order_code}}
                    </td>
                    <td class="text-center bg-white py-2">
                        {{ $order->coupon}}
                    </td>
                    <td class="text-center bg-white py-2">
                        {{ $order->discount}}
                    </td>
                    @if ($order->payment == 'cod')
                        <td class="text-center bg-white py-2">
                            Cash On Delivery
                        </td>
                    @else
                        <td class="text-center py-2 bg-blue-800 text-white">
                           Payment Online
                        </td>
                    @endif
                    <td class="text-center bg-white py-2">
                        {{ $order->subtotal}}
                    </td>
                    @if ($order->status == 0)
                    <td class="text-center py-2 bg-red-500 text-white">
                        New
                     </td>
                    @elseif ($order->status == 1)
                        <td class="text-center text-white bg-lime-800 py-2">
                            Accept
                        </td>
                    @elseif ($order->status == 2)
                        <td class="text-center bg-blue-300 text-white py-2">
                            Processing
                        </td>
                    @elseif ($order->status == 3)
                        <td class="text-center bg-blue-600 text-white py-2">
                            Delivery
                        </td>
                    @elseif ($order->status == 4)
                        <td class="text-center bg-red-900 text-white py-2">
                            Cancle
                        </td>
                    @endif
                   
                    
                    <td class=" text-left bg-white py-2">
                        <a class="mx-3 text-white bg-teal-800 px-3 py-2" href="{{route('admin.orders.view',$order->slug)}}">
                            <i class="fa-solid fa-eye"></i>
                            View
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
@else
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl"> Oll Order </h4>
    <a href="#" class="font-semibold text-amber-800"> Orders Not Found  </a>
</div>
@endif


@endsection