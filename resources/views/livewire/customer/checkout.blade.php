<div>
    <x-slot:wrapper>product-page _padding-top</x-slot:wrapper>

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
                Checkout
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('customer.shop') }}">Shop</a></li>
                    <li class="breadcrumb__item"><a href="{{ route('customer.cart') }}">Cart</a></li>
                    <li class="breadcrumb__item active" aria-current="page">Checkout</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->
    <!-- == CHECKOUT CONTENT ================== -->
    <div class="checkout__content _parallax">
        <div class="checkout__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/photo/decor.png" alt="flowers">
        </div>
        <form class="container" wire:submit.prevent="save">
            <ul class="steps-block">
                <li class="active">
                    <div class="steps-block__icon">
                        <img src="/vendor/joolie/img/steps-block/01.svg" alt="icon">
                    </div>
                    <div class="steps-block__text">
                        delivery details
                    </div>
                    <div class="steps-block__decor">
                        <img src="/vendor/joolie/img/icons/object-right.svg" alt="line">
                    </div>
                </li>
                <li>
                    <div class="steps-block__icon">
                        <img src="/vendor/joolie/img/steps-block/02.svg" alt="icon">
                    </div>
                    <div class="steps-block__text">
                        Payment method
                    </div>
                    <div class="steps-block__decor">
                        <img src="/vendor/joolie/img/icons/object-right.svg" alt="line">
                    </div>
                </li>
                <li>
                    <div class="steps-block__icon">
                        <img src="/vendor/joolie/img/steps-block/03.svg" alt="icon">
                    </div>
                    <div class="steps-block__text">
                        Final step
                    </div>
                    <div class="steps-block__decor">
                        <img src="/vendor/joolie/img/icons/object-right.svg" alt="line">
                    </div>
                </li>
            </ul>
            <a href="{{ route('customer.cart') }}" class="checkout__link-back btn-prev">
                <span><img src="/vendor/joolie/img/icons/Arrow-left.svg" alt="arrow"></span>
                back
            </a>
            <div class="block-column-2">
                <div class="column-1">
                    <div class="delivery-details">
                        <h6 class="delivery-details__title title-6">contact person </h6>
                        <div class="delivery-details__row delivery-details__row_1">
                            <div class="delivery-details__input">
                                <input type="text" class="input" placeholder="Enter your name" wire:model="contact_first_name" required>
                            </div>
                            <div class="delivery-details__input">
                                <input type="text" class="input" placeholder="Enter your last name " wire:model="contact_last_name" required>
                            </div>
                            <div class="delivery-details__input">
                                <input type="email" class="input" placeholder="Enter your email" wire:model="contact_email" required>
                            </div>
                            <div class="delivery-details__input">
                                <input type="number" class="input" placeholder="Enter your phone" wire:model="contact_phone" required>
                            </div>
                        </div>
                        <h6 class="delivery-details__title title-6">delivery address</h6>
                        <div class="delivery-details__row delivery-details__row_2">
                            <div class="delivery-details__input delivery-details__input_address">
                                <input type="text" class="input" placeholder="Enter your Аddress" wire:model="delivery_address" required>
                            </div>
                        </div>
                        <h6 class="delivery-details__title title-6">delivery date</h6>
                        <div class="delivery-details__row delivery-details__row_2">
                            <div class="delivery-details__input delivery-details__input_date">
                                <input type="date" class="input" placeholder="Delivery date" wire:model="delivery_date" required>
                            </div>
                            <div class="delivery-details__input delivery-details__input_time">
                                <input type="text" class="input _mask" placeholder="Delivery time" data-mask="99:99" wire:model="delivery_time" required>
                            </div>
                        </div>
                        <h6 class="delivery-details__title title-6">promotion code </h6>
                        <div class="delivery-details__row delivery-details__row_1">
                            <div class="delivery-details__input">
                                <input type="text" class="input" placeholder="Enter Code" wire:model="promotion_code" wire:keyup.debounce.200ms="triggerPromotion">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column-2">
                    <div class="order-info">
                        <h4 class="order-info__title">your order</h4>
                        <ul class="order-info__product-list">
                            @foreach ($cartProducts as $cartProduct)
                                <li>
                                    <div class="card-mini">
                                        <div class="card-mini__photo ibg">
                                            <a href="{{ route('customer.product-detail', $cartProduct->product->id) }}">
                                                <img src="{{ asset('storage/' . $cartProduct->product->picture) }}" alt="mini photo">
                                            </a>
                                        </div>
                                        <div class="card-mini__text">
                                            <div class="card-mini__title">
                                                <a href="{{ route('customer.product-detail', $cartProduct->product->id) }}">{{ $cartProduct->product->name }} <span>x{{ number_format($cartProduct->quantity, 0, ',', '.') }}</span></a>
                                            </div>
                                            <div class="card-mini__price" wire:ignore>Rp. {{ number_format($cartProduct->product->subtotal, 0, ',', '.') }},-</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="order-info__list">
                            <li>
                                <div class="order-info__list-left">Оrder price</div>
                                <div class="order-info__list-right"><strong>Rp. {{ number_format($subtotal, 0, ',', '.') }},-</strong></div>
                            </li>
                            <li>
                                <div class="order-info__list-left">Discount</div>
                                <div class="order-info__list-right"><strong>Rp. {{ number_format($discount, 0, ',', '.') }},-</strong></div>
                            </li>
                            <li class="total">
                                <div class="order-info__list-left">Total</div>
                                <div class="order-info__list-right">Rp. {{ number_format($totalPayment, 0, ',', '.') }},-</div>
                            </li>
                        </ul>
                        <button class="btn-submit" type="save">
                            choose a payment method
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- == CHECKOUT CONTENT ================== -->
</div>
