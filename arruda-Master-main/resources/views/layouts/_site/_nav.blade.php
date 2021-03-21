<nav class="colorlib-nav" role="navigation">
    <div class="top-menu">
        <div class="container">
            <div class="row">
                <div class="col-sm-7 col-md-9">
                    <div id="colorlib-logo"><a href="{{ route('/') }}" >Arruda Calçados</a></div>
                </div>
                <div class="col-sm-5 col-md-3">
                    <form action="{{route('search')}}" method="post" class="search-wrap">
                            @csrf
                        <div class="form-group">
                            <input type="search"  name="search" class="form-control search" placeholder="Search">
                            <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 text-left menu-1">
                    <ul>
                        <li><a href="{{ route('index') }}">Home</a></li>

{{--                        --}}
{{--                        <li class="has-dropdown active">--}}
{{--                            <a href="{{ route('men') }}">Masculino</a>--}}
{{--                            <ul class="dropdown">--}}
{{--                                <li><a href="{{ route('product_detail') }}">Product Detail</a></li>--}}
{{--                                <li><a href="{{ route('cart') }}">Shopping Cart</a></li>--}}
{{--                                <li><a href="{{ route('checkout') }}">Checkout</a></li>--}}
{{--                                <li><a href="{{ route('order_complete') }}">Order Complete</a></li>--}}
{{--                                <li><a href="{{ route('add_to_wishlist') }}">Wishlist</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li><a href="{{ route('women') }}">Feminino</a></li>--}}
{{--                        --}}

                        <li><a href="{{ route('sobre') }}">Sobre</a></li>
                        <li><a href="{{ route('contato') }}">Contato</a></li>
                        <li class="cart"><a href="{{ route('cart') }}"><i class="icon-shopping-cart"></i> Cart [0]</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <div class="row">
                        <div class="owl-carousel2">
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Produtos com 25% de desconto! Liquidação.</a></h3>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col">
                                    <h3><a href="#">Produtos com  até 50% de desconto!.</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
