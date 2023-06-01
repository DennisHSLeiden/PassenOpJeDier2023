@section('title')
{{"PassenOpJeDier | Mijn Huisdieren"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/profiel.css">
@endpush

@push('js')
<script src="/js/profiel.js"></script>
@endpush


<main class="profiel-content">
    <h1> Welkom op het profiel van {{$profielOwner->email}} </h1>
    <section class="profiel-indeling-top">
        <section class="profiel-indeling-left">
            <section class="square-photo-persoon">
                @php
                    $userInformation = $profielOwner->UserExtra_user_information()->first();
                    $imagePath = $userInformation ? $userInformation->path : null;
                @endphp

                <section class="image-container">
                @if (!$imagePath)
                    <img src="/storage/img/no-picture/Profile_avatar_placeholder_large.png" alt="Profielfoto">
                    <p>Er is helaas nog geen foto</p>
                @else
                    <img src="/{{$profielOwner->UserExtra_user_information()->first()->path}}/{{$profielOwner->UserExtra_user_information()->first()->filename}}" alt="Profielfoto">
                @endif
                </section>
            </section>
        </section>


        <section class="profiel-indeling-middle">
            <!-- Toon de gegevens van extra gebruikersinformatie -->
            <label for="voornaam">Voornaam: </label>
            <span id="voornaam">{{ $extraUserInfo->voornaam ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="tussenvoegsel">Tussenvoegsel: </label>
            <span id="tussenvoegsel">{{ $extraUserInfo->tussenvoegsel ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="achternaam">Achternaam: </label>
            <span id="achternaam">{{ $extraUserInfo->achternaam ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="geboortedatum">Geboortedatum: </label>
            <span id="geboortedatum">{{ $extraUserInfo->geboortedatum ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="telefoonnummer">Telefoonnummer: </label>
            <span id="telefoonnummer">{{ $extraUserInfo->telefoonnummer ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="woonplaats">Woonplaats: </label>
            <span id="woonplaats">{{ $extraUserInfo->woonplaats ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="straat">Straat: </label>
            <span id="straat">{{ $extraUserInfo->straat ?? 'Er is nog geen waarde ingevuld' }}</span>
            
            <label for="huisnummer">Huisnummer: </label>
            <span id="huisnummer">{{ $extraUserInfo->huisnummer ?? 'Er is nog geen waarde ingevuld' }}</span>
            

            <!-- Toon de edit-knop als de gebruiker de eigenaar is -->
            @if ($isOwner)
                <a href="{{ route('extrauserinformation.edit', $extraUserInfo->email) }}">Edit</a>
            @endif
        </section>
        <section class="profiel-indeling-right">
            <section class="slideshow-container">
                <section class="slideshow">
                    @foreach ($profielOwner->allFotosHuis()->get() as $index => $foto)
                        <section class="slide photo-container{{ $index === 0 ? ' active' : '' }}">
                            <img src="/{{ $foto->path }}/{{ $foto->filename }}" alt="Foto">
                        </section>
                    @endforeach
                    @if ($profielOwner->allFotosHuis()->count() === 0)
                        <section class="slide photo-container active">
                            <img src="/storage/img/no-picture/Placeholder_image.png" alt="Placeholder Foto">
                        </section>
                    @endif
                </section>
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
            </section>
        </section>
    </section>
    <section class = "profiel-indeling-bottom">
        <section class="reviews-container">
            @foreach ($reviews as $review)
                @include('./components/non-breeze/review-card')
            @endforeach
        </section>
    </section>
</main>


@endsection