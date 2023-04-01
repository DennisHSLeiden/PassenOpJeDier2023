@section('title')
{{"PassenOpJeDier | Dashboard"}}
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
    <h2>{{ Auth::user()->email }}</h2>

    <section id="js--addHuisdierBtn">
        <span>add</span>
    </section>

    @include('./components/non-breeze/add_huisdier_overlay')

    <section>
        @foreach ($huisdieren as $huisdier)
        <a href= '/huisdier/{{$huisdier->huisdier_id}}/'>
            <h1>Hello dit is een huisdier {{$huisdier->naam}}</h1>
        </a>
        @endforeach
    </section>

    <h1> Hier kan je je eigen aanvragen en toevoegen, en zien of er een nieuwe reactie is </h1>

    <section id="js--addAanvraagBtn">
        <span>KLIK HIER VOOR AANVRAAG AANMAKEN</span>
    </section>

    @include('./components/non-breeze/add_aanvraag_overlay')

    <section>
        @foreach ($eigen_aanvragen as $eigen_aanvraag)
        <h1>Hello dit is een aanvraag voor {{$eigen_aanvraag->aanvraagHuisdier->naam}}</h1>
        @endforeach
    </section>

    <h1> hier ga je alle aanvragen van andere mensen zien </h1>

    <section>
        @foreach ($aanvragen as $aanvraag)
        <h1>Hello dit is een aanvraag voor {{$aanvraag->aanvraagHuisdier->naam}}</h1>
        @endforeach
    </section>


</main>

@endsection