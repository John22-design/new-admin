{{--
/**
 * Modern Preloader Component - Redesigned 2025
 * 
 * Purpose: Stunning, animated page loading indicator
 * 
 * Features:
 * - Gradient background with animation
 * - Smooth progress tracking with percentage
 * - Glass morphism design
 * - Particle effects
 * - Responsive and accessible
 * 
 * Integration:
 * 1. Add to layout: @include('components.preloader')
 * 2. Component syntax: <x-preloader />
 * 3. Assets required:
 *    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">
 *    <script src="{{ asset('js/preloader.js') }}" defer></script>
 * 
 * @param bool $disabled - Disable preloader for this page (default: false)
 * @param bool $particles - Enable particle effects (default: true)
 */
--}}

@php
    $disabled = $disabled ?? false;
    $particles = $particles ?? true;
@endphp

@unless ($disabled)
    <div id="app-preloader" class="preloader preloader--gradient" role="status" aria-live="polite" aria-label="Loading content"
        data-variant="progress">
        {{-- Background Particles --}}
        @if ($particles)
            <div class="preloader__particles">
                @for ($i = 0; $i < 20; $i++)
                    <div class="preloader__particle"></div>
                @endfor
            </div>
        @endif

        {{-- Main Content Container --}}
        <div class="preloader__content">

            {{-- Logo Section --}}
            <div class="preloader__logo-container">
                <div class="preloader__logo-wrapper">
                    <img src="{{ asset('images/navbar_logo.png') }}" alt="Logo" class="preloader__logo-img">

                    {{-- Animated Ring Around Logo --}}
                    <div class="preloader__logo-ring"></div>
                    <div class="preloader__logo-ring preloader__logo-ring--delayed"></div>
                </div>
            </div>

            {{-- Progress Bar --}}
            <div class="preloader__progress-wrapper">
                {{-- Glass Card Container --}}
                <div class="preloader__glass-card">
                    {{-- Progress Bar --}}
                    <div class="preloader__progress-track">
                        <div class="preloader__progress-fill" id="preloader-progress-fill">
                            <div class="preloader__progress-glow"></div>
                        </div>
                    </div>

                    {{-- Status Section --}}
                    <div class="preloader__status-row">
                        <p class="preloader__status-text" id="preloader-status">Initializing...</p>
                        <span class="preloader__percentage" id="preloader-percentage">0%</span>
                    </div>
                </div>
            </div>

            {{-- Loading Dots --}}
            <div class="preloader__dots">
                <span class="preloader__dot"></span>
                <span class="preloader__dot"></span>
                <span class="preloader__dot"></span>
            </div>
        </div>

        {{-- Screen reader announcement --}}
        <span class="visually-hidden" aria-live="assertive" id="preloader-sr-text">
            Loading content, please wait...
        </span>
    </div>

@endunless

{{-- 
═══════════════════════════════════════════════════════════
Usage Examples
═══════════════════════════════════════════════════════════

1. Default usage (Gradient + Progress):
   <x-preloader />

2. Without particles:
   <x-preloader :particles="false" />

3. In Blade layout (resources/views/layouts/app.blade.php):
   @include('components.preloader')

4. Disable for specific page:
   <x-preloader :disabled="true" />

--}}

{{-- 
Usage Examples:

1. Basic usage in layout (resources/views/layouts/app.blade.php):
   @include('components.preloader')

2. Component with options:
   <x-preloader theme="dark" :lottie="false" variant="spinner" />

3. Progress bar variant:
   <x-preloader variant="progress" theme="light" />

4. Disable on specific page:
   <x-preloader :disabled="true" />

5. With Lottie animation:
   <x-preloader :lottie="true" theme="dark" />

6. Programmatic control (in your JS):
   Preloader.show();
   Preloader.hide();
   Preloader.setProgress(50); // Set progress to 50%

--}}
