<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        
        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @livewireStyles
        <!-- Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
            alpha/css/bootstrap.css" rel="stylesheet">
        <!-- Toaster -->
        <link rel="stylesheet" type="text/css" 
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @yield('link')
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
<body class="bg-blue-800">
    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <!-- Sidebar -->
            <!-- SIDEBAR TOGGLE ICON  -->
    <input type="checkbox" id="menu-open" class="hidden" />
    <label for="menu-open" class="absolute right-2 bottom-2 shadow-lg rounded-full p-2 bg-gray-100 text-gray-600 md:hidden" data-dev-hint="floating action button">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </label>
    <!-- SIDEBAR SMALL DEVICE ICOM  -->
    <header class="text-gray-100  flex justify-between md:hidden" data-dev-hint="mobile menu bar">
        <a href="#" class="block p-4 text-white font-bold whitespace-nowrap truncate">
            Your App Name
        </a>
        <label for="menu-open" id="mobile-menu-button" class="m-2 p-2 focus:outline-none hover:text-white hover:bg-blue-700 rounded-md">
            <svg id="menu-open-icon" class="h-6 w-6 transition duration-300 ease-in-out" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="menu-close-icon" class="h-6 w-6 transition duration-300 ease-in-out" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>
    </header>
    <!-- SIDEBAR NAVIGATEION  -->
    <aside id="sidebar" class="bg-blue-800 z-10 h-screen mt-4 text-gray-100 md:w-32 xl:w-64 w-3/4 space-y-6 pt-6 px-0 absolute inset-y-0 left-0 transform md:relative md:translate-x-0 transition duration-300 ease-in-out  md:flex md:flex-col md:justify-between overflow-y-auto" data-dev-hint="sidebar; px-0 for frameless; px-2 for visually inset the navigation">
        <div class="flex justify-center">
            <ul class="list w-screen">
                <li class="items mb-6">
                    <a href="{{ route('admin.dashboard') }}" class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }} nav-link flex items-center" title="dashboard">   
                        <i class="fas fa-user-shield"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Appname </span>
                    </a>
                </li>
                <div class="bg-blue-700 h-px w-100 heih">

                </div>
                <!-- DROPDOWN NAV  CATEGORY -->
                <li class="items dropdown">
                    <a href="{{ route('categories.index') }}" class="{{ (request()->segment(2) == 'categories') ? 'active' : '' }} 
                        nav-link nav-link flex items-center justify-between 
                        transition duration-300 hover:bg-blue-700"
                        title="Category">
                        <div class="link-item flex items-center">
                            <i class="fa-solid fa-dumpster-fire"></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Category </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a href="{{ route('categories.create') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-edit"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Create </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{ route('categories.index') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-table-list"> </i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> All Category </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END DROPDOWN    -->

                <!-- DROPDOWN NAV SUB CATEGORY -->
                <li class="items dropdown">
                    <a href="{{ route('subcategories.index') }}" class="{{ (request()->segment(2) == 'subcategories') ? 'active' : '' }} 
                        nav-link nav-link flex items-center justify-between transition duration-300 hover:bg-blue-700
                        " title="Sub Category"> 
                        <div class="link-item flex items-center">
                            <i class="fa-solid fa-book-open"></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate">Sub Category </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a href="{{ route('subcategories.create') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-edit"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Create </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{ route('subcategories.index') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-table-list"> </i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Sub Categories </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END DROPDOWN    -->

                 <!-- DROPDOWN NAV CHILD CATEGORY -->
                 <li class="items dropdown">
                    <a href="{{ route('childcategories.index') }}" class="{{ (request()->segment(2) == 'childcategories') ? 'active' : '' }} 
                        nav-link nav-link flex items-center justify-between transition duration-300 hover:bg-blue-700"
                        title="Child Category"> 
                        <div class="link-item flex items-center">
                            <i class="fa-solid fa-align-right"></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Chidcategory </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a href="{{ route('childcategories.create') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-edit"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Create </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="#" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-table-list"> </i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Child Categories </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END DROPDOWN    -->

                <div class="bg-blue-700 h-px w-100 heih">

                </div>

                {{-- START BRAND  --}}
                <li class="items">
                    <a href="{{ route('brands.index') }}" class="{{ (request()->segment(2) == 'brands') ? 'active' : ' ' }} nav-link flex items-center transition duration-300 hover:bg-blue-700" title="Brand">   
                        <i class="fa-brands fa-42-group"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Brand </span>
                    </a>
                </li>
                {{-- END BRAND  --}}
                {{-- START COUPON  --}}
                <li class="items">
                    <a href="{{ route('coupons.index') }}" class="{{ (request()->segment(2) == 'coupons') ? 'active' : ''}}
                        nav-link flex items-center transition 
                        duration-300 hover:bg-blue-700" 
                        title="Coupon">   
                        <i class="fa-solid fa-gift"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Coupon </span>
                    </a>
                </li>
                {{-- END COUPON  --}}

                {{-- SLIDER --}}
                
                <li class="items">
                    <a href="{{ route('sliders.index') }}" class="{{ (request()->segment(2) == 'sliders') ? 'active' : '' }} 
                        nav-link flex items-center transition duration-300
                        hover:bg-blue-700" title="Slider">   
                        <i class="fa-solid fa-layer-group"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Slider </span>
                    </a>
                </li>

                {{-- END SLIDER  --}}

                {{-- START TAG  --}}

                <li class="items">
                    <a href="{{ route('tags.index') }}" class="{{ (request()->segment(2) == 'tags') ? 'active' : '' }} 
                        nav-link flex items-center transition duration-300
                        hover:bg-blue-700" title="Tag">   
                        <i class="fa-solid fa-tags"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Tag </span>
                    </a>
                </li>

                {{-- END TAG  --}}

                {{-- START PRODUCT IMAGE  --}}

                <li class="items">
                    <a href="{{ route('images.index') }}" class="{{ (request()->segment(2) == 'images') ? "active" : ' '}} 
                        nav-link flex items-center transition duration-300
                        hover:bg-blue-700" title="Tag">   
                        <i class="fa-solid fa-image"></i>
                        <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Product Image </span>
                    </a>
                </li>

                {{-- END PRODUCT IMAGE  --}}

                <!-- DROPDOWN PRODUCT -->
                <li class="items dropdown">
                    <a href="{{ route('products.index') }}" class="{{ (request()->segment(2) == 'products') ? 'active' : '' }} 
                        nav-link nav-link flex items-center justify-between transition duration-300 hover:bg-blue-700"
                        title="product"> 
                        <div class="link-item flex items-center">
                            <i class="fa-brands fa-product-hunt"></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Product </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a href="{{ route('products.create') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-edit"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Create </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="#" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-table-list"> </i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Child Categories </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="#" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fa-solid fa-image"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Product Image </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END PRODUCT   -->
                
                <!-- START SITE SETTING  -->
                <li class="items dropdown">
                    <a href="#" class="nav-link nav-link flex items-center justify-between transition duration-300 hover:bg-blue-700
                       {{ request()->segment(2) == "setting" ? 'active':'' }} 
                    "title="site-setting"> 
                        <div class="link-item flex items-center">
                            <i class="fa-solid fa-gear transition duration-300"></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Site Setting </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a href="{{ route('delivery_charge.index') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700" title="delivery-charge">   
                                <i class="fa-solid fa-file-invoice-dollar transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Delivery Charge  </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{ route('site.setting') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700" title="site setting">   
                                <i class="fa-solid fa-address-card transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Site Setting  </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="{{ route('terms.and.conditons') }}" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700" title="trems and condition">   
                                <i class="fa-solid fa-disease transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Terms And Condition  </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="#" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fas fa-home transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Dashboard </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END SITE SETTING   -->
                
               

                <!-- DROPDOWN NAV  -->
                <li class="items dropdown">
                    <a href="#" class="nav-link nav-link flex items-center justify-between transition duration-300 hover:bg-blue-700"> 
                        <div class="link-item flex items-center">
                            <i class="fas fa-home "></i>
                            <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate"> Dashboard </span>
                        </div>  
                        <span> &darr; </span>
                    </a>  
                    <ul class="dropdown-list list md:hidden transition duration-300">
                        <li class="items">
                            <a  class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fas fa-home transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Dashboard </span>
                            </a>
                        </li>
                        <li class="items">
                            <a href="#" class="nav-link nav-link nav-link flex items-center  transition duration-300 hover:bg-blue-700">   
                                <i class="fas fa-home transition duration-300"></i>
                                <span class="md:hidden xl:block text-2xl font-extrabold whitespace-nowrap truncate transition duration-300"> Dashboard </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END DROPDOWN    -->
            </ul>
            
        </div>   
    </aside>
    <!-- END SIDEBAR NAVIGATION  -->
    <main id="content" class="flex-1 p-3 bg-slate-100 rounded-xl shadow-xl">
        <div class="mx-auto">
        <!-- Top nav  -->
        <div class="heading p-2 flex justify-between">
            <div class="flex items-center">
                <a href="#" class="active mr-2"> Application </a>
                <i class="far fa-angle-right"></i>
                <a href="#" class="ml-2 text-gray-600"> Dashboard </a>
            </div>
            <div class="flex justify-center items-center">
                <div class="form-group relative w-64 p-0 h-100">
                    <form action="" class="p-0">
                        <input type="text" class="input absolute  left-0 bg-gray-200" placeholder="Search....." required>
                        <button class="btn absolute">
                            <i class="fas fa-search"> </i>
                        </button>
                    </form>
                </div>
                <div class="notification-box ml-2">
                    <i class="fas fa-bell relative text-gray-700 text-2xl">
                        <span class="span absolute bg-red-800 text-white rounded-full w-2 h-2 top-0 right-0"> </span>
                    </i>
                </div>
                <a href="#" class="profile">
                    <img  class="rounded-full w-10 ml-2 h-10 transition duration-300" id="profle-img" src="https://media.istockphoto.com/photos/millennial-male-team-leader-organize-virtual-workshop-with-employees-picture-id1300972574?b=1&k=20&m=1300972574&s=170667a&w=0&h=2nBGC7tr0kWIU8zRQ3dMg-C5JLo9H2sNUuDjQ5mlYfo=" alt="">
                </a>
        
            </div>
        </div>
        <div class="bg-gray-200 h-px w-100 mt-5 xl:mt-8">
        
        </div>
        <!-- END top Nav  -->
    
        <!-- /CONTENT -->
        @yield('content')
        
        <!-- /End CONTENT -->
        </div>
    </main>
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- toster  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
             toastr.success("{{ session('message') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif

        //sweet alert delete confirmation 

        $('.delete-confirm').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                    }).then(function(value) {
                    if (value) {
                    window.location.href = url;
                }
            });
        });
    </script>
    @yield('script')
</body>
</html>