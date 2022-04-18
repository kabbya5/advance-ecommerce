<div id="topNav" class="flex justify-around xl:justify-between">
    <div class="text-white p-1 xl:pl-0">
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500"> 013405888888888888 </a>  <span class="text-white ml-4"> |</span>
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Email.com </a>
    </div>
    <div class="login-ifo p-1 xl:pl-0">
        @if (Route::has('login'))    
            @auth
                @if (Auth::user()->role_id == 1)
                <a href="{{ route('admin.dashboard') }}" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Profile <span class="text-white ml-4 text-ununderline"> |</span>
                @elseif(Auth::user()->role_id == 2)
                <a href="{{ url('/seller.dashboard') }}" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Profile <span class="text-white ml-4 text-ununderline"> |</span>
                @else
                <a href="{{ url('/dashboard') }}" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Profile <span class="text-white ml-4 text-ununderline"> |</span>
                @endif
            @else
                <a href="{{ route('login') }}" class="text-white transition duration-300/60 hover:text-slate-500 ml-4">Log in <span class="text-white ml-4"> |</span> </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-white transition duration-300/60 hover:text-slate-500 ml-4">Register <span class="text-white ml-4"> |</span> </a>
                @endif
            @endauth
        @endif
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Wishlist</a> <span class="text-white ml-4"> |</span>
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Order Traking </a> <span class="text-white ml-4"> |</span>
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"> Shippin Card </a> 
        <a href="" class="text-white transition duration-300/60 hover:text-slate-500 ml-4"></a>
    </div>
</div>