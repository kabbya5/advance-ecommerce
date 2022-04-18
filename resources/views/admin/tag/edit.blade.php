@extends('admin.layouts.header')
@section('content')
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl">  Create New Tag  </h4>
    <a href="{{ route('tags.index')}}" class="font-semibold text-amber-800"> All Tag </a>
</div>
<div class="mt-5 md:mt-8 bg-slate-200/60 py-4">
    <form action="{{ route('tags.update',$tag->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        @include('admin.tag._form',[
            "model" => $tag,
            'button_text' => 'Update Tag',
        ])
    </form>
</div>
@endsection