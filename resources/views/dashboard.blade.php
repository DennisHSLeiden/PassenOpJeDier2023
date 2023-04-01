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

    <section class="all-information">

        <section class="column-information">

            <section class="row-information row-dashboard-style">

                <section class="general-Card column-information">

                    <section class="add-button" id="js--addHuisdierBtn">
                        <span>Voeg Nieuw Huisdier Toe</span>
                    </section>
                    @include('./components/non-breeze/add_huisdier_overlay')
                    <section class="huisdier-cards">
                        @foreach ($huisdieren as $huisdier)
                        @include('./components/non-breeze/huisdier-card')
                        @endforeach
                    </section>

                </section>

                <section class="general-Card">
                    <section class="add-button" id="js--addAanvraagBtn">
                        <span>Maak een nieuwe aanvraag aan</span>
                    </section>
                    @include('./components/non-breeze/add_aanvraag_overlay')
                    <section>
                        @foreach ($eigen_aanvragen as $eigen_aanvraag)
                        <h1>Ik zoek iemand voor {{$eigen_aanvraag->aanvraagHuisdier->naam}}</h1>
                        @endforeach
                    </section>
                </section>

            </section>

            <section class="row-information row-dashboard-style">

                <section class="general-Card">
                    <section class="add-button" id="js--addOpdrachtBtn">
                        <span>Vind een nieuwe opdracht</span>
                    </section>
                    <section>
                        @foreach ($aanvragen as $aanvraag)
                        <h1>Hello dit is een aanvraag voor {{$aanvraag->aanvraagHuisdier->naam}}</h1>
                        @endforeach
                    </section>
                </section>

                <section class="general-Card">
                    <h1> Hier komen de huisdieren waar je nog een review op kan plaatsen </h1>
                </section>

            </section>
        </section>
    </section>

</main>

@endsection