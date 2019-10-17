<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('', 'Soofa Laravel Demo') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <i class="fa fa-shopping-cart ml-1"></i>
                        <a href="{{route('cart.index')}}" style="text-decoration: none">
                            <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</span></a>

                    </li>
            </ul>
        </div>
    </div>
</nav>