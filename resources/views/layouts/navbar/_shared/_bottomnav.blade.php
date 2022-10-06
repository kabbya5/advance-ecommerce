<div class="grid grid-cols-4 gap-4">
    <div class="col-span-2 pl-4 xl:pl-0">
            <a href="#" class=""> All Category </a>
    </div>
    <div class="col-span-2 float-right">
        <div class="flex justify-between">
            <a href="/" class="text-white transition duration-300/60 hover:text-amber-600 {{ (request()->is('/')) ? 'active' : ''}}"> Home </a>
            <a href="{{ route('contacts.create') }}" class="{{ (request()->is('contacts/create')) ? 'active':'' }} text-white transition duration-300/60 hover:text-amber-600"> Contact </a>
            <a href="" class="text-white transition duration-300/60 hover:text-amber-600"> Shop </a>
            <a href="" class="text-amber-600 transition duration-300/60 hover:text-amber-800"> Flash Sale </a>
            @auth
            <a href="{{route('all.resent.view',Auth::user()->username)}}" class="{{ (request()->segment(2) == "resent_view_itmes" ) ? 'active' : ''}}  text-white transition duration-300/60 hover:text-amber-600"> Resent view </a>
            @endauth
            <a href="" class="text-white transition duration-300/60 hover:text-amber-600"> Orders </a>
        </div>
    </div>
</div>