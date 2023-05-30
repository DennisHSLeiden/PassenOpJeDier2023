@section('title')
{{"PassenOpJeDier | Dashboard"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/dashboard.css">
@endpush


<main class="content">
    
    <section class="card-container">
        
        <section class="general-card">
            <section class='general-card-header'>
                <section class="add-button" id="js--addAanvraagBtn">
                    <span>Maak een nieuwe aanvraag aan</span>
                </section>
            </section>
            @include('./components/non-breeze/add_aanvraag_overlay')
            <section class='general-card-content'>
                @foreach ($eigen_aanvragen as $eigen_aanvraag)
                @include('./components/non-breeze/aanvraag-card')
                @endforeach
            </section>
        </section>
        
        <section class="general-card">
            <section class='general-card-header'>
                <h1 class="titel-aanvragen">Hier kan je reageren op aanvragen</h1>
            </section>
            <form id="filterForm">
                <section class="dropdown">
                    <button onclick="toggleDropdown()" class="dropdown-toggle">Filter Soort</button>
                    <section id="checkboxes" class="checkboxes">
                        <label><input type="checkbox" name="soort" value="hond" onchange="filterAanvragen()">Hond</label>
                        <label><input type="checkbox" name="soort" value="kat" onchange="filterAanvragen()">Kat</label>
                        <!-- Voeg hier andere checkboxen toe -->
                    </section>
                </section>
            </form>
            <section class="general-card-content alle-available-opdrachten column-information">
                <!-- @foreach ($aanvragen as $aanvraag)
                    @include('./components/non-breeze/reactie-card')
                @endforeach -->
            </section>
        </section>


        <section class="general-card huisdier-card">
            <section class='huisdier-card-indeler'>
                <section class="square-photo">
                    <img src="{{$padVoorFoto}}/{{$naamVanFoto}}" alt="Vierkante foto">
                </section>
                <section class='indeling-rechts'>
                    <section class='general-card-header'>
                        <a href="mijnHuisdieren/{{$currentUserEmail}}" class="arrow-button">
                            Mijn Huisdieren
                            <span class="arrow">&#9658;</span>
                        </a>
                    </section>
                    <section class='general-card-content'>
                        <p> Dit is {{$eersteHuisdier->naam}}</p>
                        <p> Hij is een {{$eersteHuisdier->huisdierSoort()->first()->soort}}</p>
                    </section>
                </section>
            </section>
        </section>

        <section class="general-card">
            <section class='general-card-header'>
                <h1> Hier heb je de kans om Reviews te plaatsen </h1>
            </section>
            <section class='general-card-header'>
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

</main>

@endsection
