@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-100 xl:pl-0 xl:w-5/6 mx-auto">
        {{-- Cart content  --}}
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
                                            Size
                                        </th>
                                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                            Color
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
                                <tbody class="bg-white">
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
                                                    <a href="{{ route('product.show',$cart->name) }}">
                                                        <img src="{{ asset($cart->options->image) }}" alt="{{ $cart->name }}" class="-ml-2 w-14 h-14 rounded-md">
                                                    </a>                                                         
                                                </div>
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <div class="flex flex-col">
                                                    <a href="{{ route('product.show',$cart->name) }}">
                                                        <span class="text-lg text-black"> {{ $cart->name }}</span>
                                                    </a>
                                                    
                                                </div> 
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                @if(strlen($productsize) > 0)
                                                    <select name="size" id="size" class="size" data-id="{{ $cart->rowId }}">
                                                        @foreach ($sizes as $size)
                                                            <option value="{{ $size }}" {{ $size == $cart->options->size ? "selected" : '' }}> {{ $size }}</option>
                                                        @endforeach
                                                    </select> 
                                                @endif         
                                            </td>
                                            
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                @if(strlen($productcolor) > 0) 
                                                    <select name="color" id="color" class="update-color" data-id="{{ $cart->rowId }}">
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color }}" {{ $color == $cart->options->color ? "selected" : ' ' }}> {{ $color }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                <select name="qty" id="qty" class="update-qty" data-id="{{ $cart->rowId }}">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <option value="{{ $i }}" {{ $i == $cart->qty ? "selected" : ' ' }}> {{ $i }}</option>
                                                    @endfor
                                                    
                                                </select>
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
                                        <tr class="mt-5">
                                            <td colspan="5" align="right"> 
                                               <span class="font-bold text-black text-2xl">
                                                    Sub-total:
                                                </span> 
                                            </td>
                                            <td colspan="3"> 
                                                <span class="text-red-900 text-2xl pl-5 font-bold"> {{ Cart::subtotal() }} Tk</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            @if (Session::has('coupon'))
                                            <td colspan="5" align="right"> 
                                                <span class="font-bold text-black text-2xl">
                                                    Coupon Discount:
                                                 </span> 
                                            </td>
                                            <td colspan="3"> 
                                                <span class="text-red-900 text-2xl pl-5 font-bold">
                                                    {{Session::get('coupon')['discount']}} TK
                                                </span>
                                                <a href="{{route('coupon.remove')}}" class="text-red-800 text-3xl ml-5"> X </a>
                                            </td>
                                            @endif    
                                        </tr>
                                        <tr>
                                            @if (Session::has('coupon'))
                                            <td colspan="5" align="right"> 
                                                <span class="font-bold text-black text-2xl">
                                                     Total:
                                                 </span> 
                                             </td>
                                             <td colspan="3"> 
                                                 <span class="text-red-900 text-2xl pl-5 font-bold">{{ Session::get('coupon')['finalAmount'] }} TK</span>
                                             </td>
                                            @else
                                            <td colspan="5" align="right"> 
                                                <span class="font-bold text-black text-2xl">
                                                     Total:
                                                 </span> 
                                             </td>
                                             <td colspan="3"> 
                                                 <span class="text-red-900 text-2xl pl-5 font-bold">{{Cart::subtotal()}} TK</span>
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
        {{--End Cart Content --}}

        {{-- Coupon  --}}
            <div class="w-96 mx-auto pt-5 bg-white">
                <form action="{{ route('apply.coupon') }}" method="POST">
                    @csrf
                    <div class="flex">
                        <input type="text" name="coupon">
                        <button type="submit" class="bg-blue-800 p-3 rounded-md text-white"> Apply Coupon </button>
                    </div>
                
                </form>
            </div>

        {{-- End Coupon  --}}

        <div class="flex justify-between pl-5 pr-5 pt-5">
            <a href="" class="bg-blue-800 p-2 text-white rounded-md"> Continue Shopping </a>
            <a href="{{route('cart.checkout')}}" class="bg-blue-800 p-2 text-white rounded-md"> Confirm Order </a>
        </div>

    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            $('.update-color').change(function (e){
                e.preventDefault();
                let color = $(this).children("option:selected").val();
                var id = $(this).data('id'); 
                $.ajax({
                    url:"{{ url('update') }}/"+ color + "/" +id,
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
                    },
                    error: function(data){
                        console.log(data);
                    }
                }); 
            });
            $(".size").change(function (e){
                e.preventDefault();
                let size = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    url:"{{ url('updated') }}/"+ size + "/" +id,
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
                    },
                    error: function(data){
                        console.log(data);
                    }
                })

            });
            $('.update-qty').change(function (e){
                e.preventDefault();
                let qty = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url:"{{ url('update-qty') }}/"+ qty + "/" +id,
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
                    },
                    error: function(data){
                        console.log(data);
                    }
                })
            })
        });
        $(document).ready(function (){
            
        })
    </script>
@endsection