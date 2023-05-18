@section('title')
{{"PassenOpJeDier | NoAdmin"}}
@endsection

@extends('body')
@section('content')

@push('css')
@endpush

<main class="content">
    <h1>
        You have no Admin privileges!
    </h1>
    <h2> 
        YOU MAY NOT ENTER
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