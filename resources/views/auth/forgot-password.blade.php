@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">

    <section>
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </section>

    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <section>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
        </section>

        <section>
            <x-button>
                {{ __('Email Password Reset Link') }}
            </x-button>
        </section>
    </form>

</main>

@endsection

