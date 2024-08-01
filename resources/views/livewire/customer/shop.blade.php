<div>
    <x-slot:wrapper>shop _padding-top</x-slot:wrapper>

    <!-- == HERO ================== -->
    <section class="hero _parallax">
        <div class="hero__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/hero/decor.png" alt="flowers">
        </div>
        <div class="hero__img ibg">
            <img src="/vendor/joolie/img/hero/BG img.jpg" alt="img">
        </div>
        <div class="hero__body container">
            <h1 class="hero__title title-2">
                Shop
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb__item active" aria-current="page">Shop</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->

    <!-- == SHOP CONTENT ================== -->
    <section class="shop__content _parallax">
        <div class="shop__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/photo/decor4.png" alt="flowers">
        </div>
        <div class="container">
            <div class="shop__head head-shop">
                <div class="head-shop__column_1">
                    <div class="form-search form-search_open">
                        <input id="search-2" type="text" class="form-search__input" placeholder="Search" wire:model="keyword" wire:keyup.debounce.200ms="reloadProducts">
                        <label for="search-2" class="form-search__label">
                            <span>
                                <img src="/vendor/joolie/img/icons/search.svg" alt="search">
                            </span>
                        </label>
                        <button type="submit" class="form-search__submit">
                            <span>
                                <img src="/vendor/joolie/img/icons/search.svg" alt="submit">
                            </span>
                        </button>
                    </div>
                </div>
                <div class="head-shop__column_2">
                    <div class="head-shop__product-quantity">
                        There are <strong>{{ number_format(count($products), 0, ',', '.') }} products.</strong>
                    </div>
                </div>
                <div class="head-shop__mobile-btn">
                    <span>
                        <img src="/vendor/joolie/img/icons/equalizer.svg" alt="icon">
                    </span>
                </div>
            </div>
            <div class="shop__body body-shop">
                <div class="body-shop__column_1 shop-aside">
                    <div class="shop-aside__mobile-btn-close">
                        <span>
                            <img src="/vendor/joolie/img/icons/cancel.svg" alt="close">
                        </span>
                    </div>
                    <div class="shop-aside__categories categories-list">
                        <h4 class="shop-aside__title">Categories</h4>
                        <ul>
                            <li>
                                <a href="/" wire:click.prevent="updateCategoryProductID(null)" @if ($categoryProductID == null) style="color: pink" @endif>All
                                    <span @if ($categoryProductID == null) style="color: pink" @endif>({{ number_format($countAllProducts, 0, ',', '.') }})</span></a>
                            </li>
                            @foreach ($categoryProducts as $categoryProduct)
                                <li>
                                    <a href="/" wire:click.prevent="updateCategoryProductID({{ $categoryProduct->id }})" @if ($categoryProductID == $categoryProduct->id) style="color: pink" @endif>{{ $categoryProduct->name }}
                                        <span @if ($categoryProductID == $categoryProduct->id) style="color: pink" @endif>({{ number_format(count($categoryProduct->products), 0, ',', '.') }})</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="body-shop__column_2 ">
                    <ul class="body-shop__list">
                        @foreach ($products as $product)
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
            </div>
        </div>
    </section>
    <!-- == // SHOP CONTENT ================== -->
</div>
