<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
 
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
               
            
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Giriş') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Kayıt Ol') }}</a></li>
                        @else
                        
                        
            @can('user-list')<li><a class="nav-link" href="{{ route('users.index') }}">Kullanıcılar</a></li>@endcan
            @can('role-list')<li><a class="nav-link" href="{{ route('roles.index') }}">Roller</a></li>@endcan
            @can('product-list')<li><a class="nav-link" href="{{ route('products.index') }}">Ürünler</a></li>@endcan
            @can('order-list')<li><a class="nav-link" href="{{ route('productlist') }}">Alışveriş</a></li>@endcan
            @can('category-list')<li><a class="nav-link" href="{{ route('categories.index') }}">Kategoriler</a></li>@endcan
            @can('unit-list')<li><a class="nav-link" href="{{ route('units.index') }}">Birim</a></li>@endcan
            @can('brand-list')<li><a class="nav-link" href="{{ route('brands.index') }}">Marka</a></li>@endcan   
            @can('status-list')<li><a class="nav-link" href="{{ route('status.index') }}">Durum</a></li>@endcan            
                           
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Çıkış') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="py-4">
            <div class="container">
            @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
