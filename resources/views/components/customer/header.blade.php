@php
    use App\Models\Cart;
    use App\Models\CategoryProduct;

    $user = auth()->user()->id ?? 0;

    $countCarts = Cart::where('user_id', $user)->count();
    $categoryProducts = CategoryProduct::orderBy('name')->get();
@endphp

<header class="header">
    <div class="header__body">
        <div class="header__top">
            <div class="header__top-column" data-da="header__menu,last,600">
                <strong>Diskon 30%</strong> untuk semua produk, masukkan kode: AZZAHRA2024
            </div>
            <div class="header__top-column">
                Hubungi kami: <a href="https://wa.me/6285872349812" target="_blank">+62 858 723 498 12</a>
            </div>
        </div>
        <div class="header__main">
            <div class="header__burger">
                <div class="burger-wrap">
                    <div class="burger" data-activEl="header__menu">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <nav class="header__menu">
                <ul class="header__menu-list">
                    <li>
                        <span class="header__menu-link" style="cursor: pointer">
                            Ketegori
                        </span>
                        <ul class="header__menu-sublist">
                            @foreach ($categoryProducts as $categoryProduct)
                                <li>
                                    <a href="{{ route('customer.shop-category', $categoryProduct->id) }}" class="header__menu-sublink">{{ $categoryProduct->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('home') }}" class="header__menu-link">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.about') }}" class="header__menu-link">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.shop') }}" class="header__menu-link">
                            Toko
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="header__logo logo">
                <a href="{{ route('home') }}">
                    <img class="img-svg" src="/vendor/joolie/img/logo/logo.png" alt="logo">
                </a>
            </div>
            <div class="header__action">
                <ul class="header__action-list">
                    <li>
                        <a href="{{ route('customer.history') }}" class="header__action-link">
                            <span class="header__action-icon-wrap"><img src="/vendor/joolie/img/icons/order-completed-svgrepo-com.svg" alt="history"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.cart') }}" class="header__action-link">
                            <span class="header__action-icon-wrap"><img src="/vendor/joolie/img/icons/shopping-bag.svg" alt="user"></span>
                            <span class="header__action-count">{{ $countCarts }}</span>
                        </a>
                    </li>
                    <li>
                        @if (auth()->user())
                        @else
                        @endif

                        @guest
                            @if (!Request::is('login') && !Request::is('register'))
                                <a href="{{ route('login') }}" class="header__action-link">
                                    <span class="header__action-icon-wrap"><img src="/vendor/joolie/img/icons/user.svg" alt="user"></span>
                                    <span style="color: #555555; margin-left: 0.5rem;">Login</span>
                                </a>
                            @endif
                        @endguest

                        @auth
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button class="header__action-link" style="background-color: transparent;">
                                    <span class="header__action-icon-wrap"><img src="/vendor/joolie/img/icons/user.svg" alt="user"></span>
                                    <span style="color: #555555; margin-left: 0.5rem;">Logout</span>
                                </button>
                            </form>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
