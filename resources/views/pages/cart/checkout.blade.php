@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-200/60 xl:pl-0 xl:w-4/6 mx-auto">
        {{-- top nav  --}}
        <div class="w-full bg-white py-3 px-4">
            <a href="{{route('welcome.page')}}" class="text-slate-600"> <i class="fa-solid fa-house"></i>  </a>
            <a href="{{route('cart')}}" class="text-slate-600"> <span class="mx-2 text-xl"> / </span> Shopping Cart </a>
            <a href="{{route('cart.checkout')}}" class="text-slate-600"> <span class="mx-2 text-xl"> / </span> Checkout  </a>
        </div>
        
            @error('agree')
                <div class="bg-red-200 p-3">
                    <p class="text-slate-600"> * {{ $message }}</p>
                </div>
            @enderror
       
        {{-- end top nav  --}}

        {{-- checkout --}}
        
        <div class="bg-slate-100 w-full">
            <div class="heading py-3 px-2">
                <span class="text-slate-800 font-bold ml-2"> Checkout </span>
            </div>
            <form action="{{ route('comfirm.order') }}" method="POST">
                @csrf
                <div class="grid grid-cols-3 gap-4 lg:gap-10 px-2 py-2 px-10 md:px-2 lg:py-5 lg:px-4">
                    <div class="col-span-3 md:col-span-1 bg-white">
                        <h4 class="text-slate-900 font-bold mb-5 p-3"> 
                            <span class="bg-slate-200/60 text-red-800 rounded-full mr-5"> 1 </span> 
                            Coustomer Information 
                        </h4> 
                        <div class="py-2">
                            <label for="fname" class="text-slate-800 mt-2 font-bold  block"> First Name </label> 
                            <input type="text" name="first_name" id="fname" class="h-9 mt-2 w-full @error('first_name') border border-red-500 @enderror" value="{{ old('first_name',$shipping->first_name)}}" placeholder="First Name">
                            @error('first_name')
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
    
                            <label for="lname" class="text-slate-800 font-bold mt-2 block"> Last Name </label> 
                            <input type="text" name="last_name" id="fname" class="h-9 mt-2 w-full @error('last_name') border border-red-500 @enderror" value="{{ old('last_name',$shipping->last_name)}}" placeholder="First Name">
                            @error("last_name")
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
    
                            <label for="address" class="text-slate-800 font-bold mt-2 block"> Address</label> 
                            <input type="text" name="address" id="address" class="h-9 mt-2 w-full @error('address') border border-red-500 @enderror" value="{{ old('address',$shipping->address)}}" placeholder="First Name">
                            @error('address')
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
    
                            <label for="phone" class="text-slate-800 font-bold  mt-2 block"> Mobile </label> 
                            <input type="text" name="phone" id="phone" class="h-9 mt-2 w-full @error('phone') border border-red-500 @enderror" value="{{ old('phone',$shipping->phone)}}" placeholder="Phone Number">
                            @error('phone')
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
                            
                            <label for="email" class="text-slate-800 font-bold  mt-2 block"> Email </label> 
                            <input type="text" name="email" id="email" class="h-9 mt-2 w-full @error('email') border border-red-500 @enderror" value="{{ old('email',$shipping->email)}}" placeholder="Email">
                            @error('email')
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
    
                            <label for="city" class="text-slate-800font-bold  mt-2 block"> City </label> 
                            <input type="text" name="city" id="city" class="h-9 mt-2 w-full @error('city') border border-red-500 @enderror" value="{{ old('city',$shipping->city)}}" placeholder="city"> 
                            @error('city')
                             <p class="text-red-500"> {{ $message }}</p>                            
                            @enderror
    
                            <label for="Zone" class="text-slate-800 font-bold  mt-2 w-full block"> Zone  </label> 
                            <select name="zone" id="zone" class="w-full">
                                <option value="dhaka" {{ "dhaka" == old('zone', $shipping->zone) ? 'selected' : ' ' }} > dhaka </option>
                                <option value="chittagong" {{ "chittagong" == old('zone', $shipping->zone) ? 'selected' : ' ' }} > Chittgone </option>
                                <option value="rajshahi" {{ "rajshahi" == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Rajshahi </option>
                                <option value="sylhet" {{ "sylhet" == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Sylhet </option>
                                <option value="rangpur" {{ "rangpur" == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Rangpur </option>
                                <option value="mymensingh " {{ "mymensingh " == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Mymensingh  </option>
                                <option value="khulna" {{ "khulna" == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Khulna  </option>
                                <option value="barisal" {{ "barisal" == old('zone', $shipping->zone) ? 'selected' : ' ' }}> Barisal</option>    
                            </select>
                            @error('zone')
                            <p class="text-red-500"> {{ $message }}</p>
                            @enderror
                            <label for="comment" class="text-slate-800 font-bold  mt-2 w-full block"> Comment  </label> 
                            <textarea name="comment" id="comment" cols="30" rows="3" class="w-full">
                                {{old('comment',$shipping->comment)}}
                            </textarea>
                        </div>
                    </div>
                    <div class="col-span-3 md:col-span-2">
                        <div class="grid grid-cols-2 md:col-span-2 gap-4 lg:gap-10">
                            <div class=" col-span-2 md:col-span-1 bg-white">
                                <h4 class="text-slate-900 font-bold mb-5 p-3"> 
                                    <span class="bg-slate-200/60 text-red-800 rounded-full mr-5"> 2 </span> 
                                    Payment Method 
                                </h4> 
                                <form id="delivery_method">
                                    <div class="flex justify-left">
                                        <div>   
                                          <div class="form-check">
                                            <input class="form-check-input appearance-none rounded-full h-4 w-4 border 
                                                border-gray-300 bg-white checked:bg-blue-600 
                                                checked:border-blue-600 focus:outline-none 
                                                transition duration-200 mt-1 align-top 
                                                bg-no-repeat bg-center bg-contain float-left 
                                                mr-2 cursor-pointer" {{('cod' == Session::get('payment')['method']) ?'checked' :''}}
                                                type="radio" value="cod" name="payment" id="cod">
                                            <label class="form-check-label inline-block text-gray-800" for="cod">
                                                Cash on Delivery
                                            </label>
                                          </div>
                                          <div class="form-check mt-5">
                                            <input class="form-check-input appearance-none 
                                                rounded-full h-4 w-4 border border-gray-600 
                                                bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition
                                                duration-200 mt-1 align-top bg-no-repeat 
                                                bg-center bg-contain float-left mr-2 cursor-pointer" type="radio"
                                                name="payment" value="op" id="op" 
                                                {{('op' == Session::get('payment')['method']) ? 'checked':''}}>
                                            <label class="form-check-label inline-block text-gray-800" for="op">
                                                Online Payment
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                </form> 
                            </div>
                            <div class="col-span-2 md:col-span-1 bg-white">
                                <h4 class="text-slate-900 font-bold mb-5 p-3"> 
                                    <span class="bg-slate-200/60 text-red-800 rounded-full mr-5"> 3 </span> 
                                    Delivery Method
                                </h4>
                                <form action="">
                                    <div class="flex justify-left">
                                    {{-- free shipping System --}}
                                        
                                        @if ( Session::get('charge')['charge'] === 0)
                                        <div class="py-2 mx-auto">
                                            <h2 class="font-semibold text-red-500"> Free Shipping </h2>
                                        </div>
                                        @else 
                                        <div>
                                            @foreach (App\Models\DeliveryCharge::all() as $item)
                                            <div class="form-check">
                                                <input class="form-check-input appearance-none rounded-full h-4 w-4
                                                    border border-gray-300 bg-white checked:bg-blue-600 checked:border-blue-600 
                                                    focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center 
                                                    bg-contain float-left mr-2 cursor-pointer" type="radio" name="payment_method" 
                                                    id="button-{{$item->id}}"  value="{{ $item->charge }}"
                                                    {{($item->charge == Session::get('charge')['charge']) ? 'checked' : ''}}>
                                                <label class="form-check-label inline-block text-gray-800" for="button-{{$item->id}}">
                                                    {{ $item->text }}- {{ $item->charge }} TK
                                                </label>
                                              </div>
                                            @endforeach
                                        </div>
                                        @endif
                                        
                                    </div>
                                </form>
                            </div>                       
                            {{-- Apply coupoun --}}
                            <div class="col-span-2 md:col-span-2 bg-white">
                                <h4 class="text-slate-900 font-bold mb-5 p-3"> 
                                    <span class="bg-slate-200/60 text-red-800 rounded-full mr-5"> Apply Coupoun </span> 
                                </h4>
                                <form action="{{ route('apply.coupon') }}" method="POST">
                                    @csrf
                                    <input type="text" name="coupon" class="w-full" placeholder="Enter Coupon">
                                    <button type="submit" class="p-3 rounded-md text-red-800 font-bold border-2 border-red-800 block mt-5 w-full
                                        hover:bg-red-800 transition duration-300 hover:text-white">
                                         Apply Coupon 
                                    </button>  
                                </form>
                            </div>
                            {{-- End coupon  --}}
    
                            {{-- Order Samary --}}
                            <div class="col-span-2 md:col-span-2 bg-white pb-4">
                                <h4 class="text-slate-900 font-bold mb-5 p-3"> 
                                    <span class="bg-slate-200/60 text-red-800 rounded-full mr-5"> 4 </span>
                                    Order Overview 
                                </h4>
                                
                                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Product name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Price
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Total Price
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                                                <th scope="row" class="px-6 py-4text-sm text-gray-900">
                                                    <a href="{{ route('product.show',$cart->name) }}"> {{ $cart->name }}</a>
                                                </th>
                                                <td class="px-6 py-4 text-gray-900 text-sm">
                                                    {{ $cart->price }} TK
                                                </td>
                                                <td class="px-6 py-4 text-gray-900 text-sm f">
                                                    {{ $cart->price * $cart->qty}} TK
                                                </td>
                                            </tr>
                                            @endforeach
                                            <br>
                                            <tr>
                                                @if (Session::has('coupon'))
                                                <td colspan="2" align="right"> 
                                                    <span class="text-black font-bold text-sm">
                                                         Total:
                                                     </span> 
                                                 </td>
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 text-gray-900 text-sm pl-5 font-bold ">{{ Session::get('coupon')['finalAmount'] }} TK</span>
                                                 </td>
                                                @else
                                                <td colspan="2" align="right"> 
                                                    <span class=" text-black  font-bold text-sm">
                                                         Total:
                                                     </span> 
                                                 </td>
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 text-sm pl-5 font-bold ">{{ (int)str_replace(',', '', Cart::Subtotal())}} TK</span>
                                                 </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="right"> 
                                                    <span class="text-black font-bold text-sm">
                                                        Delivery Charge
                                                     </span> 
                                                 </td>
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 font-bold text-sm pl-5 ">{{ Session::get('charge')['charge'] }} TK</span>
                                                 </td>  
                                            </tr>
                                            <tr>
                                                @if (Session::has('coupon'))
                                                <td colspan="2" align="right"> 
                                                    <span class=" text-black font-bold text-sm">
                                                        Coupon Discount:
                                                     </span> 
                                                 </td>
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 font-bold text-sm pl-5 ">{{Session::get('coupon')['discount']}} TK </span>
                                                 </td>
                                                @endif
                                            </tr> 
                                            <tr>
                                                @if (Session::has('coupon'))
                                                <td colspan="2" align="right"> 
                                                    <span class=" text-black font-bold text-gray-900 text-sm">
                                                         SubTotal:
                                                     </span> 
                                                 </td>
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 text-gray-900 text-sm pl-5 font-bold">{{ Session::get('coupon')['finalAmount'] + Session::get('charge')['charge']}} TK</span>
                                                 </td>
                                                @else
                                                <td colspan="2" align="right"> 
                                                    <span class="text-black font-bold text-sm">
                                                         SubTotal:
                                                     </span> 
                                                 </td>
                                                 
                                                 <td colspan="1"> 
                                                     <span class="text-red-500 font-bold text-sm pl-5">{{(int)str_replace(',', '', Cart::Subtotal()) + (int) Session::get('charge')['charge']}}  TK</span>
                                                 </td>
                                                @endif
                                            </tr>    
                                        </tbody>        
                                    </table>
                                </div>
                            </div>
                            {{-- End order samary --}}
                        </div>
                    </div>
                    <div class="col-span-3 mb-10 bg-white">
                        <div class="flex justify-around items-center flex-col md:flex-row">
                            <div class="flex">
                                <input type="checkbox" value="1" name="agree" checked  class="mr-2 @error('agree') border border-red-500 @enderror">
                                <p>
                                    I have read and agree to the <a> Terms and Conditions</a> , Privacy Policy and Refund and Return Policy
                                </p>
                            </div>
                            <button class="confirm order px-4 py-2 bg-blue-800 text-white"> Confirm Order </button>
                        </div>             
                    </div>
                </div>
            </form>
            
        </div>
    </main>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $('input[name="payment_method"]').change(function (e){
                e.preventDefault();
                let charge = $('input[name="payment_method"]:checked').val(); 
                $.ajax({
                    url:"{{ url('delivery/method/charge') }}/",
                    type:"POST",
                    dataType:"json",
                    data:{
                        charge:charge,
                        _token:CSRF_TOKEN
                    },
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
            $('input[name="payment"]').change(function(e){
                e.preventDefault();
                let payment = $('input[name="payment"]:checked').val();
                $.ajax({
                    url:"{{ url('payment/method') }}/",
                    type:"POST",
                    dataType:"json",
                    data:{
                        payment:payment,
                        _token:CSRF_TOKEN
                    },
                    success: function (data){
                        console.log(data);
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
        });
    </script>
@endsection