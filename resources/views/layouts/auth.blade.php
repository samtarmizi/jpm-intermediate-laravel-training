<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('Login')) – {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:600,700" rel="stylesheet" />
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet" />
    @stack('styles')
</head>
<body class="auth-page">
    <div class="auth-page__inner">
        <div class="auth-panel auth-panel--brand">
            <a href="{{ url('/') }}" class="auth-brand">
                <span class="auth-brand__name">{{ config('app.name') }}</span>
                <span class="auth-brand__tagline">Blogs & vehicles in one place</span>
            </a>
            <div class="auth-panel__visual">
                <div class="auth-visual" aria-hidden="true">
                    <span class="auth-visual__dot auth-visual__dot--1"></span>
                    <span class="auth-visual__dot auth-visual__dot--2"></span>
                    <span class="auth-visual__dot auth-visual__dot--3"></span>
                    <span class="auth-visual__line auth-visual__line--1"></span>
                    <span class="auth-visual__line auth-visual__line--2"></span>
                </div>
            </div>
        </div>
        <div class="auth-panel auth-panel--form">
            <div class="auth-form-wrap">
                @yield('content')
            </div>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
