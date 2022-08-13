<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/favicon.ico" />
  <link href="{{ asset('css/global.css') }}" rel="stylesheet" type="text/css" >
  <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="{{ asset('js/js.js') }}" defer></script>
</head>
<body>
    <div class="nav-bar">
        @if (auth()->id())
           <p>Welcome: {{auth()->user()->name}}</p> 
        @endif
        <ul>
            <li><a class="active" href="/">Home</a></li>
            @auth
            <li>
                <a href="/posts/manage">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Manage Posts
                </a>
            </li>
            <li>
                <form class="logout-form" method="POST" action="/logout">
                    @csrf
                    <button type="submit">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        {{-- <i class="fa-solid fa-door-closed"></i> --}}
                        Logout
                    </button>
                </form>
            </li>
            @else
             <li><a href="/login">Login</a></li>
            @endauth
        </ul>
        </div>
        <div class="nav-bar-mobile">
            <div class="icon-wrap">
                <i class="fa fa-bars fa-2x bars-icon" aria-hidden="true"></i>
                <i class="fa fa-times fa-2x close-icon" aria-hidden="true"></i>
            </div>
            <div class="dropdown-menu">
                @if (auth()->id())
                    <p class="welcome-text">Welcome: {{auth()->user()->name}}</p>
                @endif
                <ul>
                    <li><a class="active" href="/">Home</a></li>
                    @auth
                    <li>
                        <a href="/posts/manage">
                            <i class="fa fa-cog" aria-hidden="true"></i>
                            Manage Posts
                        </a>
                    </li>
                    <li>
                        <form class="logout-form" method="POST" action="/logout">
                            @csrf
                            <button type="submit">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                {{-- <i class="fa-solid fa-door-closed"></i> --}}
                                Logout
                            </button>
                        </form>
                    </li>
                    @else
                    <li><a href="/login">Login</a></li>
                    @endauth    
                </ul>
            </div>
    </div>

    @yield('content')

</body>
</html>