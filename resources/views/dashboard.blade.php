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



</main>

@endsection