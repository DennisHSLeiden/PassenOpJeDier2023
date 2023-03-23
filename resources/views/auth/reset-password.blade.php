@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">
    
    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <section>
            <x-label for="email" :value="__('Email')" />

            <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
        </section>

        <!-- Password -->
        <section>
            <x-label for="password" :value="__('Password')" />

            <x-input id="password" type="password" name="password" required />
        </section>

        <!-- Confirm Password -->
        <section>
            <x-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input id="password_confirmation"
                                type="password"
                                name="password_confirmation" required />
        </section>

        <section>
            <x-button>
                {{ __('Reset Password') }}
            </x-button>
        </section>
    </form>

</main>

@endsection
