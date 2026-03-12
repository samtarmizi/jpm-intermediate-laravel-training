@push('styles')
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=dm-sans:400,500,600,700|outfit:600,700" rel="stylesheet" />
<link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
@endpush

@extends('layouts.app')

@section('content')
<div class="lp-root">
    {{-- Hero: system name and one-liner --}}
    <section class="lp-hero">
        <div class="lp-container">
            <span class="lp-hero__badge">About the system</span>
            <h1 class="lp-hero__title">{{ config('app.name') }}</h1>
            <p class="lp-hero__lead">
                A single place to publish and discover blogs, and to manage vehicles. Built for clarity and ease of use.
            </p>
            <div class="lp-hero__actions">
                <a href="{{ route('blogs.index') }}" class="lp-btn lp-btn--primary">Explore blogs</a>
                <a href="{{ route('vehicles.index') }}" class="lp-btn lp-btn--outline-light">View vehicles</a>
                @guest
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="lp-btn lp-btn--outline-light">Create account</a>
                    @endif
                @endguest
            </div>
        </div>
    </section>

    {{-- About the system --}}
    <section class="lp-section">
        <div class="lp-container">
            <div class="lp-about">
                <h2 class="lp-section__title">What this system does</h2>
                <p class="lp-about__text">
                    {{ config('app.name') }} brings together content and data in one application. You can read and write blog posts with search and filters, and keep a structured list of vehicles. Accounts let you create and manage your own content while staying in control of your data.
                </p>
            </div>
        </div>
    </section>

    {{-- Features: Blogs & Vehicles --}}
    <section class="lp-section lp-section--alt">
        <div class="lp-container">
            <header class="lp-section__header">
                <h2 class="lp-section__title">Main features</h2>
                <p class="lp-section__subtitle">Everything you need in one place</p>
            </header>
            <div class="lp-features">
                <a href="{{ route('blogs.index') }}" class="lp-feature">
                    <div class="lp-feature__icon lp-feature__icon--blog">📝</div>
                    <h3 class="lp-feature__title">Blogs</h3>
                    <p class="lp-feature__desc">Create, edit, and browse blog posts. Search by title or content and sort by date or title.</p>
                </a>
                <a href="{{ route('vehicles.index') }}" class="lp-feature">
                    <div class="lp-feature__icon lp-feature__icon--vehicle">🚗</div>
                    <h3 class="lp-feature__title">Vehicles</h3>
                    <p class="lp-feature__desc">Manage your vehicles in one list. Add, update, and organize entries with ease.</p>
                </a>
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section class="lp-section">
        <div class="lp-container">
            <header class="lp-section__header">
                <h2 class="lp-section__title">How it works</h2>
                <p class="lp-section__subtitle">Get started in a few steps</p>
            </header>
            <ol class="lp-steps" role="list">
                <li>
                    <span class="lp-steps__num" aria-hidden="true">1</span>
                    <p class="lp-steps__text">Create an account or log in to start creating content and managing vehicles.</p>
                </li>
                <li>
                    <span class="lp-steps__num" aria-hidden="true">2</span>
                    <p class="lp-steps__text">Use the Blogs section to publish posts, search, and read what others have shared.</p>
                </li>
                <li>
                    <span class="lp-steps__num" aria-hidden="true">3</span>
                    <p class="lp-steps__text">Use the Vehicles section to add and maintain your vehicle records.</p>
                </li>
            </ol>
        </div>
    </section>

    {{-- CTA --}}
    <section class="lp-cta">
        <div class="lp-container">
            <h2 class="lp-cta__title">Ready to use {{ config('app.name') }}?</h2>
            <p class="lp-cta__sub">Sign in or register to get started.</p>
            <div class="lp-cta__actions">
                @guest
                    <a href="{{ route('login') }}" class="lp-btn lp-btn--outline-light">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="lp-btn lp-btn--primary">Sign up</a>
                    @endif
                @else
                    <a href="{{ route('home') }}" class="lp-btn lp-btn--primary">Go to dashboard</a>
                @endguest
            </div>
        </div>
    </section>
</div>
@endsection
