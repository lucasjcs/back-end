<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix("css/style.css") }}">
</head>
<body>
<header class="container-fluid @yield('class-header')" id="header">
    <div class="container">
        <h1 id="logo">
            <a href="/">
                <img src="/img/logo.svg" alt="logo">
            </a>
        </h1>
        <a href="/" id="minha-conta"><i class="fa fa-user" aria-hidden="true"></i></a>
    </div>
</header>

@yield('content')

<script src="js/vendor/jquery-3.2.1.min.js"></script>
<script src="js/vendor/tether.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
</body>
</html>