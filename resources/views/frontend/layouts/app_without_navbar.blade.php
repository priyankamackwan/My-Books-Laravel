<!doctype html>
<html lang="en">
    
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@yield('meta_tags')

        @include('frontend.layouts.header')
        @yield('styles')


</head>
<body>
        
        @yield('content') 
        @include('frontend.layouts.models')
       
        @include('frontend.layouts.footer')
        @include('frontend.layouts.script')

        @yield('script')        
</body>
</html>