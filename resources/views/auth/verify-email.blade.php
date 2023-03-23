@section('title')
    {{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')
<main class="content">

    <section>
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </section>

    @if (session('status') == 'verification-link-sent')
        <section >
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </section>
    @endif

    <section>
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <section>
                <x-button>
                    {{ __('Resend Verification Email') }}
                </x-button>
            </section>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit">
                {{ __('Log Out') }}
            </button>
        </form>
    </section>

</main>

@endsection
