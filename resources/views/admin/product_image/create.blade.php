@extends('admin.layouts.header')
@section('content')
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl">  Create New Image  </h4>
    <a href="{{ route('images.index')}}" class="font-semibold text-amber-800"> All Image </a>
</div>
<div class="mt-5 md:mt-8 bg-slate-200/60 py-4">
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.product_image._form',[
            "model" => $image,
            'button_text' => 'Create Image',
        ])
    </form>
</div>
@endsection