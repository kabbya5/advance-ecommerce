@extends('admin.layouts.header')
@section('content')
    <div class="flex py-5 xl:py-0 my-10 xl:my-0 xl:bg-white">
        <div class="my-auto mx-auto bg-white sm:px-8 py-8 xl:p-0 rounded-md shadow-md w-full sm:w-3/4">
            <div class="mt-12">
                @if (!$site_setting_update)
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Create Site Address  </h2>
                @else
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center py-4"> Update Site Address  </h2>
                @endif
               
                @if (!$site_setting_update)
                <form action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.site_setting.address_setting._form',[
                        "model" => $site_setting_create,
                        "button_text" => "Create"
                    ])
                   
                </form>
                @else
                <form action="{{ route('setting.update',$site_setting_update->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    @include('admin.site_setting.address_setting._form',[
                        "model" => $site_setting_update,
                        "button_text" => "Update"
                    ])
                </form> 
                @endif
                
            </div>
        </div>
    </div>
@endsection