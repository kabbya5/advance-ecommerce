@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0  xl:my-0 ">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-5/6">
            <div class="">
                @if (!$payment_system_update)
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Create Payment System  </h2>
                @else
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Update Payment System  </h2>
                @endif
               
                @if (!$payment_system_update)
                <form action="{{ route('payment.store') }}" method="POST">
                    @csrf
                    @include('admin.site_setting.payment_setting._form',[
                        "model" => $payment_system_create,
                        "button_text" => "Create"
                    ])
                   
                </form>
                @else
                <form action="{{ route('payment.update',$payment_system_update->id) }}" method="POST">
                    @csrf
                    @method("put")
                    @include('admin.site_setting.payment_setting._form',[
                        "model" => $payment_system_update,
                        "button_text" => "Update"
                    ])
                </form> 
                @endif
                
            </div>
        </div>
    </div>
@endsection

