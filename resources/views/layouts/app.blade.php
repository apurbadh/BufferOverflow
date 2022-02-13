<html lang="en">
<head>
    <title>BufferOverflow - @yield('title')</title>
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css"
        rel="stylesheet"
    />
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"
        defer
    ></script>
    <style>
        body{
            background-color: #eee;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Container wrapper -->
    <div class="container">
        <!-- Toggle button -->
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarButtonsExample"
            aria-controls="navbarButtonsExample"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Buffer Overflow</a>
                </li>
            </ul>
            <!-- Left links -->
            @guest
            <div class="d-flex align-items-center">
                <a type="button" class="btn btn-link px-3 me-2" href="{{ route('login') }}">
                    Login
                </a>
                <a type="button" class="btn btn-primary me-3" href="{{ route('register') }}">
                    Register
                </a>
            </div>
            @endguest
            @auth
                <a type="button" class="btn btn-primary" style="margin-top: -10px; margin-right: 5px" href="{{ route('post.create') }}">Ask</a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-dark" style="margin-top: 5px">Logout</button>
                </form>
            @endauth
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
