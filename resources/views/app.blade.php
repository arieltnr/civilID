<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>CIVIL ID</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/bootstrap-icons.css" rel="stylesheet">

    <link href="css/templatemo-leadership-event.css" rel="stylesheet">

    <style>
        .read-more-content {
            position: relative;
            overflow: hidden;
        }

        .read-more-text {
            display: inline;
            word-wrap: break-word;
        }

        .read-more-gradient {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: linear-gradient(transparent, white);
            transition: opacity 0.3s;
        }

        .read-more-content.expanded .read-more-gradient {
            opacity: 0;
        }

        .read-more-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            font-weight: 500;
            margin-top: 10px;
            display: inline-block;
        }

        .read-more-btn:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .logo-navbar {
            width: 45px;
            height: 45px;
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

        #risetCarousel {
            max-width: 100%;
            margin: 0 auto;
        }

        .carousel-inner img {
            height: 250px;
            object-fit: cover;
        }

        .clickable-image {
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .clickable-image:hover {
            transform: scale(1.01);
            opacity: 0.9;
        }

        /* Gaya untuk modal */
        .modal-content {
            background-color: rgba(0, 0, 0, 0.85);
            color: white;
        }

        .modal-header .btn-close {
            background-color: white;
            opacity: 1;
        }

        /* Membuat modal fullscreen di mobile */
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 0;
                max-width: 100%;
                height: 100%;
            }

            .modal-content {
                height: 100%;
                border-radius: 0;
            }

            .modal-body {
                display: flex;
                align-items: center;
                justify-content: center;
            }
        }

        .carousel-item img {
            max-height: 500px;
            object-fit: contain;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 10px;
        }

        .highlight-image {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .highlight-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .modal-content.bg-transparent {
            background-color: rgba(0, 0, 0, 0.9) !important;
        }

        .modal-xl {
            max-width: 95%;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="index.html" class="navbar-brand mx-auto mx-lg-0 d-flex align-items-center">
                <img src="{{ asset('/storage/'.($modProfile->logo ?? 'default/logo.png')) }}" class="logo-navbar me-3" alt="Logo">
                <span class="brand-text fs-6 fw-bold">{{ $modProfile->nama_profil ?? null }}</span>
            </a>

            <a class="nav-link custom-btn btn d-lg-none" href="#">Buy Tickets</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_1">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_2">Profil</a>
                    </li>

                    <li class="nav-item" hidden>
                        <a class="nav-link click-scroll" href="#section_3">Anggota</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_4">Hasil Riset</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Program Kerja</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_6">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>

        <section class="hero" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5 col-12 m-auto">
                        <div class="hero-text">

                            <h1 class="text-white mb-4"> {{ $modProfile->motto ?? null }}</h1>

                            <div class="d-flex justify-content-center align-items-center">
                                <span class="date-text">{{ $modProfile->nama_profil ?? null }}</span>

                                <span class="location-text">Est. {{ $modProfile->tahun ?? null }}</span>
                            </div>

                            <a href="#section_2" class="custom-link bi-arrow-down arrow-icon"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="video-wrap">
                <video autoplay="" loop="" muted="" class="custom-video" poster="">
                    <source src="{{ asset('/storage/'.(optional($modProfile)->banner ?? 'default-banner.mp4')) }}" type="video/mp4">

                    Your browser does not support the video tag.
                </video>
            </div>
        </section>

        <section class="highlight">
            <div class="container">
                <div class="row">
                    @forelse ($modKegiatan as $kegiatan)
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="highlight-thumb">
                            <img src="{{ asset('/storage/'.$kegiatan->gambar1) }}"
                                class="highlight-image img-fluid"
                                alt=""
                                style="cursor: pointer;"
                                data-bs-toggle="modal"
                                data-bs-target="#previewModal{{ $kegiatan->id }}">
                            <div class="highlight-info">
                                <h3 class="highlight-title">Kegiatan</h3>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Preview Gambar -->
                    <div class="modal fade" id="previewModal{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="previewLabel{{ $kegiatan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content bg-transparent border-0">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title text-white" id="previewLabel{{ $kegiatan->id }}">{{ $kegiatan->nama_kegiatan ?? 'Preview Gambar' }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center p-0">
                                    <img src="{{ asset('/storage/'.$kegiatan->gambar1) }}"
                                        class="img-fluid rounded"
                                        alt="{{ $kegiatan->nama_kegiatan ?? 'Kegiatan' }}"
                                        style="max-height: 85vh; width: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="about section-padding" id="section_2">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Latar <u class="text-info">Belakang</u></h2>
                    </div>

                    <div class="col-lg-6 col-12">
                        <h2 class="mb-4">Visi <u class="text-info">Misi</u></h2>
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="read-more-content" id="readMoreContent" style="max-height: 150px; text-align: justify;">
                            <p class="read-more-text">{!! $modProfile->latar_belakang ?? null !!}</p>
                            <div class="read-more-gradient"></div>
                        </div>
                        <button class="read-more-btn" id="readMoreBtn">Baca Selengkapnya</button>

                        <div class="avatar-group py-5 mt-5">

                        </div>
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <p style="text-align: justify;">{!! $modProfile->visi_misi ?? null !!}</p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-4 col-12"></div>

                    <div class="col-lg-4 col-12">
                        <h2 class="mb-4">Tujuan <u class="text-info">Dibentuk</u></h2>
                    </div>

                    <div class="col-lg-4 col-12"></div>

                    <div class="col-lg-12 col-12">
                        <p style="text-align: justify;">{!! $modProfile->tujuan ?? null !!}</p>
                    </div>

                </div>
            </div>
        </section>


        <section class="speakers section-padding" id="section_3" hidden>
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-12 d-flex flex-column justify-content-center align-items-center">
                        <div class="speakers-text-info">
                            <h2 class="mb-4">Our <u class="text-info">Speakers</u></h2>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut dolore</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-12">
                        <div class="speakers-thumb">
                            <img src="images/avatar/happy-asian-man-standing-with-arms-crossed-grey-wall.jpg" class="img-fluid speakers-image" alt="">

                            <small class="speakers-featured-text">Featured</small>

                            <div class="speakers-info">

                                <h5 class="speakers-title mb-0">Logan Wilson</h5>

                                <p class="speakers-text mb-0">CEO / Founder</p>

                                <ul class="social-icon">
                                    <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                    <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                    <li><a href="#" class="social-icon-link bi-google"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="speakers-thumb speakers-thumb-small">
                                    <img src="images/avatar/portrait-good-looking-brunette-young-asian-woman.jpg" class="img-fluid speakers-image" alt="">

                                    <div class="speakers-info">
                                        <h5 class="speakers-title mb-0">Natalie</h5>

                                        <p class="speakers-text mb-0">Event Planner</p>

                                        <ul class="social-icon">
                                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="speakers-thumb speakers-thumb-small">
                                    <img src="images/avatar/senior-man-white-sweater-eyeglasses.jpg" class="img-fluid speakers-image" alt="">

                                    <div class="speakers-info">
                                        <h5 class="speakers-title mb-0">Thomas</h5>

                                        <p class="speakers-text mb-0">Startup Coach</p>

                                        <ul class="social-icon">
                                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="speakers-thumb speakers-thumb-small">
                                    <img src="images/avatar/pretty-smiling-joyfully-female-with-fair-hair-dressed-casually-looking-with-satisfaction.jpg" class="img-fluid speakers-image" alt="">

                                    <div class="speakers-info">
                                        <h5 class="speakers-title mb-0">Isabella</h5>

                                        <p class="speakers-text mb-0">Event Manager</p>

                                        <ul class="social-icon">
                                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="speakers-thumb speakers-thumb-small">
                                    <img src="images/avatar/indoor-shot-beautiful-happy-african-american-woman-smiling-cheerfully-keeping-her-arms-folded-relaxing-indoors-after-morning-lectures-university.jpg" class="img-fluid speakers-image" alt="">

                                    <div class="speakers-info">
                                        <h5 class="speakers-title mb-0">Samantha</h5>

                                        <p class="speakers-text mb-0">Top Level Speaker</p>

                                        <ul class="social-icon">
                                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="schedule section-padding" id="section_4">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-5 text-center">Hasil <u class="text-info">Riset</u></h2>

                        <nav>
                            <div class="nav nav-tabs align-items-baseline" id="nav-tab" role="tablist">
                                @php
                                $latestRiset = $modRiset->first();
                                @endphp
                                @forelse ($modRiset as $riset)
                                <button class="nav-link {{ $riset->id == $latestRiset->id ? 'active' : '' }}" id="nav-Day{{ $riset->id ?? '' }}-tab" data-bs-toggle="tab" data-bs-target="#nav-Day{{ $riset->id ?? '' }}" type="button" role="tab" aria-controls="nav-Day{{ $riset->id ?? '' }}" aria-selected="true">
                                    <h3>
                                        <span>{{ $riset->judul ?? null }}</span>
                                        <small>{{ $riset->tgl_riset_indo ?? null }}</small>
                                    </h3>
                                </button>
                                @empty
                                <div></div>
                                @endforelse
                            </div>
                        </nav>

                        <div class="tab-content mt-5" id="nav-tabContent">
                            @forelse ($modRiset as $riset)
                            <div class="tab-pane fade show {{ $riset->id == $latestRiset->id ? 'active' : '' }}" id="nav-Day{{ $riset->id ?? '' }}" role="tabpanel" aria-labelledby="nav-Day{{ $riset->id ?? '' }}-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-12">
                                        <div id="risetCarousel" class="carousel slide"
                                            data-bs-ride="carousel"
                                            data-bs-interval="5000"
                                            data-bs-pause="hover">
                                            <!-- Indicators/dots -->
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#risetCarousel" data-bs-slide-to="0" class="active"></button>
                                                <button type="button" data-bs-target="#risetCarousel" data-bs-slide-to="1"></button>
                                                @if (!empty($riset->gambar3))
                                                <button type="button" data-bs-target="#risetCarousel" data-bs-slide-to="2"></button>
                                                @endif
                                                @if (!empty($riset->gambar4))
                                                <button type="button" data-bs-target="#risetCarousel" data-bs-slide-to="3"></button>
                                                @endif
                                            </div>

                                            <!-- Slides -->
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('/storage/'.$riset->gambar1) }}"
                                                        class="d-block w-100 schedule-image img-fluid clickable-image"
                                                        alt="Gambar 1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        data-image-src="{{ asset('/storage/'.$riset->gambar1) }}">
                                                </div>

                                                @if (!empty($riset->gambar2))
                                                <div class="carousel-item">
                                                    <img src="{{ asset('/storage/'.$riset->gambar2) }}"
                                                        class="d-block w-100 schedule-image img-fluid clickable-image"
                                                        alt="Gambar 2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        data-image-src="{{ asset('/storage/'.$riset->gambar2) }}">
                                                </div>
                                                @endif

                                                @if (!empty($riset->gambar3))
                                                <div class="carousel-item">
                                                    <img src="{{ asset('/storage/'.$riset->gambar3) }}"
                                                        class="d-block w-100 schedule-image img-fluid clickable-image"
                                                        alt="Gambar 3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        data-image-src="{{ asset('/storage/'.$riset->gambar3) }}">
                                                </div>
                                                @endif

                                                @if (!empty($riset->gambar4))
                                                <div class="carousel-item">
                                                    <img src="{{ asset('/storage/'.$riset->gambar4) }}"
                                                        class="d-block w-100 schedule-image img-fluid clickable-image"
                                                        alt="Gambar 4"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#imageModal"
                                                        data-image-src="{{ asset('/storage/'.$riset->gambar4) }}">
                                                </div>
                                                @endif
                                            </div>

                                            <!-- Controls -->
                                            <button class="carousel-control-prev" type="button" data-bs-target="#risetCarousel" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#risetCarousel" data-bs-slide="next">
                                                <span class="carousel-control-next-icon"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Modal untuk Preview Gambar -->
                                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header border-0">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center p-0">
                                                    <img id="modalImage" src="" class="img-fluid" alt="Preview Image" style="max-height: 80vh; object-fit: contain;">
                                                </div>
                                                <div class="modal-footer border-0 justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                    <a id="downloadBtn" href="#" class="btn btn-primary" download>
                                                        <i class="fas fa-download"></i> Download
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-12 mt-3 mt-lg-0">
                                        <h4 class="mb-2">{{ $riset->judul ?? null }}</h4>

                                        {!! $riset->hasil_riset ?? null !!}

                                        <div class="d-flex align-items-center mt-4">
                                            <div class="avatar-group d-flex">
                                                <span class="mx-3 mx-lg-1">
                                                    <i class="bi-clock me-2"></i>
                                                    {{ $riset->tgl_riset_indo ?? null }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div></div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="pricing section-padding" id="section_5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-12 text-center mx-auto mb-5">
                        <h2>Kegiatan <u class="text-info">Organisasi</u></h2>
                    </div>

                    @forelse ($modKegiatan as $kegiatan)
                    <div class="col-lg-4 col-md-6 col-12 mb-5 mb-lg-0">
                        <div class="pricing-thumb bg-white shadow-lg">
                            <div class="pricing-title-wrap d-flex align-items-center">
                                <span class="pricing-title text-white mb-0"><i class="bi-cup me-2"></i>{{ $kegiatan->nama_kegiatan ?? null }}</span>
                            </div>

                            <div class="pricing-body">
                                <p>
                                    {!! $kegiatan->isi_kegiatan ?? null !!}
                                </p>

                                <a class="custom-btn btn mt-3" href="#" data-bs-toggle="modal" data-bs-target="#modalDokumentasi{{ $kegiatan->id }}">Dokumentasi</a>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Carousel untuk setiap kegiatan -->
                    <div class="modal fade" id="modalDokumentasi{{ $kegiatan->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $kegiatan->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $kegiatan->id }}">Dokumentasi - {{ $kegiatan->nama_kegiatan }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div id="carouselDokumentasi{{ $kegiatan->id }}" class="carousel slide" data-bs-ride="false">
                                        <div class="carousel-inner">
                                            @if($kegiatan->gambar1)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('/storage/'.$kegiatan->gambar1) }}" class="d-block w-100" alt="Dokumentasi 1">
                                            </div>
                                            @endif

                                            @if($kegiatan->gambar2)
                                            <div class="carousel-item {{ !$kegiatan->gambar1 ? 'active' : '' }}">
                                                <img src="{{ asset('/storage/'.$kegiatan->gambar2) }}" class="d-block w-100" alt="Dokumentasi 2">
                                            </div>
                                            @endif

                                            @if($kegiatan->gambar3)
                                            <div class="carousel-item {{ !$kegiatan->gambar1 && !$kegiatan->gambar2 ? 'active' : '' }}">
                                                <img src="{{ asset('/storage/'.$kegiatan->gambar3) }}" class="d-block w-100" alt="Dokumentasi 3">
                                            </div>
                                            @endif
                                        </div>

                                        <!-- Tombol Previous dan Next -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDokumentasi{{ $kegiatan->id }}" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselDokumentasi{{ $kegiatan->id }}" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>

                                        <!-- Indikator -->
                                        <div class="carousel-indicators">
                                            @if($kegiatan->gambar1)
                                            <button type="button" data-bs-target="#carouselDokumentasi{{ $kegiatan->id }}" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                            @endif
                                            @if($kegiatan->gambar2)
                                            <button type="button" data-bs-target="#carouselDokumentasi{{ $kegiatan->id }}" data-bs-slide-to="1"></button>
                                            @endif
                                            @if($kegiatan->gambar3)
                                            <button type="button" data-bs-target="#carouselDokumentasi{{ $kegiatan->id }}" data-bs-slide-to="2"></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div></div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="venue section-padding" id="section_6">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-12">
                        <h2 class="mb-5">Contact Person <span class="text-info">(PR)</span></h2>
                    </div>

                    <div class="col-lg-6 col-12 mt-5 mt-lg-0">
                        <div class="venue-thumb bg-white shadow-lg">

                            <div class="venue-info-title">
                                <h2 class="text-white mb-0">{{ $modProfile->nama_kontak_profil ?? null }}</h2>
                            </div>

                            <div class="venue-info-body">
                                <h4 class="d-flex">
                                    <i class="bi-telephone me-2"></i>
                                    <span>{{ $modProfile->no_kontak_profil ?? null }}</span>
                                </h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-12 border-bottom pb-5 mb-5">
                    <div class="d-flex">
                        <a href="index.html" class="navbar-brand mx-auto mx-lg-0 d-flex align-items-center">
                        <img src="{{ asset('storage/'.($modProfile->logo ?? 'default/logo.png')) }}"
                            class="logo-navbar me-3"
                            alt="Logo">
                            <span class="brand-text fs-6 fw-bold">{{ $modProfile->nama_profil ?? null }}</span>
                        </a>

                        <ul class="social-icon ms-auto">
                            <li><a href="#" class="social-icon-link bi-facebook"></a></li>

                            <li><a href="#" class="social-icon-link bi-instagram"></a></li>

                            <li><a href="#" class="social-icon-link bi-whatsapp"></a></li>

                            <li><a href="#" class="social-icon-link bi-youtube"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    <ul class="footer-menu d-flex flex-wrap">
                        <li class="footer-menu-item"><a href="#" class="footer-menu-link">{{ $modProfile->motto ?? null }}</a></li>
                    </ul>
                </div>

                <div class="col-lg-5 col-12 ms-lg-auto">
                    <div class="copyright-text-wrap d-flex align-items-center">
                        <p class="copyright-text ms-lg-auto me-4 mb-0">Copyright © {{ $modProfile->tahun ?? null }} {{ $modProfile->nama_profil ?? null }}.

                            <br>All Rights Reserved.

                        </p>

                        <a href="#section_1" class="bi-arrow-up arrow-icon custom-link"></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreContent = document.getElementById('readMoreContent');
            const readMoreBtn = document.getElementById('readMoreBtn');
            const originalHeight = readMoreContent.scrollHeight;

            // Jika konten lebih pendek dari max-height, sembunyikan tombol
            if (originalHeight <= 150) {
                readMoreBtn.style.display = 'none';
            }

            readMoreBtn.addEventListener('click', function() {
                if (readMoreContent.classList.contains('expanded')) {
                    // Kembali ke keadaan awal
                    readMoreContent.style.maxHeight = '150px';
                    readMoreContent.classList.remove('expanded');
                    readMoreBtn.textContent = 'Baca Selengkapnya';
                } else {
                    // Perluas konten
                    readMoreContent.style.maxHeight = originalHeight + 'px';
                    readMoreContent.classList.add('expanded');
                    readMoreBtn.textContent = 'Baca Lebih Sedikit';
                }
            });

            document.querySelectorAll('.clickable-image').forEach(function(img) {
                img.addEventListener('click', function() {
                    var imageSrc = this.getAttribute('data-image-src');
                    var modalImage = document.getElementById('modalImage');
                    var downloadBtn = document.getElementById('downloadBtn');

                    // Set gambar di modal
                    modalImage.src = imageSrc;

                    // Set link download
                    downloadBtn.href = imageSrc;
                    downloadBtn.setAttribute('download', imageSrc.split('/').pop());

                    // Hentikan carousel sementara modal terbuka
                    var carousel = bootstrap.Carousel.getInstance(document.getElementById('risetCarousel'));
                    if (carousel) {
                        carousel.pause();
                    }
                });
            });

            // Lanjutkan carousel setelah modal ditutup
            var imageModal = document.getElementById('imageModal');
            imageModal.addEventListener('hidden.bs.modal', function() {
                var carousel = bootstrap.Carousel.getInstance(document.getElementById('risetCarousel'));
                if (carousel) {
                    carousel.cycle();
                }
            });

            // Tambahkan keyboard navigation
            document.addEventListener('keydown', function(e) {
                var modal = bootstrap.Modal.getInstance(imageModal);
                if (modal && modal._isShown) {
                    var carousel = bootstrap.Carousel.getInstance(document.getElementById('risetCarousel'));

                    if (e.key === 'ArrowLeft' && carousel) {
                        carousel.prev();
                        // Update modal dengan gambar aktif baru
                        updateModalWithActiveImage(carousel);
                    } else if (e.key === 'ArrowRight' && carousel) {
                        carousel.next();
                        // Update modal dengan gambar aktif baru
                        updateModalWithActiveImage(carousel);
                    } else if (e.key === 'Escape') {
                        modal.hide();
                    }
                }
            });

            // Fungsi untuk update modal dengan gambar aktif dari carousel
            function updateModalWithActiveImage(carousel) {
                setTimeout(function() {
                    var activeImage = document.querySelector('#risetCarousel .carousel-item.active .clickable-image');
                    if (activeImage) {
                        var imageSrc = activeImage.getAttribute('data-image-src');
                        var modalImage = document.getElementById('modalImage');
                        var downloadBtn = document.getElementById('downloadBtn');

                        modalImage.src = imageSrc;
                        downloadBtn.href = imageSrc;
                        downloadBtn.setAttribute('download', imageSrc.split('/').pop());
                    }
                }, 50); // Delay sedikit untuk memastikan transisi selesai
            }
        });
    </script>
</body>

</html>