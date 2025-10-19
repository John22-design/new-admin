@extends('layouts/blankLayout')

@section('title', 'Login')

@section('page-style')
    @vite(['resources/assets/vendor/scss/pages/page-auth.scss'])
    <style>
        /* Enhanced auth styles - optimized for performance */
        .auth-enhanced-wrapper {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }

        .auth-enhanced-wrapper::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -150px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        .auth-enhanced-wrapper::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -100px;
            left: -50px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(20px);
            }
        }

        .auth-card-enhanced {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .auth-card-enhanced:hover {
            transform: translateY(-5px);
        }

        .form-control-enhanced {
            border: 2px solid #e0e6ed;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control-enhanced:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .form-control-enhanced:hover {
            border-color: #cbd5e0;
        }

        .btn-enhanced {
            border-radius: 10px;
            padding: 14px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn-enhanced::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }

        .btn-enhanced:hover::before {
            left: 100%;
        }

        .btn-enhanced:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .password-toggle-icon {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle-icon:hover {
            color: #667eea;
        }

        .alert-enhanced {
            border-radius: 10px;
            border: none;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label-enhanced {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon>i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            z-index: 10;
            pointer-events: none;
        }

        .input-icon>.form-control-enhanced {
            padding-left: 45px;
        }

        .input-icon .input-group {
            position: relative;
        }

        .input-icon .input-group .form-control-enhanced {
            border-right: none;
        }

        .input-icon .input-group .form-control-enhanced:focus {
            border-right: none;
        }

        .input-icon .input-group .input-group-text {
            border-left: none;
            transition: all 0.3s ease;
        }

        .input-icon .input-group:hover .input-group-text,
        .input-icon .input-group .form-control-enhanced:focus~.input-group-text {
            border-color: #667eea;
        }

        .input-icon .input-group:hover .form-control-enhanced {
            border-color: #cbd5e0;
        }

        .remember-checkbox {
            accent-color: #667eea;
        }

        .app-brand-enhanced {
            margin-bottom: 2rem;
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection

@section('content')
    <div class="auth-enhanced-wrapper">
        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner">
                    <div class="card auth-card-enhanced px-sm-6 px-4">
                        <div class="card-body py-5">
                            <!-- Logo -->
                            <div class="app-brand app-brand-enhanced justify-content-center">
                                <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                    <span class="app-brand-logo demo">@include('_partials.macros', [
                                        'width' => 40,
                                        'withbg' => 'linear-gradient(135deg, #667eea 0%, #764ba2 100%)',
                                    ])</span>
                                    <span
                                        class="app-brand-text demo text-heading fw-bold">{{ config('variables.templateName') }}</span>
                                </a>
                            </div>
                            <!-- /Logo -->
                            <h4 class="mb-2 text-center fw-bold" style="color: #2d3748;">Welcome Back!</h4>
                            <p class="mb-4 text-center" style="color: #718096; font-size: 14px;">Sign in to continue to your
                                account</p>

                            @if ($errors->any())
                                <div class="alert alert-danger alert-enhanced">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success alert-enhanced">
                                    <i class="bx bx-check-circle me-2"></i>{{ session('success') }}
                                </div>
                            @endif

                            <form id="formAuthentication" class="mb-4" action="{{ route('auth-login-submit') }}"
                                method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="email" class="form-label form-label-enhanced">Email or Username</label>
                                    <div class="input-icon">
                                        <i class="bx bx-user"></i>
                                        <input type="text"
                                            class="form-control form-control-enhanced @error('email-username') is-invalid @enderror"
                                            id="email" name="email-username" placeholder="Enter your email or username"
                                            value="{{ old('email-username') }}" autofocus>
                                    </div>
                                    @error('email-username')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4 form-password-toggle">
                                    <label class="form-label form-label-enhanced" for="password">Password</label>
                                    <div class="input-icon">
                                        <i class="bx bx-lock-alt"></i>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password"
                                                class="form-control form-control-enhanced @error('password') is-invalid @enderror"
                                                name="password" placeholder="Enter your password"
                                                aria-describedby="password"
                                                style="padding-left: 45px; border-radius: 10px 0 0 10px !important;" />
                                            <span class="input-group-text password-toggle-icon"
                                                style="border-radius: 0 10px 10px 0; border: 2px solid #e0e6ed; border-left: none; background: transparent;">
                                                <i class="bx bx-hide"></i>
                                            </span>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input remember-checkbox" type="checkbox"
                                                id="remember-me">
                                            <label class="form-check-label" for="remember-me"
                                                style="font-size: 14px; color: #4a5568;">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button class="btn btn-primary btn-enhanced d-grid w-100" type="submit">
                                        <span>Sign In</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
