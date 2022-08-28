<div class="border bg-slate-200/60 flex justify-around items-center mt-4 md:mt-8 py-6">
    <h4 class="font-bold text-xl"> Search Order  </h4>
    <form action="{{ route('order.search') }}" method="POST">
        @csrf
        <div class="flex items-center">
            <input type="search" name="order_search" id="">
            <button type="submit" class="bg-blue-800 text-white px-3 py-1 h-full"> <i class="fa-solid fa-search fa-2x"></i> </button>
        </div>
    </form>    
</div>