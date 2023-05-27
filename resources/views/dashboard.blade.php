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
    
    <a href="/admin" class="adminbutton" id="js--adminButton" data-role="{{$role}}">
        Ga naar Admin Page
    </a>

    <section class="all-information">

        <section class="column-information">

            <section class="row-information row-dashboard-style">

                <section class="general-Card column-information">

                    <section class="add-button" id="js--addHuisdierBtn">
                        <span>Voeg Nieuw Huisdier Toe</span>
                    </section>
                    @include('./components/non-breeze/add_huisdier_overlay')
                    <section>
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
                    <section >
                        @foreach ($eigen_aanvragen as $eigen_aanvraag)
                            @include('./components/non-breeze/aanvraag-card')
                        @endforeach
                    </section>
                </section>

            </section>

            <section class="row-information row-dashboard-style">

                <section class="general-Card">
                    <h1 class="titel-aanvragen">Hier kan je reageren op aanvragen</h1>
                    <form id="filterForm">
                        <!-- <label>
                            <input type="checkbox" name="soort" value="hond" onchange="filterAanvragen()"> Hond
                        </label>
                        <label>
                            <input type="checkbox" name="soort" value="kat" onchange="filterAanvragen()"> Kat
                        </label>
                        Voeg hier andere mogelijke soorten checkboxes toe -->

                        <div class="dropdown">
                            <button onclick="toggleDropdown()" class="dropdown-toggle">Filter Soort</button>
                            <div id="checkboxes" class="checkboxes">
                                <label><input type="checkbox" name="soort" value="hond" onchange="filterAanvragen()">Hond</label>
                                <label><input type="checkbox" name="soort" value="kat" onchange="filterAanvragen()">Kat</label>
                                <!-- Voeg hier andere checkboxen toe -->
                            </div>
                        </div>
                    </form>
                    <section class="alle-available-opdrachten column-information">
                        @foreach ($aanvragen as $aanvraag)
                            @include('./components/non-breeze/reactie-card')
                        @endforeach
                    </section>
                </section>

                <section class="general-Card">
                    <h1> Dit is de plek waar je reviews kan plaatsen op oppassers of huisdieren </h1>
                    @foreach ($ReviewsAlsOppasGegeven as $review)
                        @if (!$review->rating)
                            <button>
                                <a href ='reviewHuisdier/{{$review->review_huisdier_id}}'>Geef een review aan {{$review->reviewHuisdierAanvraag()->first()->aanvraagHuisdier()->first()->naam}} </a>
                            </button>
                        @endif
                    @endforeach
                    @foreach ($reviewsAlsHuisdierEigenaarGegeven as $review)
                        @if (!$review->rating)
                            <button>
                                <a href ='reviewOppasser/{{$review->review_oppasser_id}}'>Geef een review aan {{$review->reviewOppasserAanvraag()->first()->email_oppasser}} </a>
                            </button>
                        @endif
                    @endforeach
                </section>

            </section>
        </section>
    </section>

</main>

@endsection