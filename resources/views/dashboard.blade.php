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

            <section class="row-information height-50 flex-center">

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
                    <h1> Hier komen de aanvragen die je zelf hebt gemaakt </h1>
                </section>

            </section>

            <section class="row-information height-50 flex-center">

                <section class="general-Card">
                    <h1> Hier komen de recties die je zelf hebt geplaatst op een huisdier </h1>
                </section>

                <section class="general-Card">
                    <h1> Hier komen de huisdieren waar je nog een review op kan plaatsen </h1>
                </section>

            </section>
        </section>
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