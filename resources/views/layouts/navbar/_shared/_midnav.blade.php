<div class="grid grid-cols-4 gap-4">
    <div class="col-span-1 flex">
        <a href="#" class="flex ml-5 lg:hidden text-white">
            <button class="self-center" id="nav-togoler"> <i class="fas fa-bars fa-2x self-center"></i> </i> </button>
        </a> 
        <a href="#" class="ml-5 flex navbar__brand hidden md:inline-flex">
            <img src="https://www.greenbergcommunications.com/wp-content/uploads/2015/04/Branding.png" class="self-center mr-3 h-10" alt="Flowbite Logo">
            <span class="text-amber-600 transition duration-300 hover:text-amber-800 self-center text-xl font-semibold"> Flowbite </span>
        </a>        
    </div>
    <div class="col-span-3 lg:col-span-2 mr-3">
        <form class="w-full flex" action="{{ route('search')}}" method="GET">
            @csrf
            <input type="search" name="search" id="search" class="w-full rounded-md" value="{{old('search') }}">
            <button class="bg-amber-600 px-4 rounded-md hidden md:block" type="submit"> Search </button>
        </form>
        <div id="tags_list" class="z-10 bg-white px-4 fixed w-80 border-2 border-gray-200" style="display: none">
           
        </div>
    </div>
    <div class="col-span-1 self-center hidden lg:block cart-toggler ">
        <a href="{{ route('cart') }}" class="text-white ml-4 relative">
            <i class="fa-solid fa-shopping-cart fa-2x "></i> 
            <span class="text-whit bg-amber-800 px-2 rounded-md absolute -top-7 -right-4 z-20"> {{ Cart::count()}} </span>
            @if ( Cart::count() > 0)
            <div class="w-[32rem] toggler-item hidden  bg-white border shadow-md absolute -left-20 z-10 -ml-[13rem] right-10">
                <div class="flex-flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 shadow border-b border-gray-200 sm:rounded-lg">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="border-b text-left my-5">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Image
                                            </th>    
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>                             
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Quantity
                                            </th>   
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y-8 divide-gray-200">
                                        @foreach (Cart::content() as $cart)
                                            
                                            <tr class="border-b">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <div>                                                        
                                                        <img src="{{ asset($cart->options->image) }}" alt="{{ $cart->name }}" class="-ml-2 w-10 h-10 rounded-full">
                                                    </div>
                                                </td> 
                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{$cart->name}}
                                                </td>   
                                            </tr>                              
                                        @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="flex justify-around mt-2">
                            <span class="text-slate-400 font-bold rounded-md -mt-2 text-lg"> Check Out Now</span>
                            <span class="text-slate-400 font-bold rounded-md -mt-2 text-lg"> {{ Cart::subtotal()}} TK</span>
                        </div> 
                    </div>     
                </div>            
            </div>
            @endif    
        </a>   
        <span class="text-slate-400 font-bold rounded-md -mt-2 text-lg"> {{ Cart::subtotal()}} TK</span>   
    </div>
</div> 

<script>
    $(document).ready(function (){
        $('.cart-toggler').hover(function(){
            $('.toggler-item').toggle();
        });

        // autoinpute search 
        $('#search').keyup(function(){
            var search = $('#search').val();
            $.ajax({
                type:'GET',
                url:"/ajax/tags/" + search,
                success:function(data){
                    $('#tags_list').css('display','block');
                    $('#tags_list').html(data);
                }
            });
        });
        $(document).on('click','li',function(){
            var value = $(this).text();
            $('#search').val(value);
            $('#tags_list').css('display','none');
        });
        
    });

</script>