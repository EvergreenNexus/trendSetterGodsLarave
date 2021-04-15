<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TrendSetterGods</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">



</head>

<body>
    @include('dashboard.product-errors')

    <header class="header bg-light">
        <img class="brand" src="{{ asset('storage/images/logos/TSG_fulllogo_noborder.png') }}" />
    </header>

    <main class="container-fluid w-100 main d-flex justify-content-between align-items-stretch px-0 ">
        <aside class=" aside bg-dark  text-white ">
            <span class="pb-2 inner-aside">
                <ul class="nav flex-column text-center">
                    <h3 class="">TrendSetterGods</h3>
                    <hr class="bg-light" />
                    <li class="nav-item">
                        <a class="nav-link active" href="/men">Men Shoes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/women">Women Shoes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/youth">Youth Shoes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/apparel">Apparel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/used">Used</a>
                    </li>
                </ul>
                <ul class="nav flex-column">
                    <li class="my-2">
                        <a class="btn btn-primary btn-block" href="#" role="button">create product</a>
                    </li>
                    <li class="my-2">
                        <form role="form" method="POST" action="{{ url('/cache-products') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-block">update website</button>
                        </form>
                    </li>
                </ul>
                <ul class="nav flex-column ">
                    <a class="btn btn-danger btn-block" href="#" role="button">logout</a>
                </ul>
            </span>

        </aside>
        <div class="mt-3 content ">
            @yield('content')
        </div>
    </main>
</body>

<script>
    $('.toast').toast('show');

    $('.toast').on('shown.bs.toast', function() {
        setTimeout(() => {
            $('.toast').toast('hide');
        }, 4000);
    })

    $('.clear').click(function(e) {
        $('.form').trigger('reset');
    })

</script>

</html>
