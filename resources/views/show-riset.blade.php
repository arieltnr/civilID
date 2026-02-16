<!DOCTYPE html>
<html lang="en">

<head>
  <base href="/">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>CIVIL ID</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-574-mexant.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
  <!--

TemplateMo 574 Mexant

https://templatemo.com/tm-574-mexant

-->
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

    .cursor-pointer {
      cursor: pointer;
    }

    .cursor-zoom {
      cursor: zoom-in;
    }

    .thumbnail-container:hover img {
      transform: scale(1.05);
      transition: transform 0.3s ease;
    }

    .carousel-control-prev,
    .carousel-control-next {
      width: 5%;
    }

    .carousel-item {
      transition: transform 0.6s ease-in-out;
    }

    /* Untuk gambar error */
    .image {
      font-size: 12px;
      color: #666;
    }

    .image:before {
      content: " ";
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: #f8f9fa;
      border: 1px solid #dee2e6;
    }

    .image:after {
      content: "Gambar tidak tersedia";
      display: block;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: #999;
      font-size: 14px;
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
              <span class="brand-text fs-6 fw-bold">{{ $modProfile->nama_profil ?? null }}</span>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{ route('home') }}">Home</a></li>
              <li class="scroll-to-section"><a href="{{ route('home') }}">Riset</a></li>
              <li class="scroll-to-section"><a href="{{ route('home') }}">Kegiatan</a></li>
              <li class="has-sub" hidden>
                <a href="javascript:void(0)">Pages</a>
                <ul class="sub-menu">
                  <li><a href="{{ route('about.us') }}">About Us</a></li>
                  <li><a href="{{ route('our.services') }}">Our Services</a></li>
                  <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                </ul>
              </li>
              <li class="scroll-to-section"><a href="{{ route('home') }}">Tentang</a></li>
              <li hidden><a href="{{ route('contact.us') }}">Contact Support</a></li>
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

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="header-text">
            <h2>Riset</h2>
            <div class="div-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Main Banner Area End ***** -->

  <section class="top-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="left-image">
            @php

            // Kumpulkan semua gambar yang ada
            $images = [];
            if (!empty($riset->gambar1)) $images[] = $riset->gambar1;
            if (!empty($riset->gambar2)) $images[] = $riset->gambar2;
            if (!empty($riset->gambar3)) $images[] = $riset->gambar3;
            if (!empty($riset->gambar4)) $images[] = $riset->gambar4;

            $hasImages = count($images) > 0;
            @endphp
            <div class="modal fade" id="imageCarouselModal" tabindex="-1" aria-labelledby="imageCarouselModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-dark">
                  <div class="modal-header border-0">
                    <h5 class="modal-title text-white" id="imageCarouselModalLabel">Galeri Dokumentasi</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body p-0">
                    @if($hasImages)
                    <div id="modalCarousel" class="carousel slide" data-bs-ride="carousel">
                      <!-- Indicators -->
                      <div class="carousel-indicators">
                        @foreach($images as $index => $image)
                        <button type="button" data-bs-target="#modalCarousel"
                          data-bs-slide-to="{{ $index }}"
                          class="{{ $index === 0 ? 'active' : '' }}"
                          aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                          aria-label="Slide {{ $index + 1 }}">
                        </button>
                        @endforeach
                      </div>

                      <!-- Slides -->
                      <div class="carousel-inner">
                        @foreach($images as $index => $image)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                          <img src="{{ Storage::url($image ?? 'default/no-image.jpg') }}"
                            class="d-block w-100 image"
                            alt="Dokumentasi {{ $index + 1 }}"
                            style="max-height: 80vh; object-fit: contain;">
                          <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                            <p>Gambar {{ $index + 1 }} dari {{ count($images) }}</p>
                          </div>
                        </div>
                        @endforeach
                      </div>

                      <!-- Controls -->
                      <button class="carousel-control-prev" type="button" data-bs-target="#modalCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#modalCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    @else
                    <div class="text-center py-5">
                      <i class="fas fa-images fa-4x text-muted mb-3"></i>
                      <p class="text-muted">Tidak ada gambar tersedia</p>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>

            <!-- Main Carousel di Halaman -->
            @if($hasImages)
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div id="mainCarousel" class="carousel slide shadow rounded" data-bs-ride="carousel">
                  <!-- Indicators -->
                  <div class="carousel-indicators">
                    @foreach($images as $index => $image)
                    <button type="button" data-bs-target="#mainCarousel"
                      data-bs-slide-to="{{ $index }}"
                      class="{{ $index === 0 ? 'active' : '' }}"
                      aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                      aria-label="Slide {{ $index + 1 }}">
                    </button>
                    @endforeach
                  </div>

                  <!-- Slides -->
                  <div class="carousel-inner">
                    @foreach($images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                      <img src="{{ Storage::url($image ?? 'default/no-image.jpg') }}"
                        class="d-block w-100 cursor-zoom image"
                        alt="Dokumentasi {{ $index + 1 }}"
                        style="height: 400px; object-fit: cover;"
                        data-bs-toggle="modal"
                        data-bs-target="#imageCarouselModal"
                        onclick="setActiveSlide({{ $index }})">
                      <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-2 rounded">
                        <small>Klik untuk memperbesar</small>
                      </div>
                    </div>
                    @endforeach
                  </div>

                  <!-- Controls -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
            @else
            <div class="alert alert-info text-center">
              <i class="fas fa-info-circle me-2"></i>
              Tidak ada gambar dokumentasi tersedia
            </div>
            @endif

            <!-- Thumbnail Grid (Optional) -->
            @if($hasImages)
            <div class="row mt-3">
              <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                  @foreach($images as $index => $image)
                  <div class="thumbnail-container" style="width: 120px; height: 80px;">
                    <img src="{{ Storage::url($image ?? 'default/no-image.jpg') }}"
                      class="img-thumbnail w-100 h-100 cursor-pointer image"
                      alt="Thumb {{ $index + 1 }}"
                      style="object-fit: cover;"
                      data-bs-toggle="modal"
                      data-bs-target="#imageCarouselModal"
                      onclick="setActiveSlide({{ $index }})">
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="col-lg-12 align-self-center">
          <div class="accordions is-first-expanded">
            <article class="accordion">
              <div>
                <h3>{!! $riset->judul !!}</h3>
                <hr>
                <span style="font-style: italic; font-size: 13px;">{{ $riset->tgl_riset_indo }}</span>
              </div>
              <div>
                <div class="content">
                  <p>{!! $riset->hasil_riset !!}
                  </p>
                </div>
              </div>
            </article>
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
      // mousewheelControl: true,
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

    function setActiveSlide(index) {
      setTimeout(() => {
        const modalCarousel = document.getElementById('modalCarousel');
        if (modalCarousel) {
          const carousel = new bootstrap.Carousel(modalCarousel);
          carousel.to(index);
        }
      }, 100);
    }

    // Handle error gambar
    document.addEventListener('DOMContentLoaded', function() {
      const images = document.querySelectorAll('img');

      images.forEach(img => {
        img.onerror = function() {
          this.src = '{{ asset("storage/default/no-image.jpg") }}';
          this.onerror = null; // Prevent infinite loop
        };
      });

      // Inisialisasi carousel
      const mainCarousel = document.getElementById('mainCarousel');
      if (mainCarousel) {
        new bootstrap.Carousel(mainCarousel, {
          interval: 5000,
          wrap: true
        });
      }
    });

    // Keyboard navigation untuk modal
    document.getElementById('imageCarouselModal').addEventListener('shown.bs.modal', function() {
      this.addEventListener('keydown', function(e) {
        const modalCarousel = document.getElementById('modalCarousel');
        if (!modalCarousel) return;

        const carousel = bootstrap.Carousel.getInstance(modalCarousel);
        if (!carousel) return;

        if (e.key === 'ArrowLeft') {
          carousel.prev();
        } else if (e.key === 'ArrowRight') {
          carousel.next();
        }
      });
    });
  </script>

</body>

</html>