@extends('layouts.app')
@section('content')
    {{-- Start Navbar  --}}
    @include('layouts.navbar.navbar')
    {{-- End Navbar  --}}
    <div class="w-4/5 mx-auto py-8 bg-white border">
       <p class="px-3"> {{ $privacy}}</p>
    </div>
@endsection