@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/login.css">
@endpush

<main class="content">

        <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <section class='form-control'>
        <!-- Email Address -->
            <section>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </section>

            <!-- Password -->
            <section class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </section>

            <!-- Remember Me -->
            <!-- <section class="remember-me">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">{{ __('Remember me') }}</label>
            </section> -->

            <section class='container_wrap'>
                <label class="container"> {{ __('Remember me') }}
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </section>

            <section class="form-actions">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">
                    {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="login-button">
                    {{ __('Log in') }}
                </x-button>
            </section>

        </section>
    </form>

</main>

@endsection
