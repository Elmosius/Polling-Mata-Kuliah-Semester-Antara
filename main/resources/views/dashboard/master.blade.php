<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Polling Mata Kuliah</title>

    <link rel="stylesheet" href="{{asset('https://cdn.jsdelivr.net/npm/@docsearch/css@3')}}">
    <link rel="stylesheet" type="text/css" href="{{asset("https://unpkg.com/trix@2.0.8/dist/trix.css")}}">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css')}}"
          rel="stylesheet">
    <link href="{{asset('/css/dashboard.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    {{-- CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>

<!- Header -->
@include('dashboard.header')

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('dashboard.sidebar')

        <!-- Konten -->
        @yield('content')

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js')}}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js')}}"></script>
<script src="{{asset('/js/dashboard.js')}}"></script>
<script src="{{asset('/js/color-modes.js')}}"></script>
@yield('js-tambahan')
<script>
    $(document).ready(function() {
        $("#myAlert").show();
        setTimeout(function() {
            $("#myAlert").alert('close');
        }, 5000);
    });

</script>
</body>
</html>
