@extends('admin.layouts.header')
@section('content')
    {{-- TOP SEARCH NAVE  --}}
        <div class="text-white py-2 py-5 md:px-5 md:py-8">
            <form action="" class="">
                <div class="flex w-full">
                    <input type="search" class="w-80" placeholder="Search User"> 
                    <button class="bg-blue-800 text-white px-3">  <i class="fa-solid fa-magnifying-glass fa-2x"></i></a> </button>
                </div>  
            </form>
        </div>
    {{-- END TOP SEARCH NAVE  --}}
    <div class="user-information bg-slate-200/60 p-5">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 md:col-span-1 bg-white border p-5">
                <form action="{{ route('users.update',$user->id) }}">
                    @csrf
                    @method('put')
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2"> Name </label>
                        <input type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2" > UserName  </label>
                        <input type="text" name="username" value="{{ $user->username }}">
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2"> Email </label>
                        <input type="text" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2"> Phone </label>
                        <input type="text" name="phone" value="{{ $user->phone }}">
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2"> User Role Type </label>
                        <select name="role_id" id="">
                            <option value="1" {{ $user->role_id == 3 ? 'selected' :'' }}> Make User</option>
                            <option value="1" {{ $user->role_id == 2 ? 'selected' :'' }}> Make Seller </option>
                            <option value="1" {{ $user->role_id == 1 ? 'selected' :'' }}> Make Admin </option>
                        </select>
                    </div>

                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2"> Update Password </label>
                        <input type="password" name="password" class=" @error('password') border border-red-500 @enderror">
                        @error('password')
                        <p class="text-red-500">
                            {{ $message }}
                        </p>  
                        @enderror
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="name" class="mb-2">Password Conformation</label>
                        <input type="password" name='password_confirmation'>
                    </div>

                    <button class="bg-blue-800 text-white px-4 py-2"> Update User Information </button>
                </form>
            </div>

            <div class="col-span-2 md:col-span-1 bg-white border my-5 md:my-0 p-5">
                <div class="image flex justify-center">
                    <img src="{{ asset($user->profile_photo_url) }}" alt="">
                </div> 
                
                <div class="account-information my-5">
                    <h4> User Account Information </h4>
                </div>
            </div>

        </div>
    </div>
    
@endsection