<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite('resources/sass/app.scss')
</head>
<body class="border-top-wide border-primary d-flex flex-column">

    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <div style="vertical-align: top;
                        display: inline-block;
                        text-align: center;
                        width: 120px;">
                            <img src="{{ url('img/books.png') }}"  height="36" alt="Library Project"
                                class="" style="">
                                <span style="display: block; padding-top: 10px; font-size: 15pt; ">Library Project</span>
                        </div>
                    </a>
                </h1>
            </div>

            @yield('content')

        </div>
    </div>

    @vite('resources/js/app.js')
</body>
</html>
