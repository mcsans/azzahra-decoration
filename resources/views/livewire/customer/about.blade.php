<div>
    <x-slot:wrapper>about _padding-top</x-slot:wrapper>

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
                Tentang Kami
            </h1>
            <nav class="breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__item"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="breadcrumb__item active" aria-current="page">Tentang Kami</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- == // HERO ================== -->

    <!-- == TEXT BLOCK ABOUT ================== -->
    <section class="about__text-block text-block-about">
        <div class="text-block-about__body container">
            <div class="text-block-about__column  text-content">
                <div class="text-block-about__head head">
                    <div class="head__suptitle suptitle">
                        <span><img src="/vendor/joolie/img/icons/icon-circles.svg" alt="icon"></span>
                        temukan kecantikanmu
                    </div>
                    <h3 class="head__title title-3">
                        Azzahra Decoration
                    </h3>
                    <div class="head__subtitle">Hanya yang terbaik untuk mengorganisir acara pernikahan dengan harga terbaik!</div>
                    <div class="head__text text">Selamat datang di Azzahra Decoration! Kami adalah penyedia layanan dekorasi dan aksesoris pernikahan yang berdedikasi untuk membuat hari istimewa Anda menjadi momen yang tak terlupakan. Dengan berbagai pilihan gaun, dekorasi, dan aksesoris pernikahan, kami siap membantu Anda menciptakan pernikahan impian Anda.</div>

                    <div class="head__subtitle" style="margin-top: 3rem;">Visi Kami</div>
                    <div class="head__text text">Di Azzahra Decoration, visi kami adalah menjadi pemimpin dalam industri dekorasi pernikahan dengan menyediakan produk dan layanan terbaik yang memenuhi kebutuhan dan keinginan setiap pasangan.</div>

                    <div class="head__subtitle" style="margin-top: 3rem;">Misi Kami</div>
                    <div class="head__text text">
                        <ul>
                            <li>
                                Kualitas Terbaik: Menyediakan produk dengan kualitas terbaik yang memenuhi standar tinggi dan memastikan kepuasan pelanggan.
                            </li>
                            <li>
                                Inovasi: Selalu berinovasi dalam desain dan layanan kami untuk mengikuti tren terkini dalam dunia pernikahan.
                            </li>
                            <li>
                                Pelayanan Prima: Memberikan layanan pelanggan yang ramah dan profesional, memastikan setiap detail dari pernikahan Anda ditangani dengan sempurna.
                            </li>
                            <li>
                                Keberlanjutan: Mendukung praktik bisnis yang berkelanjutan dan ramah lingkungan dalam setiap aspek operasi kami.
                            </li>
                        </ul>
                    </div>

                    <div class="head__subtitle" style="margin-top: 3rem;">Layanan Kami</div>
                    <div class="head__text text">
                        <ul>
                            <li>
                                Gaun Pernikahan: Koleksi gaun pernikahan yang elegan dan berkelas untuk membuat Anda tampil memukau di hari istimewa Anda.
                            </li>
                            <li>
                                Aksesoris Pernikahan: Berbagai aksesoris pernikahan seperti veil, sepatu, dan perhiasan untuk melengkapi penampilan Anda.
                            </li>
                            <li>
                                Dekorasi Pernikahan: Layanan dekorasi lengkap untuk lokasi pernikahan Anda, mulai dari bunga, pencahayaan, hingga meja resepsi.
                            </li>
                            <li>
                                Paket Pernikahan: Paket pernikahan yang disesuaikan dengan kebutuhan dan anggaran Anda, termasuk perencanaan, koordinasi, dan eksekusi acara.
                            </li>
                        </ul>
                    </div>

                    <div class="head__subtitle" style="margin-top: 3rem;">Mengapa Memilih Kami?</div>
                    <div class="head__text text">
                        <ul>
                            <li>
                                Pengalaman: Dengan pengalaman bertahun-tahun dalam industri pernikahan, kami memahami apa yang dibutuhkan untuk membuat pernikahan Anda sempurna.
                            </li>
                            <li>
                                Desain Unik: Setiap detail dari dekorasi dan aksesoris kami dirancang dengan keunikan dan keindahan, sesuai dengan tema dan gaya pernikahan Anda.
                            </li>
                            <li>
                                Harga Terjangkau: Kami menawarkan produk dan layanan dengan harga yang kompetitif tanpa mengorbankan kualitas.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- == // TEXT BLOCK ABOUT ================== -->

    <!-- == ADVANTAGES ================== -->
    <x-customer.section-advantages />
    <!-- == // ADVANTAGES ================== -->

    <!-- == INSTAGRAM BLOCK ================== -->
    <x-customer.section-instagram />
    <!-- == // INSTAGRAM BLOCK ================== -->

    <!-- == LOGOS BLOCK ================== -->
    <x-customer.section-logos />
    <!-- == // LOGOS BLOCK ================== -->

</div>
