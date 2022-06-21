<div class="hidden fixed z-50 bg-white top-15 w-96 h-full pl-5  z-10" id="menu-items">
    <a href="#" class="flex justify-center navbar__brand">
        <img src="https://www.greenbergcommunications.com/wp-content/uploads/2015/04/Branding.png" class="self-center mr-3 h-10" alt="Flowbite Logo">
        <span class="text-amber-600 transition duration-300 hover:text-amber-800 self-center text-xl font-semibold"> Flowbite </span>
    </a> 
    <hr class="mt-1 bg-slate-400">
    <div class="flex flex-col mt-4 text-left">
        <a href="" class="text-slate-800 transition duration-300/60 hover:text-slate-500"> <i class="fa-solid fa-phone text-slate-500 text-base mr-4"></i> O1721597157 </a> 
        <a href="" class="text-slate-900 transition duration-300/60 hover:text-slate-500"> <i class="fa-solid fa-envelope text-slate-500 text-base mr-4"></i> kabby44@gmail.com</a> 
        <a href="" class="text-slate-900 transition duration-300/60 hover:text-slate-500"> <i class="fa-solid fa-cart-shopping text-slate-500 text-base mr-4"></i> Shippin Card</a> 
        @if (Route::has('login'))    
            @auth
            <a href="" class="text-slate-900 transition duration-300/60 hover:text-slate-500 text-base"> <i class="fa-solid fa-heart text-slate-500  mr-4"></i> Wishlist </a> 
            <a href="" class="text-slate-700 transition duration-300/60 hover:text-slate-500 active"> <i class="fa-solid fa-van-shuttle text-slate-500 text-base mr-4"></i> Order Tracking </a> 
            @else
            <div class="">
                <a href="" class="text-slate-700 transition duration-300/60 hover:text-slate-500"> <i class="fa-solid fa-user text-slate-500 text-base mr-4"></i> Login </a> 

                @if (Route::has('register'))
                <a href="" class="text-slate-700 ml-1 transition duration-300/60 hover:text-slate-500"> or  Resigter </a> 
                @endif
            </div>
            @endauth
        @endif
    </div>
    <div class="flex mt-4">
        <div class="border border-slate-200 text-center py-2 px-2 w-1/2 active" id="menu">
            <button class="text-slate-500 transition duration-300 hover:text-blue-800"> <i class="fa-solid fa-circle-chevron-down"></i> Main Manu</i> </button>
        </div>
        <div class="border border-slate-200 text-center py-2 px-2 w-1/2" id="category">
            <button class="text-slate-500 transition duration-300 hover:text-blue-800"> <i class="fa-solid fa-industry"></i> Caategories </i> </button>
        </div>
    </div>
    <div class="flex flex-col text-left my-5 transition duration-300" id="menu-list">
        <div class="border border-slate-200 text-center py-2"> Menu</div>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800"> Home </a>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800 {{ (request()->segment(2) == 'contact') ? 'active': '' }}"> Contact </a>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800"> Shop </a>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800"> <i class="fa-solid fa-bolt"></i> Flash Sale </a>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800"> Resent view </a>
        <a href="" class="text-amber-600 py-1 pl-4 border border-slate-200 transition duration-300/60 hover:text-amber-800"> Orders </a>
    </div>
   
    <div class="flex flex-col text-left my-5 transition duration-300 " id="category-list">
        <div class="border border-slate-200 text-center py-2"> Category </div> 
        <ul class="w-full">
            <li class="border border-slate-200 py-1 pl-4 dropdown-toggle">
                <a href="" class="text-amber-600 transition duration-300 hover:text-amber-800"> Home <i class="fa-solid fa-angle-down float-right mr-4"></i> </a>
                <div class="hidden transition duration-300 grid grid-cols-2 gap-3 mt-2 ml-3 dropdown-menu">
                    <div class="col-span-1 transition duration-300">
                        <a href="" class="text-gray-900  transition duration-300 hover:text-amber-800"> P Category </a> 
                        <div class="flex flex-col ml-3 mt-2 transition duration-300">
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <a href="" class="text-gray-900  transition duration-300 hover:text-amber-800"> P Category </a> 
                        <div class="flex flex-col ml-3 mt-2">
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                            <a href="" class="text-gray-600  transition duration-300 hover:text-amber-800"> c category </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="border border-slate-200 py-1 pl-4"> 
                <a href="" class="text-amber-600  transition duration-300 hover:text-amber-600"> Home <i class="fa-solid fa-angle-down float-right"></i> </a>
            </li>
            <li class="border border-slate-200 py-1 pl-4"> 
                <a href="" class="text-amber-600  transition duration-300 hover:text-amber-600"> Home <i class="fa-solid fa-angle-down float-right"></i> </a>
            </li>
            <li class="border border-slate-200 py-1 pl-4"> 
                <a href="" class="text-amber-600  transition duration-300 hover:text-amber-600"> Home <i class="fa-solid fa-angle-down float-right"></i> </a>
            </li>
            <li class="border border-slate-200 py-1 pl-4"> 
                <a href="" class="text-amber-600  transition duration-300 hover:text-amber-600"> Home <i class="fa-solid fa-angle-down float-right"></i> </a>
            </li>   
        </ul>
    </div>
</div>