<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    {{config('app.name', 'Laravel')}} | @yield("title")
  </title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('/dist/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('/dist/css/header.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  @include("inc.navbar")
  <div class="container my-3">
    @include('inc.messages')
    @yield('content')
  </div>


  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a class="text-secondary" href="#">Back to top</a>
      </p>
      <p>
        <small>Developed by Aytaj Hasanova</small>
        <small>&copy;{{date("Y")}}</small>
      </p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});</script>
  <script src="https://kit.fontawesome.com/fa3dfb9184.js" crossorigin="anonymous"></script>
  @yield('scripts')
</body>

</html>