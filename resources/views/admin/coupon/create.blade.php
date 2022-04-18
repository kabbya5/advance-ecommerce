@extends('admin.layouts.header')
@section('content')
<div class="headin border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl">  Create New coupon  </h4>
    <a href="{{ route('coupons.index')}}" class="font-semibold text-amber-800"> All coupon </a>
</div>
<div class="mt-5 md:mt-8 bg-slate-200/60 py-4">
    <form action="{{ route('coupons.store') }}" method="POST">
        @csrf
        @include('admin.coupon._form',[
            "model" => $coupon,
            'button_text' => 'Create Coupon',
        ])
    </form>
</div>
@endsection