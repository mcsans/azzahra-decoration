<div>
    <x-slot:wrapper>cart _padding-top</x-slot:wrapper>

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
                Keranjang Belanja
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('customer.shop') }}">Toko</a></li>
                    <li class="breadcrumb__item active" aria-current="page">Keranjang Belanja</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->

    <!-- == CART CONTENT ================== -->
    <section class="cart__content">
        <form action="checkout-1.html" class="container">
            <div class="block-column-2">
                <div class="column-1">
                    <div class="selected-products">
                        <div class="selected-products__head">
                            <div class="selected-products__head-col-1">Produk</div>
                            <div class="selected-products__head-col-2">Jumlah</div>
                            <div class="selected-products__head-col-3">Subtotal</div>
                        </div>
                        <ul class="selected-products__list">
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($cartProducts as $cartProduct)
                                @php
                                    $subtotal = $cartProduct->product->price * $cartQuantities[$cartProduct->id];
                                    $total += $subtotal;
                                @endphp

                                <li>
                                    <div class="card-selected-product">
                                        <div class="card-selected-product__img ibg">
                                            <a href="{{ route('customer.product-detail', $cartProduct->product->id) }}">
                                                <img src="{{ asset('storage/' . $cartProduct->product->picture) }}" alt="img">
                                            </a>
                                        </div>
                                        <div class="card-selected-product__inner">
                                            <div class="card-selected-product__row card-selected-product__row_1">
                                                <div class="card-selected-product__title">
                                                    <span>
                                                        {{ $cartProduct->product->name }}
                                                    </span>
                                                </div>
                                                <a href="/" class="card-selected-product__delete" wire:click.prevent="deleteCart({{ $cartProduct->id }})">
                                                    <span>
                                                        <img src="/vendor/joolie/img/icons/delete-grey.svg" alt="delete icon">
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="card-selected-product__row card-selected-product__row_2">
                                                <div class="card-selected-product__price-wrap">
                                                    <div class="card-selected-product__price">Rp. {{ number_format($cartProduct->product->price, 0, ',', '.') }},-</div>
                                                </div>
                                                <div class="card-selected-product__quantity quantity">
                                                    <div class="quantity__button quantity__button_minus" wire:click="quantityMinus({{ $cartProduct->id }})"></div>
                                                    <div class="quantity__input">
                                                        <input autocomplete="off" type="text" wire:model="cartQuantities.{{ $cartProduct->id }}" wire:keyup.debounce.500ms="quantityUpdate({{ $cartProduct->id }})">
                                                    </div>
                                                    <div class="quantity__button quantity__button_plus" wire:click="quantityPlus({{ $cartProduct->id }})"></div>
                                                </div>
                                                <div class="card-selected-product__total-price">Rp. {{ number_format($subtotal, 0, ',', '.') }},-</div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="column-2">
                    <div class="order-info">
                        <h4 class="order-info__title">Pesanan Anda</h4>
                        <ul class="order-info__list">
                            <li>
                                <div class="order-info__list-left">Total pesanan</div>
                                <div class="order-info__list-right"><strong>Rp. {{ number_format($total, 0, ',', '.') }},-</strong></div>
                            </li>
                            <li class="total"></li>
                        </ul>
                        <a href="{{ route('customer.checkout') }}">
                            <button class="btn-submit" type="button">
                                checkout
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- == // CART CONTENT ================== -->

</div>
