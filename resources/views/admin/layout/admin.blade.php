<!DOCTYPE html>
<html>
<head>
    <title>Admin Area</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"><link rel="stylesheet" href="{{asset('/dist/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('/dist/css/app.css')}}">

</head>
<body id="admin-body">
@include('admin.layout.includes.header')
<div class="container my-3">
        @include('inc.messages')

        <div class="row">
            <div class="col-md-3 col-sm-3">
                @include('admin.layout.includes.sidenav')
            </div>
            <div class="col-md-9 col-sm-9">
                @yield('content')
            </div>
        </div>
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="{{asset('dist/js/popper.js')}}"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@yield("scripts")
<script src="https://kit.fontawesome.com/fa3dfb9184.js" crossorigin="anonymous"></script>

<script src="{{asset('dist/js/app.js')}}"></script>
</body>
</html>