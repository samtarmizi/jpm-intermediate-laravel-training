@extends('layouts.auth')

@section('title', __('Login'))

@section('content')
<div class="auth-card">
    <h1 class="auth-card__title">{{ __('Login') }}</h1>
    <p class="auth-card__subtitle">Sign in to your account to continue.</p>

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div class="auth-form__group">
            <label for="email" class="auth-form__label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="auth-form__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="you@example.com">
            @error('email')
                <span class="auth-form__error" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-form__group">
            <label for="password" class="auth-form__label">{{ __('Password') }}</label>
            <input id="password" type="password" class="auth-form__input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
            @error('password')
                <span class="auth-form__error" role="alert">{{ $message }}</span>
            @enderror
        </div>

        <div class="auth-form__row">
            <label class="auth-form__check" for="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="auth-form__check-label">{{ __('Remember Me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="auth-form__link" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
            @endif
        </div>

        <button type="submit" class="auth-form__submit">{{ __('Login') }}</button>
    </form>

    @if (Route::has('register'))
        <div class="auth-card__footer">
            <p class="auth-card__footer-text">Don't have an account? <a href="{{ route('register') }}" class="auth-card__footer-link">{{ __('Register') }}</a></p>
        </div>
    @endif
</div>
@endsection
