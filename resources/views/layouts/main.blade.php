<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="icon" href="{{ asset('images/logo_title.png') }}" type="image/png">
  <script src="https://kit.fontawesome.com/f1a60a6392.js" crossorigin="anonymous"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="w-screen h-screen font-quicksand">
  <h1 class="text-"></h1>
  @yield('content')
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>
</html>