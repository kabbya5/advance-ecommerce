@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
        @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-100/60  p-4 xl:p-0 xl:w-5/6 mx-auto">
        <section class="bg-slate-200/60 relative"> 
            <div class="grid grid-cols-5">
                {{-- SIDEBAR  --}}
                    @include('layouts.sidebar')
                {{--END  SIDEBAR  --}}

                {{-- SLIDER  --}}
                <div class="col-span-5 lg:col-span-4 ">
                    <div class="owl-carousel owl-theme">
                        @foreach ($sliders as $slider)
                            <div class="item">
                                <div class="hidden md:block">
                                    <img src="{{ asset($slider->img_1) }}" alt="{{ $slider->slug }}" class="h-full md:h-64 w-full hidden md:block">
                                </div>
                                <div class="md:hidden">
                                    <img src="{{ asset($slider->img_2) }}" alt="{{ $slider->slug }}" class="h-64  w-full md:hidden">
                                </div>
                                    
                            </div>
                        @endforeach
                    </div>
                </div>  
                {{-- END SLIDER  --}}
            </div>
        </section>

        <section class="band mt-2 lg:mt-8">
            <div class="grid grid-cols-12 gap-4 xl:grid-cols-9 ">
                @foreach ($brands as $brand)
                    <div class="col-span-4 md:col-span-3 lg:col-span-2 xl:col-span-1">
                        @if ($brand->brand_img == NULL)
                            <span class="text-slate-500 font-bold text-sm"> {{ $brand->name }}</span>
                        @else
                        <img src="{{ asset($brand->brand_img) }}" alt="{{ $brand->slug }}" class="w-full h-20">
                        @endif     
                    </div>
                @endforeach
            </div>
        </section>

        {{-- start tag  --}}
        <section class="tags mt-3 pt-3 md:my-8"> 
            <h2 class="text-center py-4 font-bold text-slate-800 text-3xl md:mb-6 lg:text-left lg:pl-4"> Trending Tags </h2>
            <div class="grid grid-cols-3 lg:gap-3 xl:grid-cols-5">
                @foreach ($tags as $tag)   
                    <div class="col-span-1 bg-white border lg:border-slate-200/60 py-3 h-30 shadow-md transition duration-300 hover:border-yellow-800">
                        <div class="flex flex-col md:flex-row justify-around items-center">
                            <img src="{{ asset($tag->tag_img) }}" alt="{{ $tag->slug }}" class="w-full h-24 w-[60px] pb-4 md:pb-0">
                            <h4 class="font-semibold text-slate-500 font-md"> {{ $tag->tag_name }} </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- end tag  --}}

        {{-- Free Shipping  --}}
        <section class="flash-deals pt-5 md:my-8 bg-white border">
            <div class="flex justify-between  px-3">
                <div class="flex flex-col ml-5 md:flex-row md:product->imagess-center">
                    <h4 class="font-bold text-slate-200 text-xl bg-green-600 px-4 py-2 rounded-md"> Free Shipping Product </h4>              
                </div>
                <a href="{{ route('free.shipping.products') }}" class="text-white bg-amber-800 px-3 py-2 rounded-md"> View All </a>
            </div>

            <div class="my-5 lg:my-8 pt-3 lg:pt-5">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
                    @foreach ($free_shipping_products as $product)
                    <div class="col-span-1"> 
                       
                        <div class="product relative bg-white border drop-shadow-2xl pb-2">
                            <div class="product__lable">
                                <span class="absolute top-0 left-0 py-1 px-1 bg-red-800 text-white text-xs capitalize
                                    {{ $product->discount_price == NULL ? 'bg-black':' ' }}
                                    "> 
                                    {{ $product->discount_status }} 
                                </span>
                                @if ($product->product_status)
                                    <span class="absolute top-0 right-0 py-1 px-2 
                                        bg-black text-white text-xs capitalize 
                                        {{ $product->product_status }}
                                        ">

                                        {{ $product->product_status }}
                                    </span>
                                @endif
                                
                            </div>
                            <a href="{{ route('product.show',$product->slug) }}"> 
                                <div class="product_img pt-2 mb-2">
                                    <img src="{{asset($product->image->img_path)}}" alt="{{$product->image->name }}">        
                                </div>
                            </a> 
                            <a href="{{ route('product.show',$product->slug) }}"> 
                                <div class="product_details ml-1">
                                    <h4 class="text-slate-800 font-bold text-sm">
                                        {{$product->product_name}}
                                    </h4>
                                    <p class="text-slate-500 text-xs"> {{ str_limit($product->short_text,60) }}</p>
                                    <p class="text-slate-500 text-sm mt-1"> 
                                        @if ($product->discount_price == NULL)
                                            <span class="text-yellow-900 text-2xl"> {{ $product->selling_price }} TK </span> 
                                        @else
                                        <span class="text-yellow-900 text-2xl"> {{ $product->discount_price }} TK </span>
                                            <span class="line-through ml-2"> {{ $product->selling_price }} Tk </span>
                                        @endif
                                    </p>
                                </div>
                            </a> 
                            <div class="action mt-2 w-full flex">
                                <div class="w-1/3  h-8 flex py-2 justify-center bg-green-800 text-white">
                                    <button class="w-full add-cart"
                                        data-id="{{ $product->id }}"> 
                                        <i class="fa-solid fa-cart-shopping"></i> 
                                    </button>
                                </div>
                                <div class="w-1/3 h-8 flex py-2 justify-center bg-red-800 text-white">
                                    <button class="add-wishlist"
                                        data-id="{{ $product->id }}"> 
                                        <i class="fa-solid fa-heart"></i> 
                                    </button>
                                </div>
                                <div class="w-1/3  h-8 flex py-2 justify-center bg-blue-800 text-white">
                                    <form action="">
                                        @csrf
                                        <button type="submit">
                                            <i class="fa-solid fa-cart-shopping"></i> 
                                        </button>
                                    </form>
                                    
                                </div>  
                            </div>
                        </div>
                        
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Free shippin End --}}

        <section class="flash-deals pt-5 md:my-8 bg-white border">
            <div class="flex justify-between  px-3">
                <div class="flex flex-col ml-5 md:flex-row md:product->imagess-center">
                    <h4 class="font-bold text-slate-800 text-xl "> Top Flash Deals </h4>
                    <div class="w-96 py-2  px-4 text-center mt-8 md:mt-0 md:ml-5 bg-red-800 text-white">
                        <span class="counter  text-md ">
                            Deals end In: 
                        </span>
                    </div>                
                </div>
                <a href=""> View All </a>
            </div>

            <div class="my-5 lg:my-8 pt-3 lg:pt-5">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
                    @foreach ($products as $product)
                    <div class="col-span-1"> 
                       
                        <div class="product relative bg-white border drop-shadow-2xl pb-2">
                            <div class="product__lable">
                                <span class="absolute top-0 left-0 py-1 px-1 bg-red-800 text-white text-xs capitalize
                                    {{ $product->discount_price == NULL ? 'bg-black':' ' }}
                                    "> 
                                    {{ $product->discount_status }} 
                                </span>
                                @if ($product->product_status)
                                    <span class="absolute top-0 right-0 py-1 px-2 
                                        bg-black text-white text-xs capitalize 
                                        {{ $product->product_status }}
                                        ">

                                        {{ $product->product_status }}
                                    </span>
                                @endif
                                
                            </div>
                            <a href="{{ route('product.show',$product->slug) }}"> 
                                <div class="product_img pt-2 mb-2">
                                    <img src="{{asset($product->image->img_path)}}" alt="{{$product->image->name }}">        
                                </div>
                            </a> 
                            <a href="{{ route('product.show',$product->slug) }}"> 
                                <div class="product_details ml-1">
                                    <h4 class="text-slate-800 font-bold text-sm">
                                        {{$product->product_name}}
                                    </h4>
                                    <p class="text-slate-500 text-xs"> {{ str_limit($product->short_text,60) }}</p>
                                    <p class="text-slate-500 text-sm mt-1"> 
                                        @if ($product->discount_price == NULL)
                                            <span class="text-yellow-900 text-2xl"> {{ $product->selling_price }} TK </span> 
                                        @else
                                        <span class="text-yellow-900 text-2xl"> {{ $product->discount_price }} TK </span>
                                            <span class="line-through ml-2"> {{ $product->selling_price }} Tk </span>
                                        @endif
                                    </p>
                                </div>
                            </a> 
                            <div class="action mt-2 w-full flex">
                                <div class="w-1/3  h-8 flex py-2 justify-center bg-green-800 text-white">
                                    <button class="w-full add-cart"
                                        data-id="{{ $product->id }}"> 
                                        <i class="fa-solid fa-cart-shopping"></i> 
                                    </button>
                                </div>
                                <div class="w-1/3 h-8 flex py-2 justify-center bg-red-800 text-white">
                                    <button class="add-wishlist"
                                        data-id="{{ $product->id }}"> 
                                        <i class="fa-solid fa-heart"></i> 
                                    </button>
                                </div>
                                <div class="w-1/3  h-8 flex py-2 justify-center bg-blue-800 text-white">
                                    <form action="">
                                        @csrf
                                        <button type="submit">
                                            <i class="fa-solid fa-cart-shopping"></i> 
                                        </button>
                                    </form>
                                    
                                </div>  
                            </div>
                        </div>
                        
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Resent View  --}}
        <section class="flash-deals pt-5 md:my-8 bg-white border">
            <div class="flex justify-between  px-3">
                <div class="flex flex-col ml-5 md:flex-row md:product->imagess-center">
                    <h4 class="font-bold text-slate-800 text-xl "> Your Resent View </h4>              
                </div>
                <a href="{{ route('all.resent.view',Auth::user()->username) }}"> View All </a>
            </div>

            <div class="my-5 lg:my-4 pt-3 lg:pt-5">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
                    @foreach ($resent_view_products as $resent_view)
                    <div class="col-span-1"> 
                        @include('shere._product',[
                            "product" => $resent_view->product
                        ])                    
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
    <section class="pl-4 xl:pl-0 xl:w-5/6 mx-auto relative">
        {{-- START SIDE BAR  --}}
        {{-- END SIDE BAR  --}}
        <div class="grid grid-cols-12">
            {{-- START SIDEBAR  --}}
            <div class="col-span-2">     
            </div>
            {{-- END SIDEBAR  --}}
            <div class="col-span-10  h-10 w-full"></div>
        </div>
    </section> 
@endsection
@section('script')
    <script>
        $('.owl-carousel').owlCarousel({
            slideSpeed: 300,
            items:1,
            paginationSpeed: 400,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            autoplaySpeed:100,
            margin:10,
            responsive:{
                0:{
                    items:1
                },
                700:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });
       
    </script>  
@endsection
        {{-- <div class="relative flex product->imagess-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:product->imagess-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-16 w-auto text-gray-700 sm:h-20">
                        <g clip-path="url(#clip0)" fill="#EF3B2D">
                            <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex product->imagess-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex product->imagess-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex product->imagess-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex product->imagess-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:product->imagess-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex product->imagess-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                       <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div> --}}

