<div class="col-span-1 hidden lg:block">
    <ul class="bg-white">
        @foreach ($categories as $category)
            <li class="dropdown border border-slate-300/60 pl-2 py-1 transition duration-300/60 hover:bg-amber-600 ">
                <a href="{{ route('category.products',$category->slug) }}" class="">  {{ $category->cat_name }} </a> <br>
                <div class="dropdown-list hidden z-10 lg:-ml-3 w-2/3  bg-white shadow border absolute top-0 h-full px-10 py-10 min-w-fit">
                    @foreach ($category->subcategories as $subcat)
                        <div class="col-span-1">
                            <ul class="bg-white">
                                <li class="pl-2 py-1 transition duration-300 hover:text-amber-600 mr-5">
                                    <a href="" class="text-center font-bold uppercase"> {{ $subcat->subcat_name }} </a> <br>
                                </li> 
                            </ul>
                            
                            <ul class="bg-white">
                                @foreach ($subcat->childcategories as $childcat)
                                    <li class="pl-3 py-1 transition duration-300 hover:text-amber-500">
                                        <a href="" class=""> {{ $childcat->childcat_name}} </a> <br>
                                    </li> 
                                @endforeach 
                            </ul>
                        </div>
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
</div>