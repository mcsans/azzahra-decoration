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
                                dapatkan kesempatanmu
                            </div>
                            <h1 class="promo-slider__title title-1">
                                tampil mempesona <br>
                                lebih dari sebelumnya
                            </h1>
                            <div class="promo-slider__subtitle">
                                <strong>Diskon 30%</strong> untuk setiap produk di sini.
                            </div>
                            <a href="{{ route('customer.shop') }}" class="btn-default">
                                Belanja sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- == // PROMO SLIDER ================== -->

    <!-- == LOGOS BLOCK ================== -->
    <x-customer.section-logos />
    <!-- == // LOGOS BLOCK ================== -->

    <!-- == PRODUCTS CATEGORY ================== -->
    <section class="products-category">
        <div class="container">
            <div class="products-category__head head">
                <div class="head__suptitle suptitle">
                    dapatkan
                    <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                    kesempatanmu
                </div>
                <h3 class="head__title title-3">
                    Jelajahi koleksi kami
                </h3>
                <div class="head__text text">Temukan kategori terbaik kami: Aksesoris, Gaun Pernikahan, Dekorasi, dan Jas Pernikahan.</div>
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
                                    <span class="btn-default">Lihat Produk</span>
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
                    lihat
                    <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                    di sini
                </div>
                <h3 class="head__title title-3">
                    Produk Populer
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
                                    <a href="https://api.whatsapp.com/send?text={{ urlencode(route('customer.product-detail', $product->id)) }}" target="_blank" class="card__like">
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
                                            <a href="https://api.whatsapp.com/send?text={{ urlencode(route('customer.product-detail', $product->id)) }}" target="_blank" class="card__like">
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
            <a href="{{ route('customer.shop') }}" class="btn-default">lihat semua produk</a>
        </div>
    </section>
    <!-- == // POPULARS PRODUCTS ================== -->

    <!-- == TEXT VIDEO BLOCK ================== -->
    <!-- == // TEXT VIDEO BLOCK ================== -->

    <!-- == ADVANTAGES ================== -->
    <x-customer.section-advantages />
    <!-- == // ADVANTAGES ================== -->

    <!-- == INSTAGRAM BLOCK ================== -->
    <x-customer.section-instagram />
    <!-- == // INSTAGRAM BLOCK ================== -->
</div>
