<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>CIVIL ID</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-574-mexant.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">

    <style>
        .logo-navbar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            object-fit: cover;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .logo-navbar:hover {
            transform: scale(1.1);
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .image-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* 0.5 = 50% opacity */
            pointer-events: none;
            /* agar bisa diklik */
        }

        .image-container img {
            display: block;
            width: 100%;
        }
    </style>
</head>

<body>


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ Storage::url($modProfile->logo ?? 'default/logo.png') }}" class="logo-navbar me-3" alt="Logo">
                            <span class="brand-text fs-6 fw-bold">{{ $modProfile->nama_profil ?? null }}</span>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#services">Riset</a></li>
                            <li class="scroll-to-section"><a href="#testimonials">Kegiatan</a></li>
                            <li class="scroll-to-section"><a href="#about">Tentang</a></li>
                            <li class="has-sub" hidden>
                                <a href="javascript:void(0)">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="{{ route('about.us') }}">About Us</a></li>
                                    <li><a href="{{ route('our.services') }}">Our Services</a></li>
                                    <li><a href="{{ route('contact.us') }}">Kontak Person</a></li>
                                </ul>
                            </li>
                            <li hidden><a href="contact-us.html">Kontak Person</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="swiper-container" id="top">
        <div class="swiper-wrapper">
            @if (isset($modKegiatan[0]))
            <div class="swiper-slide image-container">
                <div class="slide-inner">
                    @php
                    $bannerPath = $modKegiatan[0]->gambar1 ?? 'assets/images/slide-01.jpg';
                    $bannerUrl = Storage::url($bannerPath);
                    @endphp

                    <img src="{{ $bannerUrl }}" alt="Banner" class="custom-video" style="width: 100%; height: 100%; object-fit: cover;">

                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    @php
                                    $mottoText = $modKegiatan[0]->nama_kegiatan ?? null;

                                    if ($mottoText) {
                                        $parts = explode('|', $mottoText);

                                        $formattedParts = [];
                                        foreach ($parts as $part) {
                                            $trimmedPart = trim($part);

                                            $words = explode(' ', $trimmedPart);

                                            if (count($words) > 0) {
                                                $firstWord = $words[0];
                                                $lastWord = end($words);

                                                $words[0] = '<em>' . $firstWord . '</em>';

                                                $words[count($words) - 1] = '<em>' . $lastWord . '</em>';

                                                $formattedParts[] = implode(' ', $words);
                                            } else {
                                                $formattedParts[] = $part;
                                            }
                                        }
                                    }
                                    @endphp

                                    <h2>
                                        @if (isset($formattedParts))
                                            @foreach ($formattedParts as $index => $part)
                                                <a href="{{ route('kegiatans.show', $modKegiatan[0]->id) }}" style="color:antiquewhite;">{!! $part !!}</a>
                                                @if ($index == 0 && count($formattedParts) > 1)
                                                    <br>&amp;
                                                @elseif(!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @else
                                            Get <em>ready</em> for your business<br>&amp; upgrade <em>all aspects</em>
                                        @endif
                                    </h2>
                                    <div class="div-dec"></div>

                                    <div class="buttons">
                                        <div class="green-button">
                                            <a href="#">{!! $modKegiatan[0]->tgl_kegiatan_indo !!}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (isset($modKegiatan[1]))
            <div class="swiper-slide image-container">
                <div class="slide-inner">
                    @php
                    $bannerPath = $modKegiatan[1]->gambar1 ?? 'assets/images/slide-02.jpg';
                    $bannerUrl = Storage::url($bannerPath);
                    @endphp

                    <img src="{{ $bannerUrl }}" alt="Banner" class="custom-video" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    @php
                                    $mottoText = $modKegiatan[1]->nama_kegiatan ?? null;

                                    if ($mottoText) {
                                        $parts = explode('|', $mottoText);

                                        $formattedParts = [];
                                        foreach ($parts as $part) {
                                            $trimmedPart = trim($part);

                                            $words = explode(' ', $trimmedPart);

                                            if (count($words) > 0) {
                                                $firstWord = $words[0];
                                                $lastWord = end($words);

                                                $words[0] = '<em>' . $firstWord . '</em>';

                                                $words[count($words) - 1] = '<em>' . $lastWord . '</em>';

                                                $formattedParts[] = implode(' ', $words);
                                            } else {
                                                $formattedParts[] = $part;
                                            }
                                        }
                                    }
                                    @endphp
                                    <h2>
                                        @if (isset($formattedParts))
                                            @foreach ($formattedParts as $index => $part)
                                                <a href="{{ route('kegiatans.show', $modKegiatan[1]->id) }}" style="color:antiquewhite;">{!! $part !!}</a>
                                                @if ($index == 0 && count($formattedParts) > 1)
                                                    <br>&amp;
                                                @elseif(!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @else
                                            <em>Digital</em> Currency for you <br>&amp; Best <em>Crypto</em> Tips
                                        @endif
                                    </h2>
                                    <div class="div-dec"></div>
                                    
                                    <div class="buttons">
                                        <div class="orange-button">
                                            <a href="#">{!! $modKegiatan[1]->tgl_kegiatan_indo !!}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (isset($modKegiatan[2]))
            <div class="swiper-slide image-container">
                <div class="slide-inner">
                    @php
                    $bannerPath = $modKegiatan[2]->gambar1 ?? 'assets/images/slide-03.jpg';
                    $bannerUrl = Storage::url($bannerPath);
                    @endphp

                    <img src="{{ $bannerUrl }}" alt="Banner" class="custom-video" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="header-text">
                                    @php
                                    $mottoText = $modKegiatan[2]->nama_kegiatan ?? null;

                                    if ($mottoText) {
                                        $parts = explode('|', $mottoText);

                                        $formattedParts = [];
                                        foreach ($parts as $part) {
                                            $trimmedPart = trim($part);

                                            $words = explode(' ', $trimmedPart);

                                            if (count($words) > 0) {
                                                $firstWord = $words[0];
                                                $lastWord = end($words);

                                                $words[0] = '<em>' . $firstWord . '</em>';

                                                $words[count($words) - 1] = '<em>' . $lastWord . '</em>';

                                                $formattedParts[] = implode(' ', $words);
                                            } else {
                                                $formattedParts[] = $part;
                                            }
                                        }
                                    }
                                    @endphp
                                    <h2>
                                        @if (isset($formattedParts))
                                            @foreach ($formattedParts as $index => $part)
                                                <a href="{{ route('kegiatans.show', $modKegiatan[2]->id) }}" style="color:antiquewhite;">{!! $part !!}</a>
                                                @if ($index == 0 && count($formattedParts) > 1)
                                                    <br>&amp;
                                                @elseif(!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                        @else
                                            <em>Digital</em> Currency for you <br>&amp; Best <em>Crypto</em> Tips
                                        @endif
                                    </h2>
                                    <div class="div-dec"></div>
                                    
                                    <div class="buttons">
                                        <div class="green-button">
                                            <a href="#">{!! $modKegiatan[2]->tgl_kegiatan_indo !!}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
    </div>

    <!-- ***** Main Banner Area End ***** -->

    <section class="services" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h4>Hasil Riset</h4>
                        <h6>kami</h6>
                    </div>
                </div>
                @forelse ($modRiset as $riset)
                <div class="col-lg-6">
                    <div class="service-item">
                        <a href="{{ route('risets.show', $riset->id) }}">
                            @if($riset->gambar1)
                                <img src="{{ Storage::url($riset->gambar1 ?? 'default/logo.png') }}" class="d-block w-100" alt="Dokumentasi 3">
                            @endif
                            <h4>{{ $riset->judul ?? null }}</h4>{{ $riset->tgl_riset_indo ?? null }}
                            <p>{!! $riset->hasil_riset ?? null !!}</p>
                        </a>
                    </div>
                </div>
                @empty
                <div></div>
                @endforelse

                
            </div>
        </div>
    </section>

    <section class="simple-cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                @php
                        $mottoText = $modProfile->motto ?? null;

                        if ($mottoText) {
                            $parts = explode('|', $mottoText);

                            $formattedParts = [];
                            foreach ($parts as $part) {
                                $trimmedPart = trim($part);

                                $words = explode(' ', $trimmedPart);

                                if (count($words) > 0) {
                                    $firstWord = $words[0];
                                    $lastWord = end($words);

                                    $words[0] = '<em>' . $firstWord . '</em>';

                                    $words[count($words) - 1] = '<em><strong>' . $lastWord . '</strong></em>';

                                    $formattedParts[] = implode(' ', $words);
                                } else {
                                    $formattedParts[] = $part;
                                }
                            }
                        }
                    @endphp

                    <h4>
                        @if (isset($formattedParts))
                            @foreach ($formattedParts as $index => $part)
                                {!! $part !!}
                                @if ($index == 0 && count($formattedParts) > 2)
                                    <br>&amp;
                                @elseif(!$loop->last)
                                    <br>
                                @endif
                            @endforeach
                        @else
                            Get <em>ready</em> for your business<br>&amp; upgrade <em>all aspects</em>
                        @endif
                    </h4>
                </div>
                <div class="col-lg-7">
                    <div class="buttons">
                        <div class="green-button">
                            <a href="#">Discover More</a>
                        </div>
                        <div class="orange-button">
                            <a href="#">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h4>Kegiatan</h4>
                        <h6>Kami</h6>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="owl-testimonials owl-carousel" style="position: relative; z-index: 5;">
                        @forelse ($modKegiatan as $kegiatan)
                            <div class="item">
                                <a href="{{ route('kegiatans.show', $kegiatan->id) }}">
                                    <i class="fa fa-quote-left"></i>
                                    <p>{!! $kegiatan->isi_kegiatan ?? null !!}</p>
                                    <h4>{!! $kegiatan->nama_kegiatan !!}</h4>
                                    <span>{{ $kegiatan->tgl_kegiatan_indo ?? null }}</span>
                                    @if($kegiatan->gambar1)
                                    <div class="right-image">
                                        <img src="{{ Storage::url($kegiatan->gambar1 ?? 'default/logo.png') }}" alt="">
                                    </div>
                                    @endif
                                </a>
                            </div>
                        @empty
                        <div></div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h6>About Us</h6>
                        <h4>Know Us Better</h4>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="naccs">
                        <div class="tabs">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="menu">
                                        <div class="active gradient-border"><span>Latar Belakang</span></div>
                                        <div class="gradient-border"><span>Tujuan</span></div>
                                        <div class="gradient-border"><span>Kontak</span></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="nacc">
                                        <li class="active">
                                            <div style="text-align: justify;">
                                                {!! $modProfile->latar_belakang ?? null !!}
                                            </div>
                                        </li>
                                        <li>
                                            <div style="text-align: justify;">
                                                {!! $modProfile->tujuan ?? null !!}
                                            </div>
                                        </li>
                                        <li>
                                            <div class="col-lg-10 offset-lg-1">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="info-item">
                                                            <i class="fa fa-map-marked-alt"></i>
                                                            <h4>Kontak</h4>
                                                            <a href="#">{{ $modProfile->nama_kontak_profil ?? null }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="info-item">
                                                            <i class="fa fa-envelope"></i>
                                                            <h4>Email</h4>
                                                            <a href="#">{{ $modProfile->email_kontak_profil ?? null }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="info-item">
                                                            <i class="fa fa-phone"></i>
                                                            <h4>Phone Number</h4>
                                                            <a href="#">{{ $modProfile->no_kontak_profil ?? null }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>Visi Misi</h4>
                        <p>{!! $modProfile->visi_misi ?? null !!}.</p>
                        <div class="green-button">
                            <a href="#">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="calculator" hidden>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="left-image">
                        <img src="assets/images/calculator-image.png" alt="">
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="section-heading">
                        <h6>Your Freedom</h6>
                        <h4>Get a Financial Plan</h4>
                    </div>
                    <form id="calculate" action="" method="get">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="name">Your Name</label>
                                    <input type="name" name="name" id="name" placeholder=""
                                        autocomplete="on" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <label for="email">Your Email</label>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*"
                                        placeholder="" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="subject">Subject</label>
                                    <input type="subject" name="subject" id="subject" placeholder=""
                                        autocomplete="on">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <label for="chooseOption" class="form-label">Your Reason</label>
                                    <select name="Category" class="form-select" aria-label="Default select example"
                                        id="chooseOption" onchange="this.form.click()">
                                        <option selected>Choose an Option</option>
                                        <option type="checkbox" name="option1" value="Online Banking">Online Banking
                                        </option>
                                        <option value="Financial Control">Financial Control</option>
                                        <option value="Yearly Profit">Yearly Profit</option>
                                        <option value="Crypto Investment">Crypto Investment</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="orange-button">Submit Now</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="partners">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item" style="color: white; font-family: 'FontAwesome';">
                        {{ $modProfile->motto ?? null }}
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item">
                        <!-- <img src="assets/images/client-01.png" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item">
                        <!-- <img src="assets/images/client-01.png" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item">
                        <!-- <img src="assets/images/client-01.png" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item">
                        <!-- <img src="assets/images/client-01.png" alt=""> -->
                    </div>
                </div>
                <div class="col-lg-2 col-sm-4 col-6">
                    <div class="item">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="{{ Storage::url($modProfile->logo ?? 'default/logo.png') }}" class="logo-navbar me-3" alt="Logo">
                            <span class="brand-text fs-6 fw-bold">{{ $modProfile->nama_profil ?? null }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © {{ date('Y') }} {{ $modProfile->nama_profil ?? null }}</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>

    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/swiper.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        var interleaveOffset = 0.5;

        var swiperOptions = {
            loop: true,
            speed: 1000,
            grabCursor: true,
            watchSlidesProgress: true,
            mousewheelControl: true,
            keyboardControl: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            on: {
                progress: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".slide-inner").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                    }
                },
                touchStart: function() {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                    }
                },
                setTransition: function(speed) {
                    var swiper = this;
                    for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".slide-inner").style.transition =
                            speed + "ms";
                    }
                }
            }
        };

        var swiper = new Swiper(".swiper-container", swiperOptions);
    </script>
</body>

</html>