@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
        @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <main class="bg-slate-200/60 xl:pl-0 xl:w-5/6 mx-auto">
        <section class="bg-slate-200/60 relative"> 
            <div class="grid grid-cols-5">
                {{-- SIDEBAR  --}}
                    @include('layouts.sidebar')
                {{--END  SIDEBAR  --}}

                <div class="col-span-5 lg:col-span-4 bg-slate-200/60 ">
                    <div class="w-1/2 mx-auto mt-8 text-center">
                        <h4 class="bg-black text-white px-3 py-1 uppercase"> Get in Touch  </h4>
                        <p class="text-center mt-5 pb-5">
                            Please fill out quick form and we will be in touch with lightening speed.
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 contact p-5">
                        <div class="col-span-2 md:col-span-1 md:ml-10 md:pt-[90px]">
                            <div class="flex items-center">
                                <div class="icon text-center">
                                    <i class="fa-solid fa-envelope fa-3x mt-4 mt-5"></i>
                                </div>
                                <div class="info ml-3">
                                    <h6 class="text-red-800"> Email </h6>
                                    <span> hq@mondalbd.com</span> <br>   
                                </div>
                            </div>
                            <div class="flex items-center mt-5">
                                <div class="icon text-center">
                                    <i class="fa-solid fa-location-dot fa-3x mt-4 mt-5"></i>
                                </div>
                                <div class="info ml-3">
                                    <h6 class="text-red-800"> Address </h6>
                                    <span class="capitalize"> Head Office: Mirpur, </span> <br>
                                    <span class="capitalize"> Dhaka-1216., </span> <br>   
                                </div>
                            </div>
                             <div class="flex items-center mt-5">
                                <div class="icon text-center">
                                    <i class="fa-solid fa-mobile-button fa-3x mt-4 mt-5"></i>
                                </div>
                                <div class="info ml-3">
                                    <h6 class="text-red-800"> phone </h6>
                                    <span>01767760376  </span> <br>
                                    <span> 01711516566 </span> <br>   
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2 md:col-span-1 text-center"> 
                            <h4 class="bg-black text-white px-3 py-1 uppercase inline-block"> Contact Form </h4>
                            <h2 class="text-slate-600 font-bold mt-2 text-2xl" > Sent us a Message </h4>

                            <form action="{{ route('contacts.store') }}" method="post" class="mt-5">
                            @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ old('name') }}"class="w-full  mb-3 @error('name') border-2 border-red-500 @enderror" placeholder="Full Name" required>
                                    @error('name')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                    <input type="email" name="email" value="{{ old('email') }}"class="w-full  mb-3 @error('email') border-2 border-red-500 @enderror" placeholder="Email" required>
                                    @error('email')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                    <input type="text" name="phone" value="{{ old('phone') }}"class="w-full  mb-3 @error('phone') border-2 border-red-500 @enderror" placeholder="Phone" required>
                                    @error('phone')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                            
                                    
                                    <label for="message" class="text-left block">Enter Your Message</label>
                                    <textarea name="message" placeholder="" id="" cols="30" rows="5" class="w-full @error('message') border-2 border-red-500 @enderror">
                                        {{ old('message') }}
                                    </textarea>
                                    @error('message')
                                        <p class="text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button class="bg-amber-600 text-white mt-4 px-2 py-1"> Sent Message  </button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
           
        </section>
    </main>
    
@endsection