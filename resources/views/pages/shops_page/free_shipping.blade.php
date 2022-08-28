@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
        @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-100/60 xl:pl-0 xl:w-5/6 mx-auto">
        <section class="bg-slate-200/60 relative"> 
            <div class="grid grid-cols-5">
                {{-- SIDEBAR  --}}
                    @include('layouts.sidebar')
                {{--END  SIDEBAR  --}}

                {{-- SLIDER  --}}
                <div class="col-span-5 lg:col-span-4 ">
                  <div class="my-5 lg:my-4 pt-3 lg:pt-5">
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
                    @foreach ($free_shipping_products as $product)
                    <div class="col-span-1"> 
                        @include('shere._product',[
                            "product" => $product
                        ])                        
                    </div>
                    @endforeach
                </div>
                <div class="my-10 lg:my-20">
                    {{ $free_shipping_products->links() }}
                </div>
            </div>
        </section>
    </main>
@endsection