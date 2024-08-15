<div>
    <x-slot:wrapper>product-page _padding-top</x-slot:wrapper>

    <!-- == HERO ================== -->
    <section class="hero _parallax">
        <div class="hero__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/hero/decor.png" alt="flowers">
        </div>
        <div class="hero__img ibg">
            <img class="lazy" data-src="/vendor/joolie/img/hero/BG img.jpg" src="/vendor/joolie/img/hero/placeholder.jpg" alt="img">
        </div>
        <div class="hero__body container">
            <h1 class="hero__title title-2">
                Detail Produk
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('customer.shop') }}">Toko</a></li>
                    <li class="breadcrumb__item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->
    <!-- == PRODUCT PAGE CONTENT ================== -->
    <section class="product-page__content _parallax">
        <div class="product-page__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/photo/decor.png" alt="flowers">
        </div>
        <div class="container">
            <div class="product-page__top top-product-page">
                <div class="top-product-page__column-1">
                    <div class="product-page__slider slider-product">
                        <div class="slider-product__main swiper-container">
                            <div class="detail"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="zoom" src="{{ asset('storage/' . $product->picture) }}" alt="img" data-zoom="{{ asset('storage/' . $product->picture) }}">
                                </div>
                            </div>
                        </div>
                        <div class="slider-product__thumbs swiper-container"></div>
                    </div>
                </div>
                <div class="top-product-page__column-2">
                    <div class="top-product-page__row-1">
                        <h4 class="top-product-page__title title-4">
                            {{ $product->name }}
                        </h4>
                    </div>
                    <div class="top-product-page__row-2">
                        <div class="top-product-page__price-wrap">
                            <div class="top-product-page__price">Rp. {{ number_format($product->price, 0, ',', '.') }},-</div>
                        </div>
                    </div>
                    <div class="top-product-page__row-3 text">
                        Kategori Produk : <a class="color-pink" href="{{ route('customer.shop-category', $product->categoryProduct->id) }}">{{ $product->categoryProduct->name }}</a>
                        <br>
                        Stok Produk : {{ number_format($product->stock, 0, ',', '.') }}
                    </div>
                    <form class="mt-4" wire:submit.prevent="save">
                        <div class="top-product-page__row-4">
                            <div class="quantity">
                                <div class="quantity__button quantity__button_minus" wire:click="quantityMinus"></div>
                                <div class="quantity__input">
                                    <input autocomplete="off" type="text" max="{{ $product->stock }}" wire:model="quantity">
                                </div>
                                <div class="quantity__button quantity__button_plus" wire:click="quantityPlus"></div>
                            </div>
                        </div>
                        <div class="top-product-page__row-5">
                            @if ($productAlreadyInCart)
                                <button type="button" class="top-product-page__btn-add-to-card">Sudah di Keranjang</button>
                            @else
                                <button type="submit" class="top-product-page__btn-add-to-card">Tambah ke Keranjang</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
            <div class="product-page__description description-produc-page">
                <div class="text-content">
                    <h5>Deskripsi</h5>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- == // PRODUCT PAGE CONTENT ================== -->

</div>
