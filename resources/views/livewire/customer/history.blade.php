@php use Illuminate\Support\Carbon; @endphp

<div>
    <x-slot:wrapper>about _padding-top</x-slot:wrapper>

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
                History
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb__item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->
    <!-- == PROFILE CONTENT ================== -->
    <div class="profile__content _parallax">
        <div class="profile__decor layer" data-depth="0.15">
            <img src="/vendor/joolie/img/photo/decor.png" alt="flowers">
        </div>
        <form action="/" class="container">
            <div class="block-column-2">
                <div class="column-1">
                    <div class="profile-info">
                        <ul class="profile-info__nav">
                            <li>
                                <a href="#tab-2" class="profile-info__link profile-info__triggers active">my orders</a>
                            </li>
                        </ul>
                        <div id="tab-2" class="profile-info__tabs-content active">
                            <ul class="order-list _spollers">
                                @foreach ($transactions as $transaction)
                                    <li>
                                        <div class="order-list__title _spoller {{ $loop->iteration == 1 ? '_active' : '' }}">
                                            <div class="order-list__num">{{ $transaction->transaction_code }}</div>
                                            <div class="order-list__date">{{ Carbon::parse($transaction->date)->format('M d, Y') }}</div>
                                            <div class="order-list__status order-list__status_delivered">
                                                <span>
                                                    <img src="/vendor/joolie/img/icons/check-square.svg" alt="truck">
                                                </span>
                                                Success
                                            </div>
                                            <div class="order-list__plus"></div>
                                        </div>
                                        <div class="order-list__card card-order">
                                            <ul class="card-order__list">
                                                <li>
                                                    <div class="card-order__list-left"><strong>Email : </strong><span>{{ $transaction->contact_email }}</span></div>
                                                </li>
                                                <li>
                                                    <div class="card-order__list-left"><strong>Phone : </strong><span>{{ $transaction->contact_phone }}</span></div>
                                                </li>
                                                <li>
                                                    <div class="card-order__list-left"><strong>Delivering to : </strong><span>{{ $transaction->delivery_address }}</span></div>
                                                </li>
                                                <li class="total">
                                                    <div class="card-order__list-left">Products :</div>
                                                </li>
                                                @foreach ($transaction->transactionProducts as $transactionProduct)
                                                    <li>
                                                        <div class="card-order__list-left">{{ $transactionProduct->product->name }} <span>x1</span></div>
                                                        <div class="card-order__list-right">Rp. {{ number_format($transactionProduct->price, 0, ',', '.') }},-</div>
                                                    </li>
                                                @endforeach
                                                <li class="total">
                                                    <div class="card-order__list-left">Subtotal</div>
                                                    <div class="card-order__list-right">Rp. {{ number_format($transaction->subtotal, 0, ',', '.') }},-</div>
                                                </li>
                                                <li class="total">
                                                    <div class="card-order__list-left">Discount</div>
                                                    <div class="card-order__list-right">Rp. {{ number_format($transaction->discount, 0, ',', '.') }},-</div>
                                                </li>
                                                <li class="total">
                                                    <div class="card-order__list-left">Total</div>
                                                    <div class="card-order__list-right">Rp. {{ number_format($transaction->total, 0, ',', '.') }},-</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- == // PROFILE CONTENT ================== -->
</div>
