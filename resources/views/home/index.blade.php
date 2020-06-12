<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('home.partials.head')
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    @include('home.partials.header')

    @include('home.partials.herobegin')


   @yield('content')

@include('home.partials.foother')

@include('home.partials.js')


</body>

</html>
