@section('title')
{{"PassenOpJeDier | Registreren"}}
@endsection

@extends('body')
@section('content')

<main class="content">
    <h1>
        Welcome {{ Auth::user()->name }}
    </h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-responsive-nav-link>
    </form>
    <div>
        <div>{{ Auth::user()->email }}</div>
    </div>
</main>

@endsection