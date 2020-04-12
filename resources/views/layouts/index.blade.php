<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>MVC + L</title>
    <link rel="stylesheet" href="/dist/main.css">
</head>

<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a class="p-2 text-dark" href="/">Todo</a>
    </h5>
    @if(isset($_SESSION['auth']) && $_SESSION['auth'])
        <a class="btn btn-outline-primary" href="/logout">Logout</a>
    @else
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="/login">Sign in</a>
            <a class="p-2 text-dark" href="/regist">Sign up</a>
        </nav>
    @endif
</div>

<div class="container">
    @yield('content')
</div>

<script src="/dist/main.js"></script>
@stack('script')

</body>
</html>
