@extends('admin.layouts.header')
@section('content')
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl">  Create New Slider  </h4>
    <a href="{{ route('sliders.index')}}" class="font-semibold text-amber-800"> All Slider </a>
</div>
<div class="mt-5 md:mt-8 bg-slate-200/60 py-4">
    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.slider._form',[
            "model" => $slider,
            'button_text' => 'Create Slider',
        ])
    </form>
</div>
@endsection