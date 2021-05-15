<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendSetterGods</title>

    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <script src="{{ asset('public/js/app.js') }}" ></script>


</head>

<body>
    @include('home.header')
    @yield('content')
</body>
<script>
    $(document).ready(function() {
        $('.toast').toast('show');

        $('.toast').on('shown.bs.toast', function() {
            setTimeout(() => {
                $('.toast').toast('hide');
            }, 4000);
        })
    })

</script>

</html>
