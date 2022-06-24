@extends('layouts.app')
@section('content')
    <div class="bg-blue-800 w-full h-screen -mt-10">
        <div class="h-screen  flex py-5 xl:py-0 my-10">
            <div class="my-auto mx-auto  bg-white px-5 sm:px-8 py-8 rounded-md shadow-md xl:shadow-none  sm:w-3/4 lg:w-2/4">
                <h2 class="font-bold text-2xl xl:text-3xl text-center xl:text-center"> Sign Up </h2>
                @if ($errors->any())
                    <div class="mb-4 font-medium text-sm text-red-600">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mt-8 mx-auto w-96">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
            
                        <div>
                            <x-jet-label for="name" value="{{ __('Name') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full @error('name') border border-red-500 @enderror" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="username" value="{{ __('User Name') }}" />
                            <x-jet-input id="username" class="block mt-1 w-full  @error('username') border border-red-500 @enderror" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="email" value="{{ __('Email') }}" />
                            <x-jet-input id="email" class="block mt-1 w-full  @error('email') border border-red-500 @enderror" type="email" name="email" :value="old('email')" required />
                        </div>

                        <div class="mt-4">
                            <x-jet-label for="phone" value="{{ __('Phone Number') }}" />
                            <x-jet-input id="phone" class="block mt-1 w-full  @error('phone') border border-red-500 @enderror" type="text" name="phone" :value="old('phone')" required />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password" value="{{ __('Password') }}" />
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        </div>
            
                        <div class="mt-4">
                            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        </div>
            
                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>
            
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
            
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>
            
                            <x-jet-button class="ml-4">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        
    </x-jet-authentication-card>
</x-guest-layout> --}}
