@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">

    <section>
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </section>

    <!-- Validation Errors -->
    <x-auth-validation-errors :errors="$errors" />

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <section>
            <x-label for="password" :value="__('Password')" />

            <x-input id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
        </section>

        <section>
            <x-button>
                {{ __('Confirm') }}
            </x-button>
        </section>
    </form>

</main>

@endsection