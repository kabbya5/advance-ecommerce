<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @livewireStyles
        {{-- Owl carousel  --}}
        <link rel="stylesheet" href="{{ asset('fontend/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('fontend/css/owl.theme.default.min.css') }}">
        {{-- toster  --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0- 
        alpha/css/bootstrap.css" rel="stylesheet">
         <!-- Toaster -->
         <link rel="stylesheet" type="text/css" 
         href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.8/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" type="text/css" 
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        @yield('link')
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-slate-200/60">
        <div class="">
            @yield('content')
        </div>
        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
       
    </div>

    @stack('modals')

    @livewireScripts
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- toster  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{ asset('fontend/js/owl.carousel.min.js') }}"></script>
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
    </script>
    <script>
        $(document).ready(function(){
            $('.add-wishlist').on('click',function(){
                var id = $(this).data('id');
                if(id){
                    $.ajax({
                        url: "{{url('add/wishlist') }}/"+id,
                        type:"GET",
                        dataType:"json",
                        success:function (data){
                            const Toast = Swal.mixin({
                                toast:true,
                                position:'top-end',
                                showCancelButton: false,
                                timer:3000,
                                timerProgressBar:true,
                                onOper: (toast) =>{
                                    toast:addEventListener('mouseenter',Swal.stopTimer)
                                    toast:addEvenTLisTener('mouseleave',Swal.resumeTimer)
                                }  
                            })
                            if($.isEmptyObject(data.error )){
                                Toast.fire({
                                    icon: 'success',
                                    title:data.success
                                })
                            }else{
                                Toast.fire({
                                    icon:'error',
                                    title: data.error,
                                })
                            }
                           
                        }
                    })
                }else{
                    alert('danger');
                }
                
            });

            // Add to Card 
            $('.add-cart').on('click',function (){
                var id = $(this).data('id');
                if(id){
                    $.ajax({
                        url:"{{ url('cart/add') }}/"+id,
                        type:"GET",
                        dataType:"json",
                        success:function(data){
                            window.location.reload();
                            const Toast = Swal.mixin({
                                toast:true,
                                position:'top-end',
                                showCancelButton: false,
                                timer:3000,
                                timerProgressBar:true,
                                onOper: (toast) =>{
                                    toast:addEventListener('mouseenter',Swal.stopTimer)
                                    toast:addEvenTLisTener('mouseleave',Swal.resumeTimer)
                                }  
                            }) 
                            Toast.fire({
                                icon: 'success',
                                title:data.success
                            })
                        }
                    })
                }
            })
        });
    </script> 
    @yield('script')

    </body>
</html>
