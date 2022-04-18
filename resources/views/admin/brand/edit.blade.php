@extends('admin.layouts.header')
@section('content')
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl">  Create New brand  </h4>
    <a href="{{ route('brands.index')}}" class="font-semibold text-amber-800"> All brand </a>
</div>
<div class="mt-5 md:mt-8 bg-slate-200/60 py-4">
    <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        @include('admin.brand._form',[
            "model" => $brand,
            'button_text' => 'Update Brand',
        ])
    </form>
</div>
@endsection