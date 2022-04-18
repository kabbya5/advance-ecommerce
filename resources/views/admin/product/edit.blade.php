@extends('admin.layouts.header')
@section('link')
    <link rel="stylesheet" href="{{ asset('backend/plugin/simplemde/simplemde.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="bg-slate-200/60 mt-8 pt-4 w-full">
        <div class="flex justify-between items-center">
            <h2 class="text-center text-2xl font-bold text-slate-500"> Create Product </h4>
            <a href="{{ route('products.index') }}" class="text-amber-800 font-bold"> View All Product </a>
        </div>
        
        <form action="{{route('products.update',$product->id)}}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.product._form',[
                'button_text' => 'Update Product',
            ])
        </form>    
    </div>   
@endsection
