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

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">


</head>

<body>
    
    <div class="d-flex container-fluid">
        <aside class="aside bg-dark  mr-5">
            <h3 class="text-center text-white  brand">TrendSetterGods</h3>
            <hr />
            <ul>
                <li>list of products</li>
                <li>create products</li>
            </ul>
        </aside>
        <main class="main d-flex flex-column">
            <header class="header bg-light">
                <img height="100" src="{{ asset('storage/images/logos/TSG_fulllogo_noborder.png') }}" />
            </header>
            <div class="mt-3 ">

            @yield('content')    
                <div>
        </main>
    </div>



</body>

</html>
