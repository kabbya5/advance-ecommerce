
<header class="navbar bg-blue-800">
    <div class="xl:w-5/6 mx-auto">
        <div class="hidden lg:block">
            @include('layouts.navbar._shared._topbar')
        </div>
        <div id="midNav" class="py-5 lg:py-3">
            @include('layouts.navbar._shared._midnav')         
        </div>
        <div id="bottomNav" class="py-2 hidden lg:block">
            @include('layouts.navbar._shared._bottomnav')         
        </div>
        @include('layouts.navbar._shared._responsive-nav')
    </div>
</header> 
    
    

<script type="text/javascript">
    $(document).ready(function() {
        $("#nav-togoler").click(function () {
            $("#menu-items").toggle();
        });
        // Category and Nav  Responsive 
        $("#category-list").hide();           
        $("#menu").click(function () {
            $("#menu-list").show(800);
            $("#category-list").hide();
        });
        $("#category").click(function () {
            $("#category-list").show(800);
            $('#menu-list').hide();   
        });
        $("#menu").on('click', function() {
            $('#menu').addClass('active');
            $('#category').removeClass('active');
        });
        $("#category").on('click', function() {
            $('#category').addClass('active');
            $('#menu').removeClass('active');
        });
    });
</script>