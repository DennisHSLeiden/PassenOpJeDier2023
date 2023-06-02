@section('title')
{{"PassenOpJeDier | Dashboard"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/dashboard.css">
@endpush

@push('js')
<script src="/js/main.js"></script>
@endpush


<main class="content">
    
    <section class="card-container">
        
        <section class="general-card persoon-card">
            <section class='huisdier-card-indeler'>
                <section class="square-photo">
                @if (empty($currentUser->UserExtra_user_information()->first()->path))
                    <img src="/storage/img/no-picture/Profile_avatar_placeholder_large.png" alt="Placeholder foto">
                @else
                    <img src="{{$currentUser->UserExtra_user_information()->first()->path}}/{{$currentUser->UserExtra_user_information()->first()->filename}}" alt="Profiel foto">
                @endif

                </section>

                <section class='indeling-rechts'>
                    <section class='general-card-header'>
                        <a href="/profiel/{{$currentUserEmail}}" class="arrow-button">
                            Mijn Profiel
                            <span class="arrow">&#9658;</span>
                        </a>
                    </section>
                    <section class='general-card-content'>
                        <!-- Content -->
                    </section>
                </section>
            </section>
        </section>

        <section class="general-card huisdier-card">
            <section class='huisdier-card-indeler'>
                <section class="square-photo">
                    @if ($padVoorFoto)
                        <img src="{{$padVoorFoto}}/{{$naamVanFoto}}" alt="Foto van je huisdier">
                    @else
                        <img src="storage/img/no-picture/logo.png" alt="Placeholder huisdier foto">
                    @endif
                </section>
                <section class='indeling-rechts'>
                    <section class='general-card-header'>
                        <a href="mijnHuisdieren" class="arrow-button">
                            Mijn Huisdieren
                            <span class="arrow">&#9658;</span>
                        </a>
                    </section>
                    <section class='general-card-content'>
                    @if ($padVoorFoto)
                        <p> Dit is {{$eersteHuisdier->naam}}</p>
                        <p> Hij is een {{$eersteHuisdier->huisdierSoort()->first()->soort}}</p>
                        <br>
                        <p> Ga snel naar </p>
                        <p>'Mijn Huisdieren'</p>
                        <p> om de rest te zien </p>
                    @else
                        <p> Je hebt helaas nog </p>
                        <p> geen huisdieren. </p>
                        <br>
                        <p> Ga snel naar </p>
                        <p>'Mijn Huisdieren'</p>
                        <p> om een aan te maken</p>
                    @endif
                    </section>
                </section>
            </section>
        </section>
        
        <section class="general-card dashboard-aanvraag-card">
            <section class='general-card-header aanvraag-header'>
                <section class="aanvraag-header-left">
                    <section class="add-aanvraag-button" id="js--addAanvraagBtn">
                        <span>Maak aanvraag aan +</span>
                    </section>
                </section>
                <section class= "aanvraag-header-right">
                    <a href="alleAanvragen" class="arrow-button">
                        Alle Aanvragen
                        <span class="arrow">&#9658;</span>
                    </a>
                </section>
            </section>
            @include('./components/non-breeze/add_aanvraag_overlay')
            <section class='general-card-content dashboard-aanvraag-card-content'>
                <section class="dashboard-aanvraag-card-content-left">
                    @foreach ($eigen_aanvragen as $eigen_aanvraag)
                    @include('./components/non-breeze/aanvraag-card')
                    @endforeach
                </section>
                <section class="dashboard-aanvraag-card-content-right">
                    <p> Ga naar "alle aanvragen"</p>
                    <p> om te zoeken naar een </p>
                    <p> naar een huisdier die </p>
                    <p> op zoek is naar een oppas</p>
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
                        <button class="review-plaatsen-button">
                            <a href ='reviewHuisdier/{{$review->review_huisdier_id}}'>Geef een review aan {{$review->reviewHuisdierAanvraag()->first()->aanvraagHuisdier()->first()->naam}} </a>
                        </button>
                    @endif
                @endforeach
                @foreach ($reviewsAlsHuisdierEigenaarGegeven as $review)
                    @if (!$review->rating)
                        <button class="review-plaatsen-button">
                            <a href ='reviewOppasser/{{$review->review_oppasser_id}}'>Geef een review aan {{$review->reviewOppasserAanvraag()->first()->email_oppasser}} </a>
                        </button>
                    @endif
                @endforeach
            </section>
        </section>

    </section>

</main>

@endsection
