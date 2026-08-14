<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} · John Field Fundraising</title>
    <meta name="description" content="{{ $post->excerpt }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    <!-- Google Font -->
    <link class="font-pre" rel="preconnect" href="https://fonts.googleapis.com">
    <link class="font-pre" rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet"></noscript>

    <!-- Preload LCP Image -->
    @if ($post->featured_image)
        <link rel="preload" href="{{ asset('storage/' . $post->featured_image) }}" as="image">
    @endif

    @php
        $isMobile = preg_match('/Mobile|Android|iP(hone|od|ad)|IEMobile|BlackBerry|Kindle|NetFront|Silk-Accelerated|(hpw|web)OS|Fennec|Minimo|Opera M(obi|ini)|Blazer|Dolfin|Dolphin|Skyfire|Zune/', request()->userAgent());
    @endphp

    <!-- Critical CSS Styles -->
    <link href="{{ asset('vendors/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    @vite(['resources/css/style.css'])
    @if(!$isMobile)
    <link href="{{ asset('css/preloader.css') }}" rel="stylesheet">
    @endif

    <!-- Non-critical Styles (Deferred for Performance) -->
    <link rel="preload" href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="{{ asset('vendors/bootstrap-icons/font/bootstrap-icons.min.css') }}" rel="stylesheet"></noscript>

    <script>
        (function() {
            const storedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', storedTheme);
        })();
    </script>
    <style>
        .blog-single-header {
            background: linear-gradient(135deg, rgba(var(--bs-primary-rgb), 0.08) 0%, rgba(var(--bs-primary-rgb), 0.02) 100%);
            border-bottom: 1px solid rgba(var(--bs-primary-rgb), 0.15);
        }

        .blog-content {
            font-size: 1.0625rem;
            line-height: 1.8;
            color: var(--bs-body-color);
        }

        .blog-content h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-top: 2.5rem;
            margin-bottom: 1.25rem;
            color: var(--bs-emphasis-color);
        }

        .blog-content h3 {
            font-size: 1.375rem;
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: var(--bs-emphasis-color);
        }

        .blog-content p {
            margin-bottom: 1.5rem;
        }

        .blog-content ul,
        .blog-content ol {
            margin-bottom: 1.5rem;
            padding-left: 1.5rem;
        }

        .blog-content li {
            margin-bottom: 0.75rem;
        }

        .blog-content blockquote {
            border-left: 4px solid var(--bs-primary);
            background-color: rgba(var(--bs-primary-rgb), 0.05);
            padding: 1.25rem 1.5rem;
            margin: 2rem 0;
            border-radius: 0.5rem;
            font-style: italic;
        }

        .blog-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.75rem;
            margin: 2rem 0;
        }

        .blog-content code {
            background-color: rgba(var(--bs-primary-rgb), 0.08);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.9em;
        }

        .featured-image {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        .share-buttons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 1px solid rgba(var(--bs-primary-rgb), 0.25);
            color: var(--bs-primary);
            transition: all 0.2s ease;
        }

        .share-buttons a:hover {
            background-color: var(--bs-primary);
            color: white;
            transform: translateY(-2px);
        }

        .related-card {
            transition: transform .18s ease, box-shadow .18s ease;
            border: 1px solid rgba(var(--bs-primary-rgb), 0.15);
            border-radius: 0.75rem;
        }

        .related-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .08);
        }
    </style>
</head>

<body>
    <x-preloader :disabled="$isMobile" theme="gradient" variant="progress" />

    <div class="site-wrap">
        <!-- Header -->
        <header class="fbs__net-navbar navbar navbar-expand-lg dark" aria-label="navbar">
            <div class="container d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <a class="navbar-brand w-auto" href="{{ route('home') }}#home">
                    <img class="logo dark img-fluid" src="{{ asset('images/navbar_logo.png') }}" alt="logo"
                        width="80" height="40"
                        style="height:40px; width:auto; max-width:160px; border-radius:3px;">
                </a>

                <!-- Offcanvas -->
                <div class="offcanvas offcanvas-start w-75" id="fbs__net-navbars" tabindex="-1"
                    aria-labelledby="fbs__net-navbarsLabel">
                    <div class="offcanvas-header">
                        <div class="offcanvas-header-logo">
                            <a class="logo-link" id="fbs__net-navbarsLabel" href="{{ route('home') }}">
                                <img class="logo dark img-fluid"
                                    width="80" height="40"
                                    style="height:40px; width:auto; max-width:160px; border-radius:3px;"
                                    src="{{ asset('images/navbar_logo.png') }}" alt="logo">
                            </a>
                        </div>
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
            <!-- Breadcrumb -->
            <section class="blog-single-header py-4 bg-light border-bottom" style="margin-top: 70px;">
                <div class="container">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 bg-transparent">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}"
                                    class="text-decoration-none d-flex align-items-center gap-1">
                                    <i class="bi bi-house-door"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('blog') }}"
                                    class="text-decoration-none d-flex align-items-center gap-1">
                                    <i class="bi bi-journal-text"></i>
                                    <span>Blog</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active d-flex align-items-center" aria-current="page">
                                <span class="text-truncate">{{ $post->title }}</span>
                            </li>
                        </ol>
                    </nav>
                </div>
            </section>

            <!-- Blog Post -->
            <article class="pb-5 pt-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            <!-- Post Header -->
                            <div class="mb-4">
                                <div class="d-flex align-items-center gap-3 text-muted mb-3">
                                    <span><i class="bi bi-calendar2-event"></i> {{ $post->formatted_date }}</span>
                                    @if ($post->category)
                                        <span
                                            class="badge bg-primary bg-opacity-10 text-primary">{{ $post->category }}</span>
                                    @endif
                                </div>
                                <h1 class="display-5 fw-bold mb-3">{{ $post->title }}</h1>
                                @if ($post->excerpt)
                                    <p class="lead text-muted">{{ $post->excerpt }}</p>
                                @endif
                            </div>

                            <!-- Featured Image -->
                            @if ($post->featured_image)
                                <div class="featured-image mb-5">
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" class="w-100"
                                        alt="{{ $post->title }}">
                                </div>
                            @endif

                            <!-- Share Buttons -->
                            <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                                <span class="text-muted small">Share this article:</span>
                                <div class="share-buttons d-flex gap-2">
                                    <a href="#" title="Share on LinkedIn" aria-label="Share on LinkedIn">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                    <a href="#" title="Share on Twitter" aria-label="Share on Twitter">
                                        <i class="bi bi-twitter-x"></i>
                                    </a>
                                    <a href="#" title="Share on Facebook" aria-label="Share on Facebook">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" title="Copy link" aria-label="Copy link">
                                        <i class="bi bi-link-45deg"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Blog Content -->
                            <div class="blog-content">
                                {!! $post->content !!}
                            </div>

                            <!-- Author Bio -->
                            <div class="mt-5 pt-5 border-top">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="flex-shrink-0">
                                        <div class="bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center"
                                            style="width: 80px; height: 80px;">
                                            <i class="bi bi-person-circle text-primary" style="font-size: 3rem;"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h3 class="h5 mb-2">John Field</h3>
                                        <p class="text-muted mb-3">John Field is a fundraising consultant specializing
                                            in trust and foundation income. With over a decade of experience, he helps
                                            charities across the UK build sustainable fundraising strategies and develop
                                            strong funder relationships.</p>
                                        <a href="https://www.linkedin.com/in/johnfieldfundraising/" target="_blank"
                                            rel="noopener" class="text-decoration-none">
                                            <i class="bi bi-linkedin"></i> Connect on LinkedIn
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Articles -->
            <section class="py-5 bg-light border-top">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10 col-xl-8">
                            @if ($relatedPosts->count() > 0)
                                <h2 class="h3 mb-4">Related Articles</h2>
                                <div class="row g-4">
                                    @foreach ($relatedPosts as $relatedPost)
                                        <div class="col-md-6">
                                            <div class="card h-100 border-0 shadow-sm related-card">
                                                <div style="height: 160px;">
                                                    <img src="{{ $relatedPost->featured_image ? asset('storage/' . $relatedPost->featured_image) : asset('images/img-1-min.webp') }}"
                                                        class="w-100 h-100 object-fit-cover"
                                                        width="600" height="400"
                                                        alt="{{ $relatedPost->title }}">
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center gap-2 small text-muted mb-2">
                                                        <span><i class="bi bi-calendar2-event"></i>
                                                            {{ $relatedPost->short_date }}</span>
                                                        @if ($relatedPost->category)
                                                            <span
                                                                class="badge bg-primary bg-opacity-10 text-primary">{{ $relatedPost->category }}</span>
                                                        @endif
                                                    </div>
                                                    <h3 class="h6 card-title">{{ $relatedPost->title }}</h3>
                                                    <p class="card-text text-muted small mb-0">
                                                        {{ Str::limit($relatedPost->excerpt, 100) }}</p>
                                                    <a href="{{ route('blog.single', $relatedPost->slug) }}"
                                                        class="stretched-link"></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div class="text-center mt-4">
                                <a href="{{ route('blog') }}" class="btn btn-outline-primary">View all articles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

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
    <script src="{{ asset('vendors/bootstrap/bootstrap.bundle.min.js') }}" defer></script>
    @if(!$isMobile)
    <script src="{{ asset('js/preloader.js') }}" defer></script>
    @endif
    <script src="{{ asset('js/custom.js') }}" defer></script>
</body>

</html>
