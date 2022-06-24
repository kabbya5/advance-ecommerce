@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0  xl:my-0 ">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-5/6">
            <div class="">
                @if (!$terms_update)
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Create Terms And Conditons  </h2>
                @else
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Update Terms And Conditons  </h2>
                @endif
               
                @if (!$terms_update)
                <form action="{{ route('terms_and_condition.store') }}" method="POST">
                    @csrf
                    @include('admin.site_setting.terms_and_condition._form',[
                        "model" => $terms_create,
                        "button_text" => "Create"
                    ])
                   
                </form>
                @else
                <form action="{{ route('terms_and_condition.update',$terms_update->id) }}" method="POST">
                    @csrf
                    @method("put")
                    @include('admin.site_setting.terms_and_condition._form',[
                        "model" => $terms_update,
                        "button_text" => "Update"
                    ])
                </form> 
                @endif
                
            </div>
        </div>
    </div>
@endsection

