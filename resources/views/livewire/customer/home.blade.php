<div>
    <x-slot:wrapper>home</x-slot:wrapper>

    <!-- == PROMO SLIDER ================== -->
    <section class="promo-slider _parallax">
        <div class="promo-slider__decor_1 layer" data-depth="0.30">
            <img src="/vendor/joolie/img/promo-slider/flowers1.png" alt="flowers">
        </div>
        <div class="promo-slider__decor_2 layer" data-depth="0.15">
            <img src="/vendor/joolie/img/promo-slider/flowers2.png" alt="flowers">
        </div>
        <div class="promo-slider__bg swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide ibg">
                    <img src="/vendor/joolie/img/promo-slider/BGimg.jpg" alt="bg">
                </div>
            </div>
        </div>
        <div class="promo-slider__content">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="promo-slider__inner">
                            <div class="promo-slider__suptitle suptitle">
                                <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="circles"></span>
                                get your chance
                            </div>
                            <h1 class="promo-slider__title title-1">
                                be charming <br>
                                more than ever
                            </h1>
                            <div class="promo-slider__subtitle">
                                <strong>50% off</strong> on every product here.
                            </div>
                            <a href="{{ route('customer.shop') }}" class="btn-default">
                                Shop now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- == // PROMO SLIDER ================== -->

    <!-- == LOGOS BLOCK ================== -->
    <div class="logos-block">
        <div class="container">
            <ul class="logos-block__list">
                <li>
                    <div class="logos-block__item">
                        <img src="/vendor/joolie/img/logo/logo1.svg" alt="logo">
                    </div>
                </li>
                <li>
                    <div class="logos-block__item">
                        <img src="/vendor/joolie/img/logo/logo2.svg" alt="logo">
                    </div>
                </li>
                <li>
                    <div class="logos-block__item">
                        <img src="/vendor/joolie/img/logo/logo3.svg" alt="logo">
                    </div>
                </li>
                <li>
                    <div class="logos-block__item">
                        <img src="/vendor/joolie/img/logo/logo4.svg" alt="logo">
                    </div>
                </li>
                <li>
                    <div class="logos-block__item">
                        <img src="/vendor/joolie/img/logo/logo5.svg" alt="logo">
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- == // LOGOS BLOCK ================== -->

    <!-- == PRODUCTS CATEGORY ================== -->
    <section class="products-category">
        <div class="container">
            <div class="products-category__head head">
                <div class="head__suptitle suptitle">
                    get your
                    <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                    chance
                </div>
                <h3 class="head__title title-3">
                    Explore our collections
                </h3>
                <div class="head__text text">Discover our top categories: Accessories, Wedding Dresses, Decorations, and Wedding Suits.</div>
            </div>
        </div>
        <div class="products-category__list swiper-container" data-mobile="false">
            <div class="swiper-wrapper">
                @foreach ($categoryProducts as $categoryProduct)
                    <div class="swiper-slide">
                        <a href="{{ route('customer.shop-category', $categoryProduct->id) }}" class="products-category__item category-card">
                            <div class="category-card__front">
                                <div class="category-card__img ibg">
                                    <img src="/vendor/joolie/img/products-category/0{{ $loop->iteration }}.jpg" alt="img">
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__icon">
                                        <img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon">
                                    </div>
                                    <h5 class="category-card__title">{{ $categoryProduct->name }}</h5>
                                </div>
                            </div>
                            <div class="category-card__back">
                                <div class="category-card__img ibg">
                                    <img src="/vendor/joolie/img/products-category/0{{ $loop->iteration }}.jpg" alt="img">
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__icon">
                                        <img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon">
                                    </div>
                                    <h5 class="category-card__title">{{ $categoryProduct->name }}</h5>
                                    <span class="btn-default">View Products</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="slider-pagination"></div>
        </div>
    </section>
    <!-- == // PRODUCTS CATEGORY ================== -->

    <!-- == POPULARS PRODUCTS ================== -->
    <section class="popular-products _parallax">
        <div class="popular-products__decor_1 layer" data-depth="0.30">
            <img src="/vendor/joolie/img/populsr-products/decor1.png" alt="flowers">
        </div>
        <div class="popular-products__decor_2 layer" data-depth="0.30">
            <img src="/vendor/joolie/img/populsr-products/decor2.png" alt="flowers">
        </div>
        <div class="container">
            <div class="popular-products__head head">
                <div class="head__suptitle suptitle">
                    look
                    <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                    here
                </div>
                <h3 class="head__title title-3">
                    Popular products
                </h3>
            </div>
            <ul class="popular-products__nav">
                <li>
                    <a href="#tab-0" class="popular-products__link popular-products__triggers active">all</a>
                </li>
                @foreach ($categoryProducts as $categoryProduct)
                    @if (count($categoryProduct->products) != 0)
                        <li>
                            <a href="#tab-{{ $categoryProduct->id }}" class="popular-products__link popular-products__triggers">{{ $categoryProduct->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
            <div id="tab-0" class="popular-products__tabs-content active">
                <ul class="popular-products__list">
                    @foreach ($products->take(6) as $product)
                        <li>
                            <div class="card">
                                <div class="card__img ibg">
                                    <div class="card__label-wrap">
                                    </div>
                                    <a href="{{ route('customer.product-detail', $product->id) }}">
                                        <img src="{{ asset('storage/' . $product->picture) }}" alt="img">
                                    </a>
                                </div>
                                <div class="card__bottom">
                                    <div class="card__title text">{{ $product->name }}</div>
                                    <span class="card__price">Rp. {{ number_format($product->price, 0, ',', '.') }},-</span>
                                    <a href="#" class="card__like">
                                        <img class="img-svg" src="/vendor/joolie/img/icons/icon-send.svg" alt="icon">
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            @foreach ($categoryProducts as $categoryProduct)
                @if (count($categoryProduct->products) != 0)
                    <div id="tab-{{ $categoryProduct->id }}" class="popular-products__tabs-content">
                        <ul class="popular-products__list">
                            @foreach ($categoryProduct->products->take(6) as $product)
                                <li>
                                    <div class="card">
                                        <div class="card__img ibg">
                                            <div class="card__label-wrap">
                                            </div>
                                            <a href="{{ route('customer.product-detail', $product->id) }}">
                                                <img src="{{ asset('storage/' . $product->picture) }}" alt="img">
                                            </a>
                                        </div>
                                        <div class="card__bottom">
                                            <div class="card__title text">{{ $product->name }}</div>
                                            <span class="card__price">Rp. {{ number_format($product->price, 0, ',', '.') }},-</span>
                                            <a href="#" class="card__like">
                                                <img class="img-svg" src="/vendor/joolie/img/icons/icon-send.svg" alt="icon">
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endforeach
            <a href="{{ route('customer.shop') }}" class="btn-default">view all products</a>
        </div>
    </section>
    <!-- == // POPULARS PRODUCTS ================== -->

    <!-- == TEXT VIDEO BLOCK ================== -->
    <!-- == // TEXT VIDEO BLOCK ================== -->

    <!-- == ADVANTAGES ================== -->
    <section class="advantages">
        <div class="container">
            <ul class="advantages__list">
                <li>
                    <div class="advantages__item">
                        <div class="advantages__icon">
                            <img src="/vendor/joolie/img/advantages/icon-dress.svg" alt="icon">
                        </div>
                        <h5 class="advantages__title title-5">wide selection</h5>
                        <div class="advantages__text text">А huge number of products for your celebration day.</div>
                    </div>
                </li>
                <li>
                    <div class="advantages__item">
                        <div class="advantages__icon">
                            <img src="/vendor/joolie/img/advantages/icon-delivery.svg" alt="icon">
                        </div>
                        <h5 class="advantages__title title-5">fast Delivery</h5>
                        <div class="advantages__text text">We deliver the next day after the order, as you wish.</div>
                    </div>
                </li>
                <li>
                    <div class="advantages__item">
                        <div class="advantages__icon">
                            <img src="/vendor/joolie/img/advantages/icon-girl.svg" alt="icon">
                        </div>
                        <h5 class="advantages__title title-5">individual approach</h5>
                        <div class="advantages__text text">We discuss all the little things you need and want.</div>
                    </div>
                </li>
                <li>
                    <div class="advantages__item">
                        <div class="advantages__icon">
                            <img src="/vendor/joolie/img/advantages/icon-idea.svg" alt="icon">
                        </div>
                        <h5 class="advantages__title title-5">Creative ideas</h5>
                        <div class="advantages__text text">Our designers are full of new creative ideas for you.</div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- == // ADVANTAGES ================== -->

    <!-- == INSTAGRAM BLOCK ================== -->
    <section class="instagram-block _parallax">
        <div class="instagram-block__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/photo/decor2.png" alt="flowers">
        </div>
        <div class="instagram-block__column_1">
            <div class="instagram-block__text-wrap">
                <div class="instagram-block__head head">
                    <div class="head__suptitle suptitle">
                        <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                        <span class="left">our</span> instagram
                    </div>
                    <h3 class="head__title title-3">
                        be closer
                    </h3>
                    <div class="head__text text">More actions and bonuses you can find in our Instagram.</div>
                </div>
                <a href="#" class="instagram-block__link">
                    follow us <span><img class="img-svg" src="/vendor/joolie/img/icons/Arrow-right.svg" alt="arrow"></span>
                </a>
            </div>
        </div>
        <div class="instagram-block__column_2">
            <ul class="instagram-block__img-list">
                <li>
                    <span class="instagram-block__img ibg">
                        <img src="/vendor/joolie/img/instagram-block/01.jpg" alt="img">
                    </span>
                </li>
                <li>
                    <span class="instagram-block__img ibg">
                        <img src="/vendor/joolie/img/instagram-block/02.jpg" alt="img">
                    </span>
                </li>
                <li>
                    <span class="instagram-block__img ibg">
                        <img src="/vendor/joolie/img/instagram-block/03.jpg" alt="img">
                    </span>
                </li>
                <li>
                    <span class="instagram-block__img ibg">
                        <img src="/vendor/joolie/img/instagram-block/04.jpg" alt="img">
                    </span>
                </li>
            </ul>
        </div>
    </section>
    <!-- == // INSTAGRAM BLOCK ================== -->
</div>
