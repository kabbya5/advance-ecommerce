@extends('admin.layouts.header');
@section('content')
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
</div
@endsection