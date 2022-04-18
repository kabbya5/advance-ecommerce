@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-200/60 xl:pl-0 xl:w-5/6 mx-auto">
        {{-- content  --}}
        <div class=" border shadow-md m-3 ">
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
                                        Color
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Size
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Quantity
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Price
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Total
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y-8 divide-gray-200">
                                @foreach ($carts as $cart)
                                    @php
                                        $product = DB::table('products')->where('id',$cart->id)->first();
                                        $productsize = $product->size;
                                        $productcolor = $product->color;
                                        $sizes = explode(',',$productsize);
                                        $colors = explode(',',$productcolor);
                                    @endphp
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <div>                                                        
                                                <img src="{{ asset($cart->options->image) }}" alt="{{ $cart->name }}" class="-ml-2 w-10 h-10 rounded-full">
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-col">
                                                <span class="text-lg text-black"> {{ $cart->name }}</span>
                                            </div> 
                                        </td>
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if(strlen($productcolor) > 0)    
                                                <select name="color" id="color" class="update-cart" data-id="{{ $cart->rowid }}">
                                                    @foreach ($colors as $color)
                                                        <option value="{{ $color }}" {{ $color == old($cart->options->color) ? "selected" : ' ' }}> {{ $color }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </td>
                                        
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            @if(strlen($productsize) > 0)
                                                <select name="size" id="color" class="update-cart" data-id="{{ $cart->rowid }}">
                                                   
                                                    @foreach ($sizes as $size)
                                                    <option value="{{ $size }}" {{ $size == old($cart->options->size) ? "selected" : '' }}> {{ $size }}</option>
                                                    @endforeach
                                                </select> 
                                            @endif         
                                        </td>
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <input type="number" name="qty" id="qty" value="{{ $cart->qty }}"  data-id="{{ $cart->rowid }}" class="update-cart w-20 py-1 text-gray rounded-xl">
                                        </td>
                                        
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$cart->price}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{$cart->price * $cart->qty}}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a class="mr-3 text-red-800 delete-confirm" href="{{route('cart.destroy',$cart->rowId)}}">
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
        </div>  
        {{-- Content --}}
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $('.update-cart').change(function (e){
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url:"{{ url('update/cart') }}/" +id,
                    type:"GET",
                    dataType:"json",
                    success: function (data){
                        window.location.reload();
                        const Toast = Swal.mixin({
                            toast:true,
                            position:'top-end',
                            showCancelButton: false,
                            timer:3000,
                            timerProgressBar:true,
                            onOper: (toast) =>{
                                toast:addEventListener('mouseenter',Swal.stopTimer)
                                toast:addEvenTLisTener('mouseleave',Swal.resumeTimer)
                            }  
                        }) 
                        Toast.fire({
                            icon: 'success',
                            title:data.success
                        })
                    }
                })
                
            })
        })
    </script>
@endsection