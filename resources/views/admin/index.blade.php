<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.partials.head')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')



    @yield('content')

  @include('admin.partials.footer')

<!-- REQUIRED SCRIPTS -->
    @include('admin.partials.js')
</body>
</html>
