@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('register') }}">
        @csrf

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

            <x-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </section>

        <!-- Confirm Password -->
        <section class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required />
        </section>

        <section>
            <a href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-button>
                {{ __('Register') }}
            </x-button>
        </section>
    </form>

</main>

@endsection
