@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0 my-10 xl:my-0 xl:bg-white">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-3/4">
            <div class="mt-12">
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center"> Create Delivery System </h2>
                <form action="{{ route('delivery_charge.store') }}" method="POST">
                    @csrf
                    @include('admin.site_setting.delivery_charge._form',[
                        'button_text' => 'Create Delivery Charge', 
                        'model' => $delivery_charge,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection