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
        <div class="product__img pt-2 mb-2 w-full ">
            <img class="block object-cover w-full h-[220px]"
            src="{{asset($product->image->img_path)}}" alt="{{$product->image->name }}">        
        </div>
    </a> 
    <a href="{{ route('product.show',$product->slug) }}"
        class="h-20"> 
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