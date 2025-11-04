<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> John Field Fundraising </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <!-- ======= Google Font =======-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&amp;display=swap" rel="stylesheet">
    <!-- End Google Font-->

    <!-- ======= Styles =======-->
    <link href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/glightbox/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/aos/aos.css') }}" rel="stylesheet">
    <!-- End Styles-->

    <!-- ======= Theme Style =======-->
    @vite(['resources/css/style.css'])
    <!-- End Theme Style-->
    <!-- ======= Preloader CSS =======-->
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">
    <!-- ======= Apply theme =======-->
    <script>
        // Apply the theme as early as possible to avoid flicker
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
</head>

<body>

    <x-preloader theme="gradient" variant="progress" />

    <!-- ======= Site Wrap =======-->
    <div class="site-wrap">


        <!-- ======= Header =======-->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="navbar">
            <div class="container d-flex align-items-center justify-content-between">


                <!-- Start Logo-->
                <a class="navbar-brand w-auto" href="index.html">
                    <img class="logo dark img-fluid" src="{{ asset('images/navbar_logo.png') }}" alt="image placeholder"
                        style="height:40px; width:auto; max-width:160px; border-radius:3px;">
                </a>
                <!-- End Logo-->

                <!-- Start offcanvas-->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                    aria-labelledby="fbs__net-navbarsLabel">


                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="index.html">
                                <img class="logo dark img-fluid"
                                    style="height:40px; width:auto; max-width:160px; border-radius:3px;"
                                    src="{{ asset('images/navbar_logo.png') }}" alt="image placeholder">
                        </div>
                        {{-- <button class="btn-close btn-close-black" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button> --}}
                    </div>

                    <div class="offcanvas-body align-items-lg-center">


                        <ul class="navbar-nav nav me-auto ps-lg-5 mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link scroll-link active" aria-current="page"
                                    href="#home">Home</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#blog">Blog</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#services">Services</a></li>
                            <li class="nav-item"><a class="nav-link scroll-link" href="#testimonials">Testimonials</a>
                            </li>
                        </ul>

                    </div>
                </div>
                <!-- End offcanvas-->

                <div class="ms-auto w-auto">


                    <div class="header-social d-flex align-items-center gap-1"><a class="btn btn-primary py-2"
                            href="#contact">Contact</a>

                        <button class="fbs__net-navbar-toggler justify-content-center align-items-center ms-auto"
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
        <!-- End Header-->

        <!-- ======= Main =======-->
        <main>


            <!-- ======= Hero =======-->
            <section class="hero__v6 section bg-light" id="home">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-1 mb-lg-0">
                            <div class="row">
                                <div class="col-lg-11"><span class="hero-subtitle text-uppercase mb-3"
                                        data-aos="fade-right" data-aos-delay="0" data-aos-duration="800">Together, We
                                        Create Change</span>
                                    <h1 class="hero-title mb-3" data-aos="fade-right" data-aos-delay="100"
                                        data-aos-duration="1000">Building
                                        Sustainable Funding for the Future</h1>
                                    <p class="hero-description mb-4 mb-lg-4" data-aos="fade-right"
                                        data-aos-delay="200" data-aos-duration="1000">
                                        I help charities and non-profits secure long-term funding through clear
                                        strategy, strong cases for support, and practical trust fundraising advice. My
                                        work is about helping you plan ahead, build lasting funder relationships, and
                                        secure the resources you need to make a real difference.</p>
                                    <div class="cta d-flex gap-2 mb-4 mb-lg-5" data-aos="fade-right"
                                        data-aos-delay="300" data-aos-duration="1000"><a class="btn"
                                            href="#">Contact Now</a><a class="btn btn-white-outline"
                                            href="#">Learn More
                                            <svg class="lucide lucide-arrow-up-right"
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg></a></div>
                                    <div class="logos mb-4" data-aos="zoom-in" data-aos-delay="400"
                                        data-aos-duration="1000"><span
                                            class="logos-title text-uppercase mb-4 d-block">Trusted by major companies
                                            worldwide</span>
                                        <div class="logos-images d-flex gap-4 align-items-center"><img
                                                class="img-fluid js-img-to-inline-svg"
                                                src="{{ asset('images/logo/actual-size/logo-air-bnb__black.svg') }}"
                                                alt="Company 1" style="width: 110px;"><img
                                                class="img-fluid js-img-to-inline-svg"
                                                src="{{ asset('images/logo/actual-size/logo-ibm__black.svg') }}"
                                                alt="Company 2" style="width: 80px;"><img
                                                class="img-fluid js-img-to-inline-svg"
                                                src="{{ asset('images/logo/actual-size/logo-google__black.svg') }}"
                                                alt="Company 3" style="width: 110px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img"><img class="img-card img-fluid animate-bounce"
                                    src="{{ asset('images/hero-3.jpg') }}" alt="Image card" data-aos="fade-left"
                                    data-aos-delay="400" data-aos-duration="1000"><img
                                    class="img-main img-fluid rounded-4" src="{{ asset('images/hero-4.jpg') }}"
                                    alt="Hero Image" data-aos="zoom-in" data-aos-delay="200"
                                    data-aos-duration="1200"></div>
                        </div>
                    </div>
                </div>
                <!-- End Hero-->
            </section>
            <!-- End Hero-->

            <!-- ======= Work  =======-->
            <section class="about__v4 section bg-light" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 order-md-2">
                            <div class="row justify-content-end">
                                <div class="col-md-11 mb-4 mb-md-0 text-center text-md-start"><span
                                        class="subtitle text-uppercase mb-3" data-aos="fade-left" data-aos-delay="0"
                                        data-aos-duration="800">My
                                        Approach</span>
                                    <h2 class="mb-4" data-aos="fade-left" data-aos-delay="100"
                                        data-aos-duration="1000">How I Work / My
                                        Approach</h2>
                                    <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000">
                                        <p>Every organisation is different, so I start by understanding where you are
                                            now, your funding mix, your challenges, and your goals for the future. From
                                            there, I work with you to build a clear and realistic plan to grow your
                                            income from trusts and foundations.</p>
                                    </div>
                                    <h4 class="small fw-bold mt-4 mb-3" data-aos="fade-left" data-aos-delay="300"
                                        data-aos-duration="1000">My
                                        approach focuses on:</h4>
                                    <ul class="list-unstyled text-start" data-aos="fade-left" data-aos-delay="400"
                                        data-aos-duration="1000">
                                        <li class="d-flex gap-3 mb-3">
                                            <span class="icon rounded-circle flex-shrink-0"><i
                                                    class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Reviewing your current funding and identifying
                                                opportunities for growth</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3">
                                            <span class="icon rounded-circle flex-shrink-0"><i
                                                    class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Creating a simple, practical strategy that supports
                                                multi-year funding and long-term sustainability</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3">
                                            <span class="icon rounded-circle flex-shrink-0"><i
                                                    class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Helping you build a manageable pipeline of potential
                                                funders</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3">
                                            <span class="icon rounded-circle flex-shrink-0"><i
                                                    class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Supporting you to write clear, convincing cases for
                                                support that funders connect with</span>
                                        </li>
                                        <li class="d-flex gap-3 mb-3">
                                            <span class="icon rounded-circle flex-shrink-0"><i
                                                    class="bi bi-check-circle-fill"
                                                    style="color: var(--bs-primary)"></i></span>
                                            <span class="text">Strengthening your trust fundraising skills and good
                                                practice for the future</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="img-wrap position-relative"><img class="img-fluid rounded-4"
                                    src="{{ asset('images/about-us.jpg') }}" alt="image placeholder"
                                    data-aos="fade-right" data-aos-delay="0" data-aos-duration="1000">
                                <div class="mission-statement p-4 rounded-4 d-flex gap-4" data-aos="flip-left"
                                    data-aos-delay="300" data-aos-duration="1000">
                                    <div class="mission-icon text-center rounded-circle"><i
                                            class="bi bi-lightbulb fs-4"></i></div>
                                    <div>
                                        <h3 class="text-uppercase fw-bold">Why Expertise Demands More Than Emotion</h3>
                                        <p class="fs-5 mb-0">Emotional learning may be quick, but what we consider as
                                            “expertise” usually takes a long time to develop.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Work -->

            <!-- ======= My Process =======-->
            <section class="section process__v1 bg-light" id="my-process">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <h2 class="mb-2" data-aos="fade-up" data-aos-delay="0" data-aos-duration="1000">My
                                Process</h2>
                            <p data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">This is how I usually
                                work with
                                clients, in a way that is structured, supportive, and focused on real results.</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Step 1 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0"
                            data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">1</span>
                                    <h3 class="fs-5 fw-bold mb-0">Understanding and Alignment</h3>
                                </div>
                                <p class="mb-0 text-muted">We start by getting clear on what you are funding and why it
                                    matters. I help you align your projects, outcomes, and impact so your priorities are
                                    easy to explain to funders.</p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100"
                            data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">2</span>
                                    <h3 class="fs-5 fw-bold mb-0">Research and Funder Mapping</h3>
                                </div>
                                <p class="mb-0 text-muted">Next, we look at who's out there. I help you build a strong,
                                    realistic pipeline of trusts and foundations that genuinely fit your work, not just
                                    a long list of names.</p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200"
                            data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">3</span>
                                    <h3 class="fs-5 fw-bold mb-0">Case for Support Development</h3>
                                </div>
                                <p class="mb-0 text-muted">Together, we shape your story into a clear and honest case
                                    for support that highlights your impact, evidence, and the difference funders can
                                    make by supporting you.</p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300"
                            data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">4</span>
                                    <h3 class="fs-5 fw-bold mb-0">Bid Writing and Submission</h3>
                                </div>
                                <p class="mb-0 text-muted">I then help you write, review, or refine your funding bids
                                    so your proposals are persuasive and reflect your organisation's voice and values.
                                </p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400"
                            data-aos-duration="800">
                            <div class="p-4 rounded-4 h-100 bg-white shadow border-0 position-relative">
                                <div class="d-flex align-items-center mb-4">
                                    <span
                                        class="badge bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 50px; height: 50px; font-size: 1.25rem; font-weight: bold;">5</span>
                                    <h3 class="fs-5 fw-bold mb-0">Relationship Building</h3>
                                </div>
                                <p class="mb-0 text-muted">Finally, I help you plan how to keep funders engaged through
                                    good communication and reporting that builds lasting trust.</p>
                            </div>
                        </div>

                        <!-- Visual Element -->
                        <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="500"
                            data-aos-duration="1000">
                            <div
                                class="p-4 rounded-4 h-100 bg-primary text-white d-flex flex-column justify-content-center">
                                <div class="text-center">
                                    <i class="bi bi-arrow-repeat fs-1 mb-3 d-block opacity-75"></i>
                                    <h4 class="fw-bold mb-3">Continuous Support</h4>
                                    <p class="mb-0">Every step is collaborative, flexible, and designed to build your
                                        confidence and capacity for long-term success.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End My Process -->

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
                                    Practical, strategic support to strengthen your trust fundraising and secure
                                    long-term
                                    income.
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
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Fundraising Strategy
                                        Development</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Developing clear, realistic fundraising strategies that support multi-year
                                        funding and long-term sustainability.
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
                                            <i class="bi bi-search"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Trust and Foundation
                                        Research</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Identifying the right funders for your work and building a strong, focused
                                        prospect pipeline.
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
                                            <i class="bi bi-pen"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Case for Support
                                        Writing</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Helping you explain your story and impact in a way that funders connect with and
                                        want to invest in.
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
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Grant and Bid Writing
                                    </h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Support with writing and refining high-quality funding bids, including
                                        multi-year and strategic applications.
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
                                            <i class="bi bi-people"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold mb-3" style="color: var(--bs-dark);">Funder Relationships
                                        and Stewardship</h3>
                                    <p class="text-muted mb-0 lh-lg" style="font-size: 0.95rem;">
                                        Guidance on maintaining good funder relationships, reporting well, and building
                                        ongoing support.
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
                                            <i class="bi bi-lightbulb"
                                                style="font-size: 2.5rem; color: var(--bs-primary);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-grow-1 pt-2">
                                    <h3 class="fs-4 fw-bold" style="color: var(--bs-dark); margin-bottom: 1.29rem;">
                                        Mentoring and Ongoing
                                        Support</h3>
                                    <p class="text-muted mb-4 lh-lg" style="font-size: 0.95rem;">
                                        Practical, one-to-one help to strengthen your fundraising skills and confidence
                                        over time.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Services-->

            <!-- ======= Blog =======-->
            <section class="section blog__v1" id="blog">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-8 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                                data-aos-delay="0">Insights</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">From the Fundraising Desk</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Practical tips, real-world lessons, and
                                strategies to help your charity grow sustainable income.</p>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-1-min.jpg') }}"
                                        alt="Building a strong funder pipeline">
                                </div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Sep 18, 2025</span><span><i
                                                class="bi bi-clock"></i> 4 min read</span></div>
                                    <h3 class="fs-5 mb-1">Build a Strong Funder Pipeline</h3>
                                    <p class="mb-2">Turn scattered prospects into a focused pipeline with clear
                                        qualification and engagement steps.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-3-min.jpg') }}" alt="Writing grants that win">
                                </div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Sep 7, 2025</span><span><i
                                                class="bi bi-clock"></i> 5 min read</span></div>
                                    <h3 class="fs-5 mb-1">Grant Writing that Wins</h3>
                                    <p class="mb-2">What funders look for: clarity, outcomes, evidence, and why your
                                        project truly matters.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-4-min.jpg') }}" alt="Diversifying income streams">
                                </div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Aug 29, 2025</span><span><i
                                                class="bi bi-clock"></i> 6 min read</span></div>
                                    <h3 class="fs-5 mb-1">Diversify Income, Reduce Risk</h3>
                                    <p class="mb-2">Practical ways to add new revenue streams without losing focus on
                                        your mission.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-10-min.jpg') }}"
                                        alt="Cultivating funder relationships">
                                </div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Aug 12, 2025</span><span><i
                                                class="bi bi-clock"></i> 4 min read</span></div>
                                    <h3 class="fs-5 mb-1">Cultivating Funder Relationships</h3>
                                    <p class="mb-2">From first contact to stewardship—simple steps to build trust and
                                        long-term support.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3"><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-11-min.jpg') }}" alt="Impact stories that convert">
                                </div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Jul 30, 2025</span><span><i
                                                class="bi bi-clock"></i> 5 min read</span></div>
                                    <h3 class="fs-5 mb-1">Impact Stories that Convert</h3>
                                    <p class="mb-2">Frame outcomes, evidence, and urgency to inspire action—from bids
                                        to newsletters.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                            <article
                                class="h-100 d-flex flex-column rounded-4 overflow-hidden border-0 shadow-sm bg-secondary-soft">
                                <div class="ratio ratio-4x3 "><img class="w-100 h-100 object-fit-cover"
                                        src="{{ asset('images/img-12-min.jpg') }}"
                                        alt="Trust fundraising readiness checklist"></div>
                                <div class="p-4 d-flex flex-column gap-2">
                                    <div class="d-flex align-items-center gap-3 small text-muted"><span><i
                                                class="bi bi-calendar2-event"></i> Jul 12, 2025</span><span><i
                                                class="bi bi-clock"></i> 6 min read</span></div>
                                    <h3 class="fs-5 mb-1">Trust Fundraising Readiness</h3>
                                    <p class="mb-2">A quick checklist to ensure your case for support is clear,
                                        evidenced, and funder-ready.</p>
                                    <a class="special-link d-inline-flex gap-2 align-items-center text-decoration-none"
                                        href="#"><span class="icons"><i
                                                class="icon-1 bi bi-arrow-right-short"></i><i
                                                class="icon-2 bi bi-arrow-right-short"></i></span><span>Read
                                            more</span></a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Blog -->

            <!-- ======= Testimonials =======-->
            <section class="section testimonials__v2" id="testimonials">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-lg-5 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                                data-aos-delay="0">Testimonials</span>
                            <h2 class="mb-3" data-aos="fade-up" data-aos-delay="100">What Our Supporters Say</h2>
                            <p data-aos="fade-up" data-aos-delay="200">Real Stories of Impact and Hope from Our
                                Community</p>
                        </div>
                    </div>

                    <div class="row g-4" data-masonry='{ "percentPosition": true }'>
                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="0">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;Thanks to this platform, I was able to support meaningful projects and see
                                    the tangible difference my contribution made in people's lives.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-2-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">John Davis</strong><span>Community
                                            Supporter</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;Being part of this fundraising platform made it easy to connect with causes I
                                    care about. The transparency and updates kept me motivated to keep
                                    supporting.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-1-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">Emily
                                            Smith</strong><span>Philanthropist</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;The projects featured here are inspiring. I love how the platform helps fund
                                    initiatives that create real change in local communities.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-5-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">Michael
                                            Rodriguez</strong><span>Volunteer</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;Supporting campaigns on this platform is simple and rewarding. I feel
                                    connected to the impact and see the results of my contributions.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-3-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">Sarah Lee</strong><span>Donor</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;The transparency and updates make me trust this platform. I’m proud to
                                    support campaigns that are making a real difference.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-7-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">James Kim</strong><span>Charity
                                            Enthusiast</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
                            <div class="testimonial rounded-4 p-4">
                                <blockquote class="mb-3">
                                    &ldquo;This platform empowers me to be part of meaningful projects. I love seeing
                                    the impact of my support and being part of a bigger mission.&rdquo;
                                </blockquote>
                                <div class="testimonial-author d-flex gap-3 align-items-center">
                                    <div class="author-img"><img class="rounded-circle img-fluid"
                                            src="{{ asset('images/person-sq-8-min.jpg') }}" alt="Supporter image">
                                    </div>
                                    <div class="lh-base"><strong class="d-block">Laura Brown</strong><span>Active
                                            Donor</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonials-->


            <!-- ======= FAQ =======-->
            <section class="section faq__v2" id="faq">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-md-6 col-lg-7 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-3" data-aos="fade-up"
                                data-aos-delay="0">FAQ</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Frequently Asked
                                Questions</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Answers to common questions about fundraising
                                strategy, income development, and building sustainable funding.</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 mx-auto" data-aos="fade-up" data-aos-delay="200">
                            <div class="faq-content">
                                <div class="accordion custom-accordion" id="accordionPanelsStayOpenExample">

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                What kind of fundraising support do you provide?
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse show" id="panelsStayOpen-collapseOne">
                                            <div class="accordion-body">
                                                I provide tailored support for charities, including developing income
                                                strategies, writing fundraising strategies, creating a pipeline of
                                                funders, and offering advice on building stronger relationships with
                                                funders.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                                aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                                How do you customise fundraising strategies for different organisations?
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseTwo">
                                            <div class="accordion-body">
                                                Every organisation is unique. I analyse your financial situation, goals,
                                                and needs to create a tailored income development plan that is specific
                                                to your charity and the areas of fundraising most relevant to you.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                                aria-controls="panelsStayOpen-collapseThree">
                                                Can you help diversify income streams for my charity?
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseThree">
                                            <div class="accordion-body">
                                                Yes. I specialise in helping organisations diversify their income
                                                streams to ensure financial stability and growth, giving you the
                                                resources needed to thrive and continue your mission.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                                aria-controls="panelsStayOpen-collapseFour">
                                                Do you provide ongoing support after the strategy is developed?
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFour">
                                            <div class="accordion-body">
                                                Absolutely. I provide ongoing guidance and support to help you implement
                                                your fundraising strategies effectively and maximise your income
                                                potential over time.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                                                aria-controls="panelsStayOpen-collapseFive">
                                                What makes your approach to fundraising different?
                                            </button>
                                        </h2>
                                        <div class="accordion-collapse collapse" id="panelsStayOpen-collapseFive">
                                            <div class="accordion-body">
                                                My approach is highly personalised and strategy-driven. I focus on
                                                understanding your organisation, identifying the best opportunities for
                                                funding, and building sustainable, long-term relationships with funders
                                                to ensure lasting impact.
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End FAQ-->
            </section>
            <!-- End FAQ-->


            <!-- ======= Contact =======-->
            <section class="section contact__v2" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                                data-aos="fade-up" data-aos-delay="0">Contact</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Contact Us</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Utilize our tools to develop your concepts and
                                bring your vision to life. Once complete, effortlessly share your creations.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex gap-5 flex-column">
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="0">
                                    <div class="icon d-block"><i class="bi bi-telephone"></i></div><span> <span
                                            class="d-block">Phone</span><strong>+(01 234 567 890)</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="icon d-block"><i class="bi bi-send"></i></div><span> <span
                                            class="d-block">Email</span><strong>info@mydomain.com</strong></span>
                                </div>
                                <div class="d-flex align-items-start gap-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="icon d-block"><i class="bi bi-geo-alt"></i></div><span> <span
                                            class="d-block">Address</span>
                                        <address class="fw-bold">123 Main Street Apt 4B Springfield, <br> IL 62701
                                            United States</address>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-wrapper" data-aos="fade-up" data-aos-delay="300">
                                <form id="contactForm">
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="name">Name</label>
                                            <input class="form-control" id="name" type="text" name="name"
                                                required="">
                                        </div>
                                        <div class="col-md-12">
                                            <label class="mb-2" for="email">Email</label>
                                            <input class="form-control" id="email" type="email" name="email"
                                                required="">
                                        </div>
                                    </div>
                                    <div class="row gap-3 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="subject">Subject</label>
                                            <input class="form-control" id="subject" type="text"
                                                name="subject">
                                        </div>
                                    </div>
                                    <div class="row gap-3 gap-md-0 mb-3">
                                        <div class="col-md-12">
                                            <label class="mb-2" for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required=""></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary fw-semibold" type="submit">Send Message</button>
                                </form>
                                <div class="mt-3 d-none alert alert-success" id="successMessage">Message sent
                                    successfully!</div>
                                <div class="mt-3 d-none alert alert-danger" id="errorMessage">Message sending failed.
                                    Please try again later.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->

            <!-- ======= Footer =======-->
            <footer class="footer pt-5 pb-5">
                <div class="container">
                    <div class="row mb-5 pb-4">
                        <div class="col-md-7">
                            <h2 class="fs-5">Join our newsletter</h2>
                            <p>Stay updated with our latest templates and offers—join our newsletter today!</p>
                        </div>
                        <div class="col-md-5">
                            <form class="d-flex gap-2">
                                <input class="form-control" type="email" placeholder="Email your email"
                                    required="">
                                <button class="btn btn-primary fs-6" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-between mb-5 g-xl-5">
                        <div class="col-md-4 mb-5 mb-lg-0">
                            <h3 class="mb-3">About</h3>
                            <p class="mb-4">Utilize our tools to develop your concepts and bring your vision to life.
                                Once complete, effortlessly share your creations.</p>
                        </div>
                        <div class="col-md-7">
                            <div class="row g-2">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Company</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-about.html">Leadership</a></li>
                                        <li><a href="page-careers.html">Careers <span class="badge ms-1">we're
                                                    hiring</span></a></li>
                                        <li><a href="page-case-studies.html">Case Studies</a></li>
                                        <li><a href="page-terms-conditions.html">Terms &amp; Conditions</a></li>
                                        <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="page-404.html">404 page</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <h3 class="mb-3">Accounts</h3>
                                    <ul class="list-unstyled">
                                        <li><a href="page-signup.html">Register</a></li>
                                        <li><a href="page-signin.html">Sign in</a></li>
                                        <li><a href="page-forgot-password.html">Fogot Password</a></li>
                                        <li><a href="page-coming-soon.html">Coming soon</a></li>
                                        <li><a href="page-portfolio-masonry.html">Portfolio Masonry</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 quick-contact">
                                    <h3 class="mb-3">Contact</h3>
                                    <p class="d-flex mb-3"><i class="bi bi-geo-alt-fill me-3"></i><span>123 Main
                                            Street Apt 4B Springfield, <br> IL 62701 United States</span></p><a
                                        class="d-flex mb-3" href="mailto:info@mydomain.com"><i
                                            class="bi bi-envelope-fill me-3"></i><span>info@mydomain.com</span></a><a
                                        class="d-flex mb-3" href="tel://+123456789900"><i
                                            class="bi bi-telephone-fill me-3"></i><span>+1 (234) 5678 9900</span></a><a
                                        class="d-flex mb-3" href="https://freebootstrap.net"><i
                                            class="bi bi-globe me-3"></i><span>FreeBootstrap.net</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row credits pt-3">
                        <div class="col-12 text-center">
                            <script>
                                document.write(new Date().getFullYear());
                            </script> John Field Fundraising Ltd: Company Number (England and Wales):
                            13040151
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer-->

        </main>
    </div>

    <!-- ======= Back to Top =======-->
    <button id="back-to-top"><i class="bi bi-arrow-up-short"></i></button>
    <!-- End Back to top-->

    <!-- ======= Javascripts =======-->
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/gsap/gsap.min.js') }}"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendors/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/aos/aos.js') }}"></script>
    <script src="{{ asset('vendors/purecounter/purecounter.js') }}"></script>
    <!-- Preloader Script -->
    <script src="{{ asset('js/preloader.js') }}"></script>
    <!-- Custom Scripts -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/send_email.js') }}"></script>
    <script>
        // Initialize AOS (Animate On Scroll) with sensible defaults
        if (window.AOS) {
            AOS.init({
                // values can be overridden on individual elements via data-aos-*
                duration: 900, // global animation duration in ms
                offset: 120, // offset (in px) from the original trigger point
                easing: 'ease-out-cubic',
                once: true, // whether animation should happen only once - while scrolling down
                mirror: false // whether elements should animate out while scrolling past them
            });
        }
    </script>
    <!-- End JavaScripts-->
</body>

</html>
