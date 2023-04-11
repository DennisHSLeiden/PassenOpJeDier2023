@section('title')
{{"PassenOpJeDier | Blocked"}}
@endsection

@extends('body')
@section('content')

@push('css')
@endpush

<main class="content">
    <h1>
        You have been blocked!
    </h1>
    <h2> 
        speak to an admin to get unblocked
    </h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Go back to registering page') }}
        </x-responsive-nav-link>
    </form>
</main>

@endsection