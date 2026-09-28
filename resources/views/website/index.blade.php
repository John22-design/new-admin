@php
    $isMobile = preg_match('/Mobile|Android|iP(hone|od|ad)|IEMobile|BlackBerry|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/', request()->userAgent());
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Trusts and foundations consultancy for charities, including strategy, prioritised pipelines, applications and capital fundraising support.">
    <title>John Field Fundraising</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet"></noscript>

    <!-- Preload LCP Images -->
    <link rel="preload" href="{{ asset('images/hero_1.webp') }}" as="image" type="image/webp">
    <link rel="preload" href="{{ asset('images/hero_2.webp') }}" as="image" type="image/webp">

    <!-- Critical CSS Styles -->
    <link href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    @vite(['resources/css/style.css'])
    @if(!$isMobile)
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">
    @endif

    <!-- Non-critical Styles (Deferred for Performance) -->
    <link rel="preload" href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet"></noscript>

    <link rel="preload" href="{{ asset('vendors/aos/aos.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet"></noscript>

    <link rel="preload" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet"></noscript>

    <style>
        .swal2-container {
            z-index: 100000 !important;
        }
        #back-to-top.show {
            bottom: 90px !important;
        }
    </style>

    <script>
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>

<body>
    <x-preloader :disabled="$isMobile" theme="gradient" variant="progress" />

    <div class="site-wrap">
        <!-- ======= Header =======-->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="navbar">
            <div class="container d-flex align-items-center justify-content-between">


                <!-- Start Logo-->
                <a class="navbar-brand w-auto" href="#home">
                    <img class="logo dark img-fluid ms-3" src="{{ asset('images/navbar_logo.png') }}"
                        alt="John Field Fundraising logo" width="150" height="40" style="height:40px; width:auto; max-width:160px; border-radius:3px;">
                </a>
                <!-- End Logo-->

                <!-- Start offcanvas-->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                    aria-labelledby="fbs__net-navbarsLabel">


                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                                <img class="logo dark img-fluid"
                                    width="150" height="40"
                                    style="height:40px; width:auto; max-width:160px; border-radius:3px;"
                                    src="{{ asset('images/navbar_logo.png') }}" alt="John Field Fundraising logo">
                            </a>
                        </div>
                        {{-- <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    </div>

                    <div class="offcanvas-body align-items-lg-center">


                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page"
                                    href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#services">Services</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#faq">FAQ</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li>
                            {{-- <li class="nav-item"><a class="nav-link scroll-link" href="#testimonials">Testimonials</a>
                            </li> --}}
                        </ul>

                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="ms-auto w-auto">


                    <div class="header-social d-flex align-items-center gap-1"><a class="btn btn-primary py-2"
                            href="#contact">Contact</a>

                        <button class="fbs__net-navbar-toggler justify-content-center align-items-center me-3"
                            data-bs-toggle="offcanvas" data-bs-target="#fbs__net-navbars"
                            aria-controls="fbs__net-navbars" aria-label="Toggle navigation" aria-expanded="false">
                            <svg class="fbs__net-icon-menu" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <line x1="21" x2="3" y1="6" y2="6"></line>
                                <line x1="15" x2="3" y1="12" y2="12"></line>
                                <line x1="17" x2="3" y1="18" y2="18"></line>
                            </svg>
                            <svg class="fbs__net-icon-close" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor"
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
            <!-- ======= Hero =======-->
            <section class="hero__v6 section bg-light" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-1 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-11"><span class="hero-subtitle text-uppercase mb-3"
                                        data-aos="fade-right" data-aos-delay="0" data-aos-duration="800">Trusts and
                                        foundations consultancy</span>
                                    <h1 class="hero-title mb-3" data-aos="fade-right" data-aos-delay="100"
                                        data-aos-duration="1000">Focused trusts and foundations support for charities</h1>
                                    <p class="hero-description mb-4 mb-lg-4" data-aos="fade-right"
                                        data-aos-delay="200" data-aos-duration="1000">
                                        I help charities strengthen their trusts fundraising through clear strategy,
                                        prioritised pipelines, strong applications and capital fundraising support.
                                        Each project has an agreed scope, clear outputs and a useful handover.</p>
                                    <div class="cta d-flex gap-3 flex-wrap mb-4 mb-lg-5" data-aos="fade-right"
                                        data-aos-delay="300" data-aos-duration="1000"><a class="btn"
                                            href="#contact">Discuss your project</a><a class="btn btn-white-outline"
                                            href="#services" aria-label="View John Field Fundraising services">View my services
                                            <svg class="lucide lucide-arrow-up-right"
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg></a></div>
                                    <div class="hero-highlight d-inline-flex align-items-center gap-3 px-4 py-3 rounded-pill bg-white border shadow-sm mb-3"
                                        data-aos="fade-right" data-aos-delay="400" data-aos-duration="1000">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center rounded-circle"
                                            style="height: 44px; width: 44px; background-color: rgba(var(--bs-primary-rgb), 0.12);">
                                            <i class="bi bi-award-fill text-primary fs-5"></i>
                                        </span>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold text-primary">More than 25 years of fundraising
                                                experience</span>
                                            <span class="text-muted small">More than £10 million secured for charities
                                                through grant funding.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img mb-5"><img class="img-card img-fluid border-white"
                                    src="{{ asset('images/hero_2.webp') }}" style="border: 2px white solid"
                                    width="800" height="600"
                                    alt="Image card" data-aos="fade-left" data-aos-delay="400"
                                    data-aos-duration="1000"><img class="img-main img-fluid rounded-4"
                                    src="{{ asset('images/hero_1.webp') }}" alt="Hero Image"
                                    width="1200" height="800"
                                    data-aos="zoom-in"
                                    data-aos-delay="200" data-aos-duration="1200">
                            </div>
                            <div class="pt-2 mt-lg-5 d-flex flex-wrap align-items-center justify-content-center gap-4 text-muted small"
                                aria-hidden="true">
                                <span class="d-inline-flex align-items-center gap-2"><i
                                        class="bi bi-award text-primary"></i> Strategy, pipelines and applications</span>
                                <span class="d-inline-flex align-items-center gap-2"><i
                                        class="bi bi-graph-up text-primary"></i> Capital fundraising support</span>
                                <span class="d-inline-flex align-items-center gap-2"><i
                                        class="bi bi-people text-primary"></i> Clear scope and handover</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= Work  =======-->
            <section class="about__v4 section bg-light" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 order-md-2">
                            <div class="row justify-content-end">
                                <div class="col-md-11 mb-4 mb-md-0 text-center text-md-start"><span
                                        class="subtitle text-uppercase mb-3" data-aos="fade-left" data-aos-delay="0"
                                        data-aos-duration="800">How I work</span>
                                    <h2 class="mb-4" data-aos="fade-left" data-aos-delay="100" data-aos-duration="1000">
                                        A clear project with a useful result</h2>
                                    <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                                        <p>I start by understanding what you need, what information is already available
                                            and what a successful piece of work should produce. We then agree the scope,
                                            outputs and review points before work begins.</p>
                                    </div>
                                    <h3 class="small fw-bold mt-4 mb-3" data-aos="fade-left" data-aos-delay="300" data-aos-duration="1000">My
                                        work focuses on:
                                    </h3>
                                    <ul class="list-unstyled text-start"
                                        >
                                        <li class="d-flex gap-3 mb-3" data-aos="fade-left" data-aos-delay="400" data-aos-duration="1000">
                                            <span class="icon rounded-circle flex-shrink-0"><i class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">A clear brief and realistic priorities</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3" data-aos="fade-left" data-aos-delay="500" data-aos-duration="1000">
                                            <span class="icon rounded-circle flex-shrink-0"><i class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Research grounded in funder eligibility and fit</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3" data-aos="fade-left" data-aos-delay="600" data-aos-duration="1000">
                                            <span class="icon rounded-circle flex-shrink-0"><i class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Strong, specific applications based on your evidence</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3" data-aos="fade-left" data-aos-delay="700" data-aos-duration="1000">
                                            <span class="icon rounded-circle flex-shrink-0"><i class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Regular communication and clear review points</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3" data-aos="fade-left" data-aos-delay="800" data-aos-duration="1000">
                                            <span class="icon rounded-circle flex-shrink-0"><i class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">A final handover showing decisions, next actions and ownership</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap position-relative"><img class="img-fluid rounded-4"
                                    src="{{ asset('images/about-us.webp') }}" alt="Planning a focused fundraising project"
                                    width="1200" height="873"
                                    data-aos="fade-right"
                                    data-aos-delay="0" data-aos-duration="1000">
                                <div class="mission-statement p-4 rounded-4 d-flex gap-4" data-aos="flip-left"
                                    data-aos-delay="300" data-aos-duration="1000">
                                    <div class="mission-icon text-center rounded-circle"><i class="bi bi-lightbulb fs-4"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-uppercase fw-bold">Experienced support, focused on the work</h3>
                                        <p class="fs-5 mb-0">You get senior fundraising judgement and hands-on delivery,
                                            shaped around a clear piece of work.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- ======= My Process =======-->
            <section class="section process__v1 bg-light" id="my-process">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <h2 class="mb-2" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">My
                                Process</h2>
                            <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">A straightforward route
                                from the first conversation to a completed piece of work.</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Step 1 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0" data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">1</span>
                                    <h3 class="fs-5 fw-bold mb-0">Initial conversation</h3>
                                </div>
                                <p class="mb-0 text-muted">We discuss the need, the intended result and whether I am the
                                    right person to help.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">2</span>
                                    <h3 class="fs-5 fw-bold mb-0">Agree the scope</h3>
                                </div>
                                <p class="mb-0 text-muted">We confirm the outputs, information needed, timing, fee and
                                    points for review.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">3</span>
                                    <h3 class="fs-5 fw-bold mb-0">Research and prepare</h3>
                                </div>
                                <p class="mb-0 text-muted">I review your evidence, assess funder fit and identify any
                                    gaps that need resolving before the main work is completed.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">4</span>
                                    <h3 class="fs-5 fw-bold mb-0">Deliver and review</h3>
                                </div>
                                <p class="mb-0 text-muted">I complete the agreed research or writing, with clear review
                                    points for decisions and feedback.</p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">5</span>
                                    <h3 class="fs-5 fw-bold mb-0">Final handover</h3>
                                </div>
                                <p class="mb-0 text-muted">You receive the final work, a clear record of key decisions
                                    and the next actions for your team.</p>
                            </div>
                        </div>

                        <!-- Visual Element -->
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="1000">
                            <div class="p-4 rounded-4 h-100 bg-primary text-white d-flex flex-column justify-content-center">
                                <div class="text-center">
                                    <i class="bi bi-arrow-repeat fs-1 mb-3 d-block opacity-75"></i>
                                    <h4 class="fw-bold mb-3">Focused projects</h4>
                                    <p class="mb-0">Work can be standalone or part of a larger programme. The scope and
                                        finish point stay clear from the start.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= Services =======-->
            <section class="section services__v3 bg-light position-relative overflow-hidden" id="services">
                <!-- Decorative Background Elements -->
                <div class="position-absolute top-0 start-0 w-100 h-100" style="z-index: 0; opacity: 0.05;">
                    <div class="position-absolute"
                        style="top: 10%; left: 5%; width: 300px; height: 300px; background: radial-gradient(circle, var(--bs-primary) 0%, transparent 70%);">
                    </div>
                    <div class="position-absolute"
                        style="bottom: 10%; right: 5%; width: 400px; height: 400px; background: radial-gradient(circle, var(--bs-primary) 0%, transparent 70%);">
                    </div>
                </div>

                <div class="container position-relative px-4" style="z-index: 1;">
                    <div class="row mb-5 pb-4">
                        <div class="col-md-10 col-lg-8 mx-auto text-center">
                            <h2 class="mb-2 fw-bold" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000"
                                style="line-height: 1.3;">
                                Services
                            </h2>
                            <div data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                                <p>
                                    Defined pieces of work that help charities plan, prioritise and deliver stronger
                                    trusts and foundations fundraising.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Items -->
                    <div class="row g-5 mb-4">
                        <!-- Service 1 -->
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="0" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <!-- Number Badge -->
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            01
                                        </div>
                                        <!-- Icon -->
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-clipboard-data"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Trusts Fundraising
                                        Strategy</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        A focused review of your current position, priorities and funding mix, followed
                                        by a clear plan for the next stage of your trusts fundraising.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 2 -->
                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="100" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            02
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-search" style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Pipeline Research and
                                        Prioritisation</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Researching suitable trusts and foundations, checking eligibility and fit, then
                                        building a prioritised pipeline your team can use.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 3 -->
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            03
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-pen" style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Case for Support</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        A clear core case explaining the need, your work, the difference it makes and
                                        why funding is required.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 4 -->
                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            04
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-file-earmark-text"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Funding Applications</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Drafting or improving applications that answer the funder's questions and use
                                        your evidence, budget and intended outcomes well.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 5 -->
                        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="400" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            05
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-building" style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Capital Fundraising</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Trust-led support for building purchases, refurbishment, major equipment and
                                        other capital projects, from early planning to applications.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Service 6 -->
                        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500" data-aos-duration="800">
                            <div class="d-flex gap-4 align-items-start position-relative pb-5"
                                style="border-bottom: 2px solid rgba(var(--bs-primary-rgb), 0.1);">
                                <div class="flex-shrink-0">
                                    <div class="position-relative">
                                        <div class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-primary"
                                            style="font-size: 0.7rem; padding: 0.35rem 0.6rem; z-index: 2;">
                                            06
                                        </div>
                                        <div class="d-flex align-items-center justify-content-center rounded-3"
                                            style="width: 90px; height: 90px; background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.1) 0%, rgba(var(--bs-primary-rgb), 0.05) 100%); border: 2px solid rgba(var(--bs-primary-rgb), 0.2);">
                                            <i class="bi bi-check2-square"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold" style="color: var(--bs-dark); margin-bottom: 1.29rem;">
                                        Bid Review and Quality Assurance</h3>
                                    <p class="text-muted mb-4 lh-lg" style="font-size: 0.95rem;">
                                        An experienced review of applications, pipelines or supporting materials, with
                                        clear recommendations for improvement.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= FAQ =======-->
            <section class="section faq__v2 bg-light" id="faq">
                <div class="container py-5">
                    <!-- Header -->
                    <div class="row mb-5">
                        <div class="col-lg-8 mx-auto text-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3" data-aos="fade-up"
                                data-aos-delay="0">
                                <i class="bi bi-question-circle me-2"></i>FAQ
                            </span>
                            <h2 class="display-5 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">
                                Frequently Asked Questions
                            </h2>
                            <p class="lead text-muted" data-aos="fade-up" data-aos-delay="200">
                                Straight answers about the work, how projects are structured and whether I may be a good fit.
                            </p>
                        </div>
                    </div>

                    <!-- FAQ Accordion -->
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="accordion accordion-flush shadow-sm bg-white rounded-3" id="faqAccordion"
                                data-aos="fade-up" data-aos-delay="300">

                                <!-- FAQ Item 1 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-1" aria-expanded="true"
                                            aria-controls="faq-1">
                                            <i class="bi bi-briefcase text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">What work can you help with?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="faq-1"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            I specialise in trusts and foundations fundraising. My work includes
                                            strategy, funder research, prioritised pipelines, cases for support,
                                            applications, bid reviews and capital fundraising projects.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 2 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false"
                                            aria-controls="faq-2">
                                            <i class="bi bi-pencil-square text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Do you write funding applications?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-2" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Yes. I can draft a complete application or improve an existing draft. Your
                                            charity provides and approves the evidence, figures, budget and final submission.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 3 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false"
                                            aria-controls="faq-3">
                                            <i class="bi bi-gear text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">How is a project structured?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-3" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            We agree the scope, outputs, fee or number of days, information needed,
                                            timing and review points before work begins. You then receive the completed
                                            work and a clear handover.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 4 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-4" aria-expanded="false"
                                            aria-controls="faq-4">
                                            <i class="bi bi-people text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Can you help us find and approach new
                                                funders?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-4" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Yes. I research eligibility, interests, geography, typical grants and likely
                                            fit, then build a focused shortlist your team can use.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 5 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-5" aria-expanded="false"
                                            aria-controls="faq-5">
                                            <i class="bi bi-building text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">What kind of organisations do you usually work
                                                with?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-5" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            I mainly work with small and medium-sized UK charities, as well as larger
                                            organisations needing help with a specific trusts workstream. My experience
                                            includes children and young people, health, disability, social welfare,
                                            education, community development and the arts.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 6 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-6" aria-expanded="false"
                                            aria-controls="faq-6">
                                            <i class="bi bi-arrow-repeat text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Can you help with a capital project?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-6" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Yes. I can help assess the trust fundraising case, build a suitable pipeline
                                            and prepare applications for projects such as property purchases,
                                            refurbishment, major equipment and vehicles.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 7 -->
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-7" aria-expanded="false"
                                            aria-controls="faq-7">
                                            <i class="bi bi-star text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">What happens first?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-7" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            We start with a short conversation about your charity, the work required and
                                            the intended result. If the fit is right, I will set out the proposed scope,
                                            outputs and fee clearly before you decide whether to proceed.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Additional Help CTA -->
                            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                                <div class="card border-0 shadow-sm bg-primary bg-opacity-10">
                                    <div class="card-body py-4">
                                        <h5 class="fw-bold mb-2">Have a project in mind?</h5>
                                        <p class="text-muted mb-3">Tell me what your charity needs and I will let you
                                            know whether I can help.</p>
                                        <a href="#contact" class="btn btn-primary px-4">
                                            <i class="bi bi-envelope me-2"></i>Discuss your project
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= Contact =======-->
            <section class="section contact__v2 bg-secondary-soft" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                                data-aos="fade-up" data-aos-delay="0">Contact</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Discuss a project</h2>
                            <p data-aos="fade-up" data-aos-delay="100">If your charity needs help with a trusts strategy,
                                pipeline, applications or capital fundraising, tell me what you are working on and where
                                you need support.</p>
                        </div>
                    </div>
                    <div class="row g-4 align-items-stretch">
                        <div class="col-lg-5">
                            <div class="h-100 rounded-4 border shadow-sm bg-white p-4 p-lg-5 d-flex flex-column"
                                data-aos="fade-up" data-aos-delay="0">
                                <span
                                    class="text-uppercase small text-primary fw-semibold d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-stars"></i>
                                    A straightforward first conversation
                                </span>
                                <h3 class="mt-3 mb-3">Tell me what you need</h3>
                                <p class="text-muted mb-4">A brief outline of the charity, the work required and any key
                                    timing is enough. I will let you know whether I can help and suggest a sensible next step.</p>

                                <div class="d-flex flex-column gap-3 mt-auto">
                                    <a class="btn btn-primary d-inline-flex align-items-center gap-2"
                                        href="https://www.linkedin.com/in/johnfieldfundraising/" target="_blank"
                                        rel="noopener">
                                        <i class="bi bi-linkedin"></i>
                                        Message on LinkedIn
                                    </a>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="bi bi-clock-history text-primary"></i>
                                        <span>Replies within two business days.</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-2 text-muted small">
                                        <i class="bi bi-people text-primary"></i>
                                        <span>For charity leaders and fundraising teams across the UK.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-wrapper rounded-4 border shadow-sm bg-white p-4 p-lg-5" data-aos="fade-up"
                                data-aos-delay="150">
                                <h3 class="h4 mb-3">Send a message</h3>
                                <p class="text-muted small mb-4">Give me a brief outline of the work and I will respond
                                    within two business days.</p>
                                <form id="contactForm" class="d-flex flex-column gap-3" action="{{ route('contact.send') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="mb-2" for="name">Name <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                required maxlength="255">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="mb-2" for="email">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                required maxlength="255">
                                        </div>
                                    </div>
                                    <div>
                                        <label class="mb-2" for="subject">Subject <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" id="subject" type="text" name="subject" required
                                            maxlength="500">
                                    </div>
                                    <div>
                                        <label class="mb-2" for="message">Message <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required maxlength="5000"
                                            placeholder="Tell me about the charity, the work you need and any key timing..."></textarea>
                                        <small class="text-muted">Maximum 5000 characters</small>
                                    </div>
                                    <!-- Spatie Honeypot field for spam protection -->
                                    @honeypot

                                    <button class="btn btn-primary fw-semibold align-self-end" type="submit" id="submitBtn">
                                        <i class="bi bi-send me-2"></i>
                                        <span id="submitText">Send Message</span>
                                    </button>
                                </form>
                                <div class="mt-3 d-none alert alert-success" id="successMessage">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    <span id="successText">Thank you for your message. I will respond within two
                                        business days.</span>
                                </div>
                                <div class="mt-3 d-none alert alert-danger" id="errorMessage">
                                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                    <span id="errorText">Sorry, there was an error sending your message. Please try
                                        again or contact us via LinkedIn.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- ======= Footer =======-->
            <footer class="footer bg-light pt-5 pb-4 border-top">
                <div class="container">
                    <div class="row g-4 align-items-center pb-4">
                        <div class="col-lg-8">
                            <div class="d-flex flex-column flex-lg-row align-items-lg-center gap-3 gap-lg-4">
                                <img class="img-fluid" src="{{ asset('images/navbar_logo.png') }}" width="195" height="52"
                                    alt="John Field Fundraising logo" style="max-height: 52px; width: auto;">
                                <div>
                                    <h2 class="fs-5 mb-2">Focused trusts and foundations support for charities</h2>
                                    <p class="mb-0 text-muted">Strategy, pipelines, applications and capital fundraising
                                        projects with clear outputs.</p>
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
                                            <small>Based in Surrey, working with charities across the UK.</small>
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
                                            class="bi bi-check-circle text-primary"></i><span>Trusts fundraising
                                            strategy</span></li>
                                    <li class="d-flex align-items-start gap-2"><i
                                            class="bi bi-check-circle text-primary"></i><span>Prospect research &amp;
                                            pipeline design</span></li>
                                    <li class="d-flex align-items-start gap-2"><i
                                            class="bi bi-check-circle text-primary"></i><span>Applications, cases for
                                            support &amp; capital projects</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="h-100 p-4 bg-white border rounded-4 shadow-sm text-center text-md-start">
                                <h3 class="fs-6 text-uppercase text-muted mb-2">Highlights</h3>
                                <div class="d-flex flex-column gap-2 text-muted small">
                                    <div><span class="d-block fw-semibold text-dark">More than 25 years</span><small>of
                                            fundraising experience.</small>
                                    </div>
                                    <div><span class="d-block fw-semibold text-dark">More than £10 million</span><small>
                                            secured for charities through grant funding.</small></div>
                                    <div><span class="d-block fw-semibold text-dark">Clear project scope</span><small>
                                            agreed outputs, review points and handover.</small></div>
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
        </main>
    </div>

    <!-- Back to Top -->
    <button id="back-to-top" aria-label="Back to top"><i class="bi bi-arrow-up-short"></i></button>

    <!-- Scripts -->
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendors/aos/aos.js') }}" defer></script>
    @if(!$isMobile)
    <script src="{{ asset('js/preloader.js') }}" defer></script>
    @endif
    <script src="{{ asset('js/custom.js') }}" defer></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.AOS) {
                AOS.init({
                    duration: 900,
                    offset: 120,
                    easing: 'ease-out-cubic',
                    once: true,
                    mirror: false
                });
            }

            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                let recaptchaLoaded = false;
                const loadRecaptcha = () => {
                    if (recaptchaLoaded) return;
                    recaptchaLoaded = true;

                    // Remove event listeners
                    contactForm.removeEventListener('focusin', loadRecaptcha);
                    contactForm.removeEventListener('click', loadRecaptcha);
                    contactForm.removeEventListener('mouseenter', loadRecaptcha);

                    const siteKey = '{{ config('services.recaptcha.site_key') }}';
                    if (siteKey) {
                        const script = document.createElement('script');
                        script.src = `https://www.google.com/recaptcha/api.js?render=${siteKey}`;
                        script.async = true;
                        script.defer = true;
                        document.body.appendChild(script);
                    }
                };

                // Load reCAPTCHA when user interacts with the form
                contactForm.addEventListener('focusin', loadRecaptcha, { once: true });
                contactForm.addEventListener('click', loadRecaptcha, { once: true });
                contactForm.addEventListener('mouseenter', loadRecaptcha, { once: true });

                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    const form = this;
                    const submitBtn = document.getElementById('submitBtn');
                    const submitText = document.getElementById('submitText');
                    const originalText = submitText.textContent;

                    // Disable button and show loading
                    submitBtn.disabled = true;
                    submitText.textContent = 'Sending...';

                    function submitForm(token = '') {
                        const formData = new FormData(form);
                        if (token) {
                            formData.append('g-recaptcha-response', token);
                        }

                        fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Message sent successfully!',
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true
                                });
                                form.reset(); // Clear form
                            } else {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Failed to send message',
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 4000,
                                    timerProgressBar: true
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'An error occurred',
                                text: 'Please try again.',
                                showConfirmButton: false,
                                timer: 4000,
                                timerProgressBar: true
                            });
                        })
                        .finally(() => {
                            // Re-enable button
                            submitBtn.disabled = false;
                            submitText.textContent = originalText;
                        });
                    }

                    function executeRecaptchaAndSubmit() {
                        const siteKey = '{{ config('services.recaptcha.site_key') }}';
                        if (typeof grecaptcha !== 'undefined' && siteKey) {
                            grecaptcha.ready(function() {
                                grecaptcha.execute(siteKey, {action: 'contact_form'}).then(function(token) {
                                    submitForm(token);
                                }).catch(function(err) {
                                    console.error('reCAPTCHA execution error:', err);
                                    submitForm('');
                                });
                            });
                        } else {
                            if (siteKey && !recaptchaLoaded) {
                                loadRecaptcha();
                                let checkInterval = setInterval(() => {
                                    if (typeof grecaptcha !== 'undefined') {
                                        clearInterval(checkInterval);
                                        executeRecaptchaAndSubmit();
                                    }
                                }, 100);
                                setTimeout(() => {
                                    clearInterval(checkInterval);
                                    if (typeof grecaptcha === 'undefined') {
                                        submitForm('');
                                    }
                                }, 2000);
                            } else {
                                submitForm('');
                            }
                        }
                    }

                    executeRecaptchaAndSubmit();
                });
            }
        });
    </script>
</body>

</html>
