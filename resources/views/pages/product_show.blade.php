@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <div class=" bg-slate-200/60 xl:pl-0 xl:w-5/6 mx-auto">
        <div class="heading flex py-4 pl-3 bg-white border shadow">
            @if ($product->childcategory && $product->subcategory)
                <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600">{{ $product->category->cat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a>
                <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600"> {{ $product->subcategory->subcat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a>
                <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600"> {{ $product->childcategory->childcat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a> 
            @elseif($product->subcategory)
                <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600"> {{ $product->category->cat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a>
                <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600"> {{ $product->subcategory->subcat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a>      
            @else
            <a href="#" class="capitalize text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600"> {{ $product->category->cat_name }} <i class="fa-solid fa-angle-right mx-1 text-slate-500"></i></a>   
            @endif
        </div>
              
        <div class="my-2 px-3 lg:w-5/6 xl:w-4/6 mx-auto bg-white py-3 border shadow">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                {{-- product Image  --}}
                <div class="col-span-1">
                    <div class="owl-carousel owl-theme">
                        @foreach ($product->images as $img)
                            <div class="item">
                                <img src="{{ asset($img->img_path) }}" alt="{{ $img->name}}">
                            </div>
                        @endforeach   
                    </div>
                </div>
                {{-- Product Image  --}}

                {{-- product details  --}}
                <div class="col-span-1">
                    <h3 class="text-xl font-bold text-slate-900">
                        {{ $product->product_name }}
                    </h3>
                    <a href="#" class="text-md font-bold text-amber-800 transition duration-300 hover:text-amber-600">
                        <span class="text-slate-500 mr-2"> Brand:</span>
                        {{ ($product->brand ) ? $product->brand->name: "No Brand" }}
                    </a>
                    <p class="text-left text-xs">
                        {!! $product->short_text  !!}
                    </p>
                    <p class="text-slate-500 text-sm mt-1"> 
                        @if ($product->discount_price == NULL)
                            <span class="text-yellow-900 text-xl"> {{ $product->selling_price }} TK </span> 
                        @else
                        <span class="text-yellow-900 text-xl"> {{ $product->discount_price }} TK </span>
                            <span class="line-through ml-2"> {{ $product->selling_price }} Tk </span>
                        @endif

                        <span class="mx-3 py-1  px-1 bg-red-800 text-white text-sm rounded-full
                            {{ $product->discount_price == NULL ? 'bg-black':' ' }}
                             "> 
                            {{ $product->discount_status }} 
                        </span>
                    </p>
                    <form action="#">
                        <div class="grid grid-cols-3 gap-2 py-3">
                            <div class="col-span-1">
                                <div class="select-color flex flex-col">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Select Size
                                    </label>
                                    <select name="color" id="color" class="py-1 rounded-xl w-full">
                                        <option value=""> </option>
                                        @foreach ($product->sizes as $size)
                                            <option value="{{ $size }}" class="w-full"> {{ $size }} </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-span-1">
                                <div class="select-color flex flex-col">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Select Color 
                                    </label>
                                    <select name="color" id="color" class="py-1 rounded-xl w-full">
                                        <option value=""> </option>
                                        @foreach ($product->colors as $color)
                                            <option value="{{ $color }}" class="w-full"> {{ $color }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-1">
                                <div class="select-color flex flex-col">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                        Select Quantity
                                    </label>
                                    <input type="number" name="qty" id="qty" value="1" class="py-1 rounded-xl w-full">
                                </div>
                            </div>
                        </div>
                        <button type="submit"> Add To Card </button>
                    </form>
                    <div class="text-left">
                        <h4 class="text-left font-semibold text-sm text-slate-500"> Share This Product </h4>
                        
                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox">

                        </div>
            
                        {{-- end product details  --}}
                    </div>
                    
                    <div class="tag my-3">
                        <h4 class="text-slate-500 font-semibold text-md">
                            All Related Tags
                        </h4>
                        <div class="flex flex-wrap justify-between">
                            @foreach ($product->tags as $tag)
                                <a href="#" class="text-black font-bold underline "> {{ $tag->slug }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <div class="product-description my-6 px-3 lg:w-5/6 xl:w-4/6 mx-auto bg-white py-3 border shadow">
            <div class="">
                <h4 class="capitalize text-slate-500 text-xl font-bold">
                    Product Details
                </h4>
                <p>
                    {!! $product->description !!}
                </p>
            </div>
        </div>
        <div class="product-description my-8 px-3 lg:w-5/6 xl:w-4/6 mx-auto bg-white py-3 border shadow">
            <div class="">
                <h4 class="capitalize text-slate-500 text-xl font-bold">
                    Product Comment
                </h4>
                <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5">
                </div>
            </div>
        </div>
    </div>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v13.0" nonce="0dbukkP0"></script>
@endsection
@section('script')
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6251c2654b60668d"></script>



<script>
    $('.owl-carousel').owlCarousel({
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        margin:10,
    
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
</script>

@endsection