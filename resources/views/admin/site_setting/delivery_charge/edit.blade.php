@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0 my-10 xl:my-0 xl:bg-white">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-3/4">
            <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center"> Edit Delivery System </h2>
            <div class="mt-8">
                <form action="{{ route('delivery_charge.update',$charge->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.site_setting.delivery_charge._form',[
                        'button_text' => 'Update Delivery Charge',
                        'model' => $charge,
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection