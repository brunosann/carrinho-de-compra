<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script>
    const BASE_URL = '{{ env('APP_URL') }}'
  </script>
  <title>Integração PagSeguro</title>
</head>

<body class="bg-gray-100">

  @include('header')

  <x-cart />

  @yield('content')

  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script')

</body>

</html>