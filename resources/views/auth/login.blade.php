@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">

        <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

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
        <section>
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember">
                <span>{{ __('Remember me') }}</span>
            </label>
        </section>

        <section>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-button>
                {{ __('Log in') }}
            </x-button>
        </section>
    </form>

</main>

@endsection
