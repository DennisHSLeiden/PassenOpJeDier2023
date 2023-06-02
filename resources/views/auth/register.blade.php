@extends('body')

@section('title', 'PassenOpJeDier | Registreren')



@push('css')
<link rel="stylesheet" href="/css/login.css">
@endpush

@section('content')
<main class="content">

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <section class="form-control">
            <!-- Name -->
            <section>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
            </section>

            <!-- Email Address -->
            <section class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </section>

            <!-- Password -->
            <section class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            </section>

            <!-- Confirm Password -->
            <section class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" type="password" name="password_confirmation" required />
            </section>

            <section class="container_wrap">
                <label class="container">{{ __('Remember me') }}
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </section>

            <section class="form-actions">
                <a href="{{ route('login') }}" class="forgot-password">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="login-button">
                    {{ __('Register') }}
                </x-button>
            </section>
        </section>
    </form>
</main>
@endsection
