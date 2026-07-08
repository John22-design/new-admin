<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog · John Field Fundraising</title>
    <meta name="description" content="Read practical fundraising tips, real-world lessons, and strategies to help your charity grow sustainable trust income.">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <!-- Vendor Styles -->
    <link href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">

    <!-- Theme Style -->
    @vite(['resources/css/style.css'])

    <!-- Preloader CSS -->
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">

    <script>
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
    <style>
        /* Subtle highlight for blog cards */
        .blog-card {
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease, background-color .18s ease;
            border: 1px solid rgba(var(--bs-primary-rgb), 0.2);
            background-color: rgba(var(--bs-primary-rgb), 0.06);
            border-radius: .75rem;
            overflow: hidden;
        }

        .blog-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08);
            border-color: rgba(var(--bs-primary-rgb), 0.25);
        }

        .blog-card .card-body .badge {
            border: 1px solid rgba(var(--bs-primary-rgb), .25);
        }

        .blog-card .object-fit-cover {
            transition: transform .25s ease;
        }

        .blog-card:hover .object-fit-cover {
            transform: scale(1.03);
        }

        /* Featured card accent */
        .featured-card {
            border-left: 4px solid var(--bs-primary);
            background-color: rgba(var(--bs-primary-rgb), 0.08);
            border-radius: .75rem;
        }
    </style>
</head>

<body>
    <x-preloader theme="gradient" variant="progress" />

    <div class="site-wrap">
        <!-- Header -->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="navbar">
            <div class="container d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <a class="navbar-brand w-auto" href="{{ route('home') }}#home">
                    <img class="logo dark img-fluid" src="{{ asset('images/navbar_logo.png') }}" alt="logo"
                        style="height:40px; width:auto; max-width:160px; border-radius:3px;">
                </a>

                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                    aria-labelledby="fbs__net-navbarsLabel">
                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="{{ route('home') }}">
                                <img class="logo dark img-fluid"
                                    style="height:40px; width:auto; max-width:160px; border-radius:3px;"
                                    src="{{ asset('images/navbar_logo.png') }}" alt="logo">
                            </a>
                        </div>
                        {{-- <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    </div>

                    <div class="offcanvas-body align-items-lg-center">
                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#services">Services</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}#faq">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link active" aria-current="page"
                                    href="{{ route('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <div class="ms-auto w-auto">
                    <div class="header-social d-flex align-items-center gap-1">
                        <a class="btn btn-primary py-2" href="{{ route('home') }}#contact">Contact</a>
                        <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto"
                            data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars"
                            aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
                            <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="21" x2="3" y1="6" y2="6"></line>
                                <line x1="15" x2="3" y1="12" y2="12"></line>
                                <line x1="17" x2="3" y1="18" y2="18"></line>
                            </svg>
                            <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <!-- Blog -->
            <section class="py-5" id="blog">
                <div class="container">
                    <!-- Header -->
                    <div class="row g-3 my-4">
                        <div class="col-12">
                            <h1 class="h2 fw-bold mb-2">From the Fundraising Desk</h1>
                            <p class="text-muted mb-0">Practical tips, real-world lessons, and strategies to help your
                                charity grow sustainable income.</p>
                        </div>
                    </div>

                    <!-- Featured Article -->
                    @if ($featuredPost)
                        <div class="row g-4 mb-4">
                            <div class="col-12">
                                <div class="card border-0 shadow-sm overflow-hidden featured-card">
                                    <div class="row g-0">
                                        <div class="col-md-6">
                                            <div style="height: 240px;">
                                                <img src="{{ $featuredPost->featured_image ? asset('storage/' . $featuredPost->featured_image) : asset('images/img-10-min.webp') }}"
                                                    class="w-100 object-fit-cover"
                                                    alt="{{ $featuredPost->title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                                    <span><i class="bi bi-calendar2-event"></i>
                                                        {{ $featuredPost->short_date }}</span>
                                                    <span><i class="bi bi-clock"></i> {{ $featuredPost->read_time }}
                                                        min read</span>
                                                    @if ($featuredPost->category)
                                                        <span
                                                            class="badge bg-primary bg-opacity-10 text-primary">{{ $featuredPost->category }}</span>
                                                    @endif
                                                </div>
                                                <h2 class="h4 card-title">{{ $featuredPost->title }}</h2>
                                                <p class="card-text text-muted">{{ $featuredPost->excerpt }}</p>
                                                <a href="{{ route('blog.single', $featuredPost->slug) }}"
                                                    class="btn btn-outline-primary">Read article</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Articles Grid -->
                    <div class="row g-4 mt-2">
                        @forelse($posts as $post)
                            <div class="col-sm-6 col-lg-4">
                                <div class="card h-100 border-0 shadow-sm blog-card">
                                    <div style="height: 200px;">
                                        <img src="{{ $post->featured_image ? asset('storage/' . $post->featured_image) : asset('images/img-1-min.webp') }}"
                                            class="w-100 h-100 object-fit-cover" alt="{{ $post->title }}">
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                            <span><i class="bi bi-calendar2-event"></i> {{ $post->short_date }}</span>
                                            <span><i class="bi bi-clock"></i> {{ $post->read_time }} min</span>
                                            @if ($post->category)
                                                <span
                                                    class="badge bg-primary bg-opacity-10 text-primary">{{ $post->category }}</span>
                                            @endif
                                        </div>
                                        <h3 class="h5 card-title">{{ $post->title }}</h3>
                                        <p class="card-text text-muted">{{ Str::limit($post->excerpt, 120) }}</p>
                                        <a href="{{ route('blog.single', $post->slug) }}" class="stretched-link">Read
                                            more</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-info text-center">
                                    <i class="bi bi-info-circle me-2"></i>No blog posts available at the moment. Check
                                    back soon!
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </section>
            <!-- End Blog -->

            <!-- Footer -->
            <footer class="footer bg-light pt-5 pb-4 border-top">
                <div class="container">
                    <div class="row g-4 align-items-center pb-4">
                        <div class="col-lg-8">
                            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3 gap-lg-4">
                                <img class="img-fluid" src="{{ asset('images/navbar_logo.png') }}"
                                    alt="John Field Fundraising logo" style="max-height: 52px;">
                                <div>
                                    <h2 class="fs-5 mb-2">Helping charities build sustainable trust income</h2>
                                    <p class="mb-0 text-muted">Strategy, mentoring, and bid support tailored to your
                                        fundraising goals.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a class="btn btn-primary text-white" href="{{ route('home') }}#contact">Start a
                                conversation</a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="h-100 p-4 bg-white border rounded-4 shadow-sm text-center text-md-start">
                                <h3 class="fs-6 text-uppercase text-muted mb-2">Get in touch</h3>
                                <ul class="list-unstyled text-muted small mb-0 d-flex flex-column gap-2">
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="bi bi-clock text-primary mt-1"></i>
                                        <div>
                                            <span class="d-block">Replies within two business days.</span>
                                            <small>Based in Sheffield, UK · GMT</small>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="text-reset text-decoration-none d-flex align-items-center gap-2"
                                            href="https://www.linkedin.com/in/johnfieldfundraising/" target="_blank"
                                            rel="noopener">
                                            <i class="bi bi-linkedin text-primary"></i>
                                            <span>LinkedIn: John Field</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="h-100 p-4 bg-white border rounded-4 shadow-sm text-center text-md-start">
                                <h3 class="fs-6 text-uppercase text-muted mb-2">Services</h3>
                                <ul class="list-unstyled text-muted small mb-0 d-flex flex-column gap-2">
                                    <li class="d-flex align-items-start gap-2"><i
                                            class="bi bi-check-circle text-primary"></i><span>Trust fundraising
                                            strategy</span></li>
                                    <li class="d-flex align-items-start gap-2"><i
                                            class="bi bi-check-circle text-primary"></i><span>Prospect research &amp;
                                            pipeline design</span></li>
                                    <li class="d-flex align-items-start gap-2"><i
                                            class="bi bi-check-circle text-primary"></i><span>Bid writing, mentoring
                                            &amp; reviews</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="h-100 p-4 bg-white border rounded-4 shadow-sm text-center text-md-start">
                                <h3 class="fs-6 text-uppercase text-muted mb-2">Highlights</h3>
                                <div class="d-flex flex-column gap-2 text-muted small">
                                    <div><span class="d-block fw-semibold text-dark">32
                                            charities</span><small>Supported with strategy and bids in 2025.</small>
                                    </div>
                                    <div><span class="d-block fw-semibold text-dark">£450k award</span><small>Largest
                                            multi-year funding secured this year.</small></div>
                                    <div><span class="d-block fw-semibold text-dark">95% retention</span><small>Clients
                                            returning for ongoing fundraising support.</small></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-muted small mt-5 pt-3 border-top">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        John Field Fundraising Ltd · Company Number 13040151
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </main>
    </div>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top"><i class="bi bi-arrow-up-short"></i></button>

    <!-- Scripts -->
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('vendors/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('js/preloader.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script>
        if (window.AOS) {
            AOS.init({
                duration: 900,
                offset: 120,
                easing: 'ease-out-cubic',
                once: true,
                mirror: false
            });
        }
    </script>
</body>

</html>
