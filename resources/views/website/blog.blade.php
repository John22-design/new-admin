<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog · John Field Fundraising</title>
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
                    <!-- Header + Controls -->
                    <div class="row align-items-end g-3 my-4">
                        <div class="col-lg-6">
                            <h1 class="h2 fw-bold mb-2">From the Fundraising Desk</h1>
                            <p class="text-muted mb-0">Practical tips, real-world lessons, and strategies to help your
                                charity grow sustainable income.</p>
                        </div>
                        <div class="col-lg-6">
                            <form class="row g-2 justify-content-lg-end" role="search">
                                <div class="col-6 col-sm-5">
                                    <select class="form-select">
                                        <option selected>All Categories</option>
                                        <option>Strategy</option>
                                        <option>Research</option>
                                        <option>Bid Writing</option>
                                        <option>Stewardship</option>
                                    </select>
                                </div>
                                <div class="col-6 col-sm-5">
                                    <input type="search" class="form-control" placeholder="Search articles">
                                </div>
                                <div class="col-12 col-sm-2 d-grid">
                                    <button type="button" class="btn btn-primary">Filter</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Featured Article -->
                    <div class="row g-4 mb-4">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm overflow-hidden featured-card">
                                <div class="row g-0">
                                    <div class="col-md-6">
                                        <div style="height: 240px;">
                                            <img src="{{ asset('images/img-10-min.jpg') }}"
                                                class="w-100 h-100 object-fit-cover" alt="Featured article">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                                <span><i class="bi bi-calendar2-event"></i> Nov 25, 2025</span>
                                                <span><i class="bi bi-clock"></i> 6 min read</span>
                                                <span
                                                    class="badge bg-primary bg-opacity-10 text-primary">Stewardship</span>
                                            </div>
                                            <h2 class="h4 card-title">How to Build Funder Relationships That Last</h2>
                                            <p class="card-text text-muted">Simple steps for first contact, reporting,
                                                and ongoing communication that builds trust and long-term support.</p>
                                            <a href="#" class="btn btn-outline-primary">Read article</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Articles Grid -->
                    <div class="row g-4">
                        <!-- Card 1 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-1-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Pipeline">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Sep 18, 2025</span>
                                        <span><i class="bi bi-clock"></i> 4 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Strategy</span>
                                    </div>
                                    <h3 class="h5 card-title">Build a Strong Funder Pipeline</h3>
                                    <p class="card-text text-muted">Turn scattered prospects into a focused pipeline
                                        with clear qualification and engagement steps.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-3-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Grant writing">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Sep 7, 2025</span>
                                        <span><i class="bi bi-clock"></i> 5 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Bid Writing</span>
                                    </div>
                                    <h3 class="h5 card-title">Grant Writing that Wins</h3>
                                    <p class="card-text text-muted">What funders look for: clarity, outcomes, evidence,
                                        and why your project truly matters.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-4-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Diversify income">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Aug 29, 2025</span>
                                        <span><i class="bi bi-clock"></i> 6 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Strategy</span>
                                    </div>
                                    <h3 class="h5 card-title">Diversify Income, Reduce Risk</h3>
                                    <p class="card-text text-muted">Practical ways to add new revenue streams without
                                        losing focus on your mission.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 4 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-10-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Relationships">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Aug 12, 2025</span>
                                        <span><i class="bi bi-clock"></i> 4 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Stewardship</span>
                                    </div>
                                    <h3 class="h5 card-title">Cultivating Funder Relationships</h3>
                                    <p class="card-text text-muted">From first contact to stewardship—simple steps to
                                        build trust and long-term support.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 5 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-11-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Impact stories">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Jul 30, 2025</span>
                                        <span><i class="bi bi-clock"></i> 5 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Communications</span>
                                    </div>
                                    <h3 class="h5 card-title">Impact Stories that Convert</h3>
                                    <p class="card-text text-muted">Frame outcomes, evidence, and urgency to inspire
                                        action—from bids to newsletters.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>

                        <!-- Card 6 -->
                        <div class="col-sm-6 col-lg-4">
                            <div class="card h-100 border-0 shadow-sm blog-card">
                                <div style="height: 180px;">
                                    <img src="{{ asset('images/img-12-min.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" alt="Impact stories">
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center gap-3 small text-muted mb-2">
                                        <span><i class="bi bi-calendar2-event"></i> Jul 30, 2025</span>
                                        <span><i class="bi bi-clock"></i> 5 min</span>
                                        <span class="badge bg-primary bg-opacity-10 text-primary">Communications</span>
                                    </div>
                                    <h3 class="h5 card-title">Trust Fundraising Readiness</h3>
                                    <p class="card-text text-muted">A quick checklist to ensure your case for support
                                        is clear, evidenced, and funder-ready.</p>
                                    <a href="#" class="stretched-link">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        <nav aria-label="Blog pagination">
                            <ul class="pagination pagination-rounded">
                                <li class="page-item disabled"><span class="page-link">Previous</span></li>
                                <li class="page-item active" aria-current="page"><span class="page-link">1</span>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
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
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>

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
