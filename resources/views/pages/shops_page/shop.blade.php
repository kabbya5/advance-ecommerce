@php
if(isset($free_shipping_products)){
    $products = $free_shipping_products;
    $nameText = 'free shipping';
}elseif(isset($categoryProduct)){
    $products = $categoryProduct;
    $nameText = $categoryName;
}elseif(isset($tagProducts)){
    $products = $tagProducts;
    $nameText = $tagName;
}
$herdertext = $nameText ." ". str_plural('product',$productsCount);
@endphp

@extends('layouts.app')

@section('title')
    {{ $nameText }}
@endsection
@section('content')
    {{-- Start Navbar  --}}
        @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-100/60 xl:pl-0 xl:w-5/6 mx-auto">
        <div class="flex my-4 flex items-center justify-center">
            <h4 class="text-slate-800 font-semibold text-lg capitalize"> {{ $herdertext }}</h4> 
            <span class="w-10 h-10 rounded-full bg-red-800 text-white ml-4 flex items-center justify-center"> {{ $productsCount}}</span>
        </div>
        <div class="col-span-5 lg:col-span-4 ">
            <div class="my-5 lg:my-4 pt-3 lg:pt-5">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
                    @foreach ($products as $product)
                    <div class="col-span-1"> 
                        @include('shere._product',[
                            "product" => $product
                        ])                        
                    </div>
                    @endforeach
                </div>
                @isset($products)
                <div class="my-10 lg:my-20">
                    {{ $products->links() }}
                </div>
            @endisset
            </div>
        </div>      
    </main>
@endsection