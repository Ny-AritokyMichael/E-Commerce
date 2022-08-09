<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('ecommerce/css/bootstrap.min.css') }}">

<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('ecommerce/css/font-awesome.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

<!-- Custom CSS -->
<link rel="stylesheet" href="{{ asset('ecommerce/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('ecommerce/style.css') }}">
<link rel="stylesheet" href="{{ asset('ecommerce/css/responsive.css') }}">




<div class="header-area">

    <div class="container">
        <div class="row">
            {{-- <form class="ps-search--header" action=" {{ route('accueil') }} " method="get">
                <input class="form-control" type="text" placeholder="Rechercher un produit…" name="recherche">
                <button><i class="ps-icon-search"></i></button>
            </form> --}}
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        {{-- <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                        <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li> --}}
                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a></li>
                        <li><a href="{{ route('login') }}"><i class="fa fa-user"></i> Registred</a></li>
                        <x-dropdown align="right" width="48">
                            <li> @auth
                                    <x-slot name="trigger">
                                        <i class="fa fa-user"></i> {{ Auth::user()->name }}</a>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                                                    this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>


                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->

                    </x-slot>
                    </x-dropdown>
                @endauth
                </li>
                </ul>
            </div>
        </div>

        {{-- <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                    class="key">currency :</span><span class="value">USD
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span
                                    class="key">language :</span><span class="value">English
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div> --}}
    </div>
</div> <!-- End header area -->

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="./">
                            {{-- <img src="#"> --}}
                            Ny-Ari Boutique</a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    {{-- <a href=" {{ route('panier') }}">Cart - <span class="cart-amunt"></span> <i --}}
                    <a href=" {{ route('panier') }}">Cart - <span class="cart-amunt"></span> <i
                            class="fa fa-shopping-cart"></i>
                        @auth
                            <span class="product-count">
                                {{-- {{ Cart::session(auth()->id())->getContent()->count() }} --}}
                            </span></a>
                    @endauth

                </div>
                <form class="ps-search--header" action=" {{ route('accueil') }} " method="get">
                    <input class="form-control" type="text" placeholder="Rechercher un produit…" name="recherche">
                    <button><i class="ps-icon-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class=""><a href=" {{ route('accueil') }} ">Home</a>
                    </li>
                    <li class=""><a href=" {{ route('recette') }} ">List of repices</a></li>
                    {{-- @auth --}}
                        @if (Auth::user()->est_admin == true)
                        <li class=""><a href=" {{ route('inserer-recette') }} ">insert repices</a></li>
                        @endif
                    {{-- @endauth --}}
                    {{-- </ul> --}}
                    </li>
                    <li class=""><a href=" {{ route('panier') }} ">Cart</a></li>
                    <li class=""><a href=" {{ route('porte-feuille/recharger') }} ">Porte feuille</a>
                        {{-- @auth
                            @if (Auth::user()->est_admin == true)
                                <ul class="">
                                    <li class=""><a href=" {{ route('validation-recharge') }} ">Validation de porte
                                            feuille</a></li>
                                </ul>
                            @endif
                        @endauth --}}
                    </li>
                    @auth
                    {{-- @if (Auth::user()->est_admin == true)
                    <li class=""><a href=" {{ route('stock') }} ">Stock</a></li>
                    {{-- <li class=""><a href="#">Recette</a> --}}
                        {{-- <ul class=""> --}}


                            {{-- <li class=""><a href=" {{ route('stock') }} ">Statistique</a>
                                {{-- <ul class=""> --}}
                            {{-- <li class=""><a href=" {{ route('stat-vente-produit') }} ">Statistique vente
                                    produit</a></li>
                            <li class=""><a href=" {{ route('stat-vente-recette') }} ">Statistique vente
                                    recette</a></li> --}}
                            {{-- </ul> --}}
                            </li>
                        {{-- @endif --}}
                    @endauth
                </ul>
            </div>


            </ul>
        </div>

    </div>

</div>
</div> <!-- End mainmenu area -->
