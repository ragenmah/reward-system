<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;1,100;1,200&display=swap"
        rel="stylesheet" />
    <title>Rewards</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Urbanist', sans-serif;
            background-color: #f1dfd8;
        }

        .btns {
            padding: 10px;
            font-size: 20px;
            background-color: #dfe4e7;
            cursor: pointer;
            border: 1px solid black;
            text-decoration: none;
            color: #000000;
        }

        .btns:hover {
            padding: 12px;
            font-size: 22px;
            background-color: #f5fafd;
            text-decoration: none;
            color: #000000;
        }

        .container-btns {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .header>h1 {
            font-size: 50;
        }

        .container-all {
            width: 100%;
            height: 100vh;
            padding: 10px 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

    </style>
    @stack('before-styles')
    @stack('after-styles')
</head>

<body>
    @yield('content')

    @stack('before-scripts')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
     <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    @stack('after-scripts')
</body>

</html>
