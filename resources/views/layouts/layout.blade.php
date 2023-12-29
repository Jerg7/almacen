<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Almacén - Seguros Miranda, C.A.</title>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximun-scale=1.0">

    @include('header.headerCSS')
</head>
@include('menu.index')
    <div class="container">
        <div class="col md-2"></div>

        <div class="col md-8"></div>
        
        <br>
        @yield('content')

        <div class="col md-2"></div>
    </div>
<footer>
    @include('footer.footerJS')
    @yield('script')
</footer>
</html>