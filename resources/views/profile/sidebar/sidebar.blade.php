<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">    
                <!-- Navigation Links -->
                <div class="space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-jet-nav-link>
                </div>
            </div>

            <div class="sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ml-3 relative">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="relative min-h-screen md:flex" data-dev-hint="container">
    <!-- Sidebar -->
    <!-- SIDEBAR TOGGLE ICON  -->
    <input type="checkbox" id="menu-open" class="hidden" />
    <label for="menu-open" class="absolute z-50 right-2 bottom-2 shadow-lg rounded-full p-2 bg-gray-100 text-gray-600 md:hidden" data-dev-hint="floating action button">
        <svg class="h-6 w-6" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </label>
    <!-- SIDEBAR SMALL DEVICE ICOM  -->
    <header class="text-gray-500 flex justify-between md:hidden" data-dev-hint="mobile menu bar">
        <a href="{{ route('dashboard') }}" class="block p-4 text-gray-500 font-bold whitespace-nowrap truncate">
            Sidebar Togoller 
        </a>

        <label for="menu-open" id="mobile-menu-button" class="m-2 p-2 focus:outline-none bg-black hover:text-white hover:bg-blue-700 rounded-md">
            <svg id="menu-open-icon" class="h-6 w-6 transition duration-300 ease-in-out" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="menu-close-icon" class="h-6 w-6 transition duration-300 ease-in-out" xmlns="http://www.w3.org/3000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </label>
    </header>
    <main id="content" class="flex-1 p-3 bg-slate-100 rounded-xl shadow-xl">
        <div class="mx-auto">
        <!-- Top nav  -->
        <div class="heading mt-10 p-2 flex justify-between">
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
        <div class="px-4 py-4 sm:px-0">
            <div class="grid grid-cols-4 2xl:grid-cols-5 gap-2">
                <!-- GENERAL REPORT  -->
                <div class="col-span-4 w-100" id="report">
                    <div class="flex justify-between">
                        <span class="text-zinc-700 font-bold"> General Report </span>
                        <a href="#" class="text-blue-500 font-normal"> 
                            <i class="fas fa-sync-alt mr-2"></i>
                            Reload Data
                        </a>
                    </div>
        
                    <div class="grid grid-cols-1 gap-3 md:grid-cols-2 xl:grid-cols-4">
                        <div class="shoping-report relative border border-gray-200 mt-3 p-4 bg-white drop-shadow-sm transition duration-300">
                            <a href="#">
                                <div class="flex justify-between">
                                    <div class="flex flex-col">
                                        <i class="fas fa-shopping-cart z-10 text-3xl text-blue-500"></i>
                                        <h4 class="text-black mt-4 text-2xl"> 4.710 </h4>
                                        <span class="mt-2 text-gray-500"> Item Sales </span>
                                    </div>
                                    <div>
                                        <span class="rounded-full px-2 py-1 bg-lime-600  text-white">
                                            30%
                                            <i class="fas fa-angle-up ml-1"></i>
                                        </span>
                                    </div>  
                                </div>
                            </a>
                        </div>
                        <div class="shoping-report relative border border-gray-200 mt-3 p-4 bg-white drop-shadow-sm transition duration-300">
                            <a href="#"> 
                                <div class="flex justify-between">
                                    <div class="flex flex-col">
                                        <i class="fas fa-archive text-3xl text-orange-300"></i>
                                        <h4 class="text-black mt-4 text-2xl"> 3.721 </h4>
                                        <span class="mt-2 text-gray-500"> New Orders </span>
                                    </div>
                                    <div>
                                        <span class="rounded-full px-2 py-1 bg-red-600  text-white">
                                            2%
                                            <i class="fas fa-angle-down ml-1"></i>
                                        </span>
                                    </div>  
                                </div>
                            </a>
                        </div>
                        <div class="shoping-report relative border border-gray-200 mt-3 p-4 bg-white drop-shadow-sm transition duration-300">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <i class="fas fa-tv text-3xl text-orange-300"></i>
                                    <h4 class="text-black mt-4 text-2xl"> 4.710 </h4>
                                    <span class="mt-2 text-gray-500"> Total Products </span>
                                </div>
                                <div>
                                    <span class="rounded-full px-2 py-1 bg-lime-600  text-white">
                                        30%
                                        <i class="fas fa-angle-up ml-1"></i>
                                    </span>
                                </div>  
                            </div>
                        </div>
                        <div class="shoping-report relative border border-gray-200 mt-3 p-4 bg-white drop-shadow-sm transition duration-300">
                            <div class="flex justify-between">
                                <div class="flex flex-col">
                                    <i class="fas fa-user text-3xl text-lime-600"></i>
                                    <h4 class="text-black mt-4 text-2xl"> 4.710 </h4>
                                    <span class="mt-2 text-gray-500"> Unique Visitor </span>
                                </div>
                                <div>
                                    <span class="rounded-full px-2 py-1 bg-lime-600  text-white">
                                        30%
                                        <i class="fas fa-angle-up ml-1"></i>
                                    </span>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END GENERAL  -->
                <div class="bg-gray-400 h-64 w-100">
        
                </div>
            </div>
        </div>
        {{-- <!-- /End CONTENT --> --}}
        </div>
    </main>
</div>
 