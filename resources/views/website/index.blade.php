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
                <a class="navbar-brand w-auto" href="#home">
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
                            <li class="nav-item"><a class="nav-link scroll-link" href="#services">Services</a></li>
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
                                            href="{{ route('blog') }}">Learn More
                                            <svg class="lucide lucide-arrow-up-right"
                                                xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M7 7h10v10"></path>
                                                <path d="M7 17 17 7"></path>
                                            </svg></a></div>
                                    <div class="hero-highlight d-inline-flex align-items-center gap-3 px-4 py-3 rounded-pill bg-white border shadow-sm mb-3"
                                        data-aos="fade-right" data-aos-delay="400" data-aos-duration="1000">
                                        <span
                                            class="d-inline-flex align-items-center justify-content-center rounded-circle"
                                            style="height: 44px; width: 44px; background-color: rgba(var(--bs-primary-rgb), 0.12);">
                                            <i class="bi bi-lightning-charge-fill text-primary fs-5"></i>
                                        </span>
                                        <div class="d-flex flex-column">
                                            <span class="fw-semibold text-uppercase small text-primary">John Field
                                                Fundraising Ltd</span>
                                            <span class="text-muted small">Trusted partner for strategic trust
                                                fundraising.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero-img"><img class="img-card img-fluid border-white"
                                    src="{{ asset('images/hero-3.jpg') }}" style="border: 2px white solid"
                                    alt="Image card" data-aos="fade-left" data-aos-delay="400"
                                    data-aos-duration="1000"><img class="img-main img-fluid rounded-4"
                                    src="{{ asset('images/hero-4.jpg') }}" alt="Hero Image" data-aos="zoom-in"
                                    data-aos-delay="200" data-aos-duration="1200"></div>
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

            {{-- ======= Blog ======= --}}
            {{-- <section class="section blog__v1" id="blog">
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
            </section> --}}
            {{-- End Blog ======= --}}

            {{-- ======= Testimonials =======
            <section class="section testimonials__v2 py-4" id="testimonials">
                <div class="container">
                    <div class="row mb-4">
                        <div class="col-lg-5 mx-auto text-center">
                            <span class="subtitle text-uppercase mb-2" data-aos="fade-up"
                                data-aos-delay="0">Testimonials</span>
                            <h2 class="mb-2" data-aos="fade-up" data-aos-delay="100">What Our Supporters Say</h2>
                            <p data-aos="fade-up" data-aos-delay="200" class="mb-0">Real Stories of Impact and Hope
                            </p>
                        </div>
                    </div>

                    <div class="swiper testimonial-slider pb-4">
                        <div class="swiper-wrapper">
                            @foreach ($testimonials as $testimonial)
                                <div class="swiper-slide h-auto">
                                    <div
                                        class="testimonial-card h-100 p-4 bg-light rounded-4 border position-relative overflow-hidden">
                                        <div class="d-flex flex-column h-100 position-relative z-1">
                                            <div class="mb-3">
                                                <blockquote class="fs-6 text-dark lh-base mb-0">
                                                    "{{ $testimonial->comment }}"
                                                </blockquote>
                                            </div>

                                            <div
                                                class="mt-auto d-flex align-items-center gap-3 pt-3 border-top border-secondary-subtle">
                                                <div class="flex-shrink-0">
                                                    <img class="rounded-circle object-fit-cover border border-2 border-white shadow-sm"
                                                        src="{{ $testimonial->profile_image ? asset('storage/' . $testimonial->profile_image) : asset('images/profile.png') }}"
                                                        alt="{{ $testimonial->customer_name }}"
                                                        style="width: 50px; height: 50px;">
                                                </div>
                                                <div>
                                                    <h6 class="fw-bold mb-0 text-dark">
                                                        {{ $testimonial->customer_name }}</h6>
                                                    <p class="text-muted small mb-0 text-uppercase ls-1"
                                                        style="font-size: 0.75rem;">{{ $testimonial->profession }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination position-relative mt-4"></div>
                    </div>
                </div>
            </section>
            End Testimonials ======= --}}


            <!-- ======= FAQ =======-->
            <section class="section faq__v2 bg-light" id="faq">
                <div class="container py-5">
                    <!-- Header -->
                    <div class="row mb-5">
                        <div class="col-lg-8 mx-auto text-center">
                            <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 mb-3"
                                data-aos="fade-up" data-aos-delay="0">
                                <i class="bi bi-question-circle me-2"></i>FAQ
                            </span>
                            <h2 class="display-5 fw-bold mb-3" data-aos="fade-up" data-aos-delay="100">
                                Frequently Asked Questions
                            </h2>
                            <p class="lead text-muted" data-aos="fade-up" data-aos-delay="200">
                                Answers to common questions about fundraising strategy, income development, and building
                                sustainable funding.
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
                                            <span class="fw-semibold">What kind of fundraising support do you
                                                provide?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse show" id="faq-1"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            I work with charities to strengthen their trust fundraising and income
                                            development. This includes developing practical fundraising strategies,
                                            helping you identify and build a realistic funder pipeline, writing or
                                            reviewing funding bids and providing hands-on advice to grow your
                                            funding confidence and skills.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 2 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-2"
                                            aria-expanded="false" aria-controls="faq-2">
                                            <i class="bi bi-pencil-square text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Do you only work on strategies or can you help
                                                with actual bid writing too?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-2"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Both. Some clients need a full fundraising strategy, while others need
                                            support writing specific cases for support or funding bids. I can help
                                            with whatever stage you are at, from planning your approach to crafting
                                            the applications themselves.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 3 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-3"
                                            aria-expanded="false" aria-controls="faq-3">
                                            <i class="bi bi-gear text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">How do you tailor your support to different
                                                organisations?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-3"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Every organisation is unique, with different challenges, goals and
                                            capacity. I start by listening and understanding your work, your current
                                            funding mix and where you want to get to. From there, I design a
                                            practical plan that suits your size, resources and ambitions without a
                                            one size fits all approach.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 4 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-4"
                                            aria-expanded="false" aria-controls="faq-4">
                                            <i class="bi bi-people text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Can you help us find and approach new
                                                funders?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-4"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Yes. I can help you identify new funders who genuinely align with your
                                            mission and create a focused prospect list. I also advise on how to
                                            approach funders, what to include in your communications and how to
                                            build stronger long-term relationships.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 5 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-5"
                                            aria-expanded="false" aria-controls="faq-5">
                                            <i class="bi bi-building text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">What kind of organisations do you usually work
                                                with?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-5"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Most of my work is with small to medium-sized charities, community
                                            organisations and social enterprises. I also support larger
                                            organisations that want to strengthen their trust fundraising or refresh
                                            their approach to strategy and funder engagement.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 6 -->
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-6"
                                            aria-expanded="false" aria-controls="faq-6">
                                            <i class="bi bi-arrow-repeat text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">Do you provide ongoing support after the strategy
                                                is developed?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-6"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            Yes. Fundraising takes time and consistency. I offer mentoring and
                                            follow up support to help you put the strategy into action, strengthen
                                            your pipeline and stay on track with your fundraising goals.
                                        </div>
                                    </div>
                                </div>

                                <!-- FAQ Item 7 -->
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-white py-4 shadow-none"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq-7"
                                            aria-expanded="false" aria-controls="faq-7">
                                            <i class="bi bi-star text-primary me-3 fs-5"></i>
                                            <span class="fw-semibold">What makes your approach different?</span>
                                        </button>
                                    </h2>
                                    <div class="accordion-collapse collapse" id="faq-7"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body ps-5 text-muted">
                                            I keep things simple, strategic and realistic. My focus is on helping
                                            you build confidence, develop good fundraising practice and secure
                                            long-term sustainable funding rather than short-term wins.
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Additional Help CTA -->
                            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="400">
                                <div class="card border-0 shadow-sm bg-primary bg-opacity-10">
                                    <div class="card-body py-4">
                                        <h5 class="fw-bold mb-2">Still have questions?</h5>
                                        <p class="text-muted mb-3">Can't find the answer you're looking for? Please get
                                            in touch with us.</p>
                                        <a href="#contact" class="btn btn-primary px-4">
                                            <i class="bi bi-envelope me-2"></i>Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End FAQ-->


            <!-- ======= Contact =======-->
            <section class="section contact__v2 bg-secondary-soft" id="contact">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-6 col-lg-7 mx-auto text-center"><span class="subtitle text-uppercase mb-3"
                                data-aos="fade-up" data-aos-delay="0">Contact</span>
                            <h2 class="h2 fw-bold mb-3" data-aos="fade-up" data-aos-delay="0">Contact Us</h2>
                            <p data-aos="fade-up" data-aos-delay="100">Utilize our tools to develop your concepts and
                                bring your vision to life. Once complete, effortlessly share your creations.</p>
                        </div>
                    </div>
                    <div class="row g-4 align-items-stretch">
                        <div class="col-lg-5">
                            <div class="h-100 rounded-4 border shadow-sm bg-white p-4 p-lg-5 d-flex flex-column"
                                data-aos="fade-up" data-aos-delay="0">
                                <span
                                    class="text-uppercase small text-primary fw-semibold d-inline-flex align-items-center gap-2">
                                    <i class="bi bi-stars"></i>
                                    Let's collaborate
                                </span>
                                <h3 class="mt-3 mb-3">Share your fundraising goals</h3>
                                <p class="text-muted mb-4">Tell me where you want to take your trust fundraising and
                                    I'll recommend the right next steps—whether you need a roadmap, a partner, or a
                                    second pair of eyes.</p>

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
                                        <span>Designed for charity leaders and in-house fundraisers.</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-wrapper rounded-4 border shadow-sm bg-white p-4 p-lg-5"
                                data-aos="fade-up" data-aos-delay="150">
                                <h3 class="h4 mb-3">Send a message</h3>
                                <p class="text-muted small mb-4">Outline your challenge or idea and I'll be in touch
                                    with a tailored response.</p>
                                <form id="contactForm" class="d-flex flex-column gap-3">
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
                                        <input class="form-control" id="subject" type="text" name="subject"
                                            required maxlength="500">
                                    </div>
                                    <div>
                                        <label class="mb-2" for="message">Message <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required maxlength="5000"
                                            placeholder="Tell us about your fundraising goals and how we can help..."></textarea>
                                        <small class="text-muted">Maximum 5000 characters</small>
                                    </div>
                                    <!-- Honeypot field for spam protection (hidden from users) -->
                                    <input type="text" name="honeypot" style="display:none" tabindex="-1"
                                        autocomplete="off">

                                    <button class="btn btn-primary fw-semibold align-self-end" type="submit"
                                        id="submitBtn">
                                        <i class="bi bi-send me-2"></i>
                                        <span id="submitText">Send Message</span>
                                    </button>
                                </form>
                                <div class="mt-3 d-none alert alert-success" id="successMessage">
                                    <i class="bi bi-check-circle-fill me-2"></i>
                                    <span id="successText">Thank you for your message! We'll get back to you within 2
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
            <!-- End Contact-->

            <!-- ======= Footer =======-->
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
                            <a class="btn btn-primary text-white" href="#contact">Start a conversation</a>
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
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="bi bi-check-circle text-primary"></i>
                                        <span>Trust fundraising strategy</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="bi bi-check-circle text-primary"></i>
                                        <span>Prospect research &amp; pipeline design</span>
                                    </li>
                                    <li class="d-flex align-items-start gap-2">
                                        <i class="bi bi-check-circle text-primary"></i>
                                        <span>Bid writing, mentoring &amp; reviews</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="h-100 p-4 bg-white border rounded-4 shadow-sm text-center text-md-start">
                                <h3 class="fs-6 text-uppercase text-muted mb-2">Highlights</h3>
                                <div class="d-flex flex-column gap-2 text-muted small">
                                    <div>
                                        <span class="d-block fw-semibold text-dark">32 charities</span>
                                        <small>Supported with strategy and bids in 2025.</small>
                                    </div>
                                    <div>
                                        <span class="d-block fw-semibold text-dark">£450k award</span>
                                        <small>Largest multi-year funding secured this year.</small>
                                    </div>
                                    <div>
                                        <span class="d-block fw-semibold text-dark">95% retention</span>
                                        <small>Clients returning for ongoing fundraising support.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-center text-muted small mt-5 pt-3 border-top">
                        <script>
                            document.write(new Date().getFullYear());
                        </script> John Field Fundraising Ltd · Company Number 13040151
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

        // Initialize Testimonial Swiper
        var testimonialSwiper = new Swiper(".testimonial-slider", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                1200: {
                    slidesPerView: 3,
                },
            },
        });
    </script>
    <!-- End JavaScripts-->
</body>

</html>
