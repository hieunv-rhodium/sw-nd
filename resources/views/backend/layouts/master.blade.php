<!DOCTYPE html>
<html lang="en">
<head>

    @include('backend.layouts.meta')

    <link rel="icon" href="../../favicon.ico"/>

    @yield('title')

    @include('backend.layouts.css')

    @yield('css')

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        @include('backend.layouts.navtop')
        
        @include('backend.layouts.navleft')

        <div id="app">

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                @yield('content')
            
                @include('backend.layouts.bottom')
            
            </div> <!-- /container -->

        </div>    
    </div>


    @include('backend.layouts.scripts')

    @include('Alerts::show')
    
    @yield('scripts')

</body>

</html>