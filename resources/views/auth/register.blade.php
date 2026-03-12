@extends('layouts.auth')

@section('title', __('Register'))

@section('content')
<div class="auth-card">
    <h1 class="auth-card__title">{{ __('Register') }}</h1>
    <p class="auth-card__subtitle">Create an account to start writing blogs and managing vehicles.</p>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div class="auth-form__group">
            <label for="name" class="auth-form__label">{{ __('Name') }}</label>
            <input id="name" type="text" class="auth-form__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your name">
            @error('name')
                <span class="auth-form__error" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-form__group">
            <label for="email" class="auth-form__label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="auth-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="you@example.com">
            @error('email')
                <span class="auth-form__error" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-form__group">
            <label for="password" class="auth-form__label">{{ __('Password') }}</label>
            <input id="password" type="password" class="auth-form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
            @error('password')
                <span class="auth-form__error" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-form__group">
            <label for="password-confirm" class="auth-form__label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="auth-form__input" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
        </div>

        <button type="submit" class="auth-form__submit">{{ __('Register') }}</button>
    </form>

    <div class="auth-card__footer">
        <p class="auth-card__footer-text">Already have an account? <a href="{{ route('login') }}" class="auth-card__footer-link">{{ __('Log in') }}</a></p>
    </div>
</div>
@endsection
