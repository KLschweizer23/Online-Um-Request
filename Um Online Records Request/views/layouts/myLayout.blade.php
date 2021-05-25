@startSession
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link type="text/css" rel="stylesheet" href="./css/myBootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src="popper.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="jquery.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap.min.js"></script>

    <link rel="stylesheet" href="assets/vendor/animate.css/animate.min.css">
    <script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

    @insertPlugins
    @logoutFunction
    @roleSetter
    @registerFunction
    @loginFunction
    @extraFunctions

</head>

<body class="bg-um {{$setBackground}} p-0 m-0">
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand p-0 fixed-top navbar-dark bg-um-inverted nav-shadow">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="nav navbar-nav p-0 w-0">
                        <li class="nav-item">
                            <a class="nav-link text-light p-4 text-white" href="Home.php">Home</a>
                        </li>
                        @guest
                        @elseguest
                        <li class="nav-item">
                            <a class="nav-link text-light p-4 text-white" href="Dashboard.php">
                                <span>Dashboard</span>
                            </a>
                        </li>
                        @endguest
                    </ul>
                </div>
                @guest
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="nav navbar-nav p-0 w-0">
                        <li class="nav-item">
                            <a class="nav-link text-light p-4 text-white" href="Login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light p-4 text-white" href="Option.php">Register</a>
                        </li>
                    </ul>
                </div>
                @elseguest
                <ul class="nav navbar-nav p-0 w-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light p-4 text-white" href="#" id="navbardrop" data-toggle="dropdown">
                            {{$blade->getCurrentUser()}}
                        </a>
                        <div class="dropdown-menu">
                            <form method="POST">
                                <button class="dropdown-item" type="submit" name="submit">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </li>
                </ul>
                @endguest
            </div>
        </nav>

        <main class="py-4 mt-5">
            @yield('myContent')
        </main>

    </div>
</body>

</html>