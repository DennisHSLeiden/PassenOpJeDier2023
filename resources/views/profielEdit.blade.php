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
            <form action="{{ route('extrauserinformation.update', $extraUserInfo->email) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Voeg inputvelden toe voor de bewerkbare velden -->
                <label for="voornaam">Voornaam: </label>
                <input type="text" name="voornaam" value="{{ $extraUserInfo->voornaam }}">
                <br>

                <label for="tussenvoegsel">Tussenvoegsel: </label>
                <input type="text" name="tussenvoegsel" value="{{ $extraUserInfo->tussenvoegsel }}">
                <br>

                <label for="achternaam">Achternaam: </label>
                <input type="text" name="achternaam" value="{{ $extraUserInfo->achternaam }}">
                <br>

                <label for="geboortedatum">Geboortedatum: </label>
                <input type="date" name="geboortedatum" value="{{ $extraUserInfo->geboortedatum }}">
                <br>

                <label for="telefoonnummer">Telefoonnummer: </label>
                <input type="text" name="telefoonnummer" value="{{ $extraUserInfo->telefoonnummer }}">
                <br>

                <label for="woonplaats">Woonplaats: </label>
                <input type="text" name="woonplaats" value="{{ $extraUserInfo->woonplaats }}">
                <br>

                <label for="straat">Straat: </label>
                <input type="text" name="straat" value="{{ $extraUserInfo->straat }}">
                <br>

                <label for="huisnummer">Huisnummer: </label>
                <input type="text" name="huisnummer" value="{{ $extraUserInfo->huisnummer }}">
                <br>

                <!-- Voeg een submitknop toe om de wijzigingen op te slaan -->
                <input type="submit" value="Opslaan">
            </form>
        </section>
        <section class="profiel-indeling-right">
            <section class="slideshow-container">
                <section class="slideshow">
                    @foreach ($profielOwner->allFotosHuis()->get() as $index => $foto)
                    <section class="slide photo-container{{ $index === 0 ? ' active' : '' }}">
                        <img src="/{{ $foto->path }}/{{ $foto->filename }}" alt="Foto van huis">
                    </section>
                    @endforeach
                    @if ($profielOwner->allFotosHuis()->count() === 0)
                        <section class="slide photo-container active">
                            <img src="/storage/img/no-picture/Placeholder_home.jpg" alt="Placeholder Foto">
                        </section>
                    @endif
                </section>
                <a class="prev">&#10094;</a>
                <a class="next">&#10095;</a>
            </section>
        </section>
    </section> 
    <section class = "profiel-indeling-bottom">
        <section class="profiel-indeling-bottom-left">
        <!-- Formulier om foto te uploaden -->
        @if (!$imagePath)
            <h1> voeg een foto van jou toe! </h1>
            <form action="../edit/foto_persoon" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo" accept="image/*">
                <button type="submit">Opslaan</button>
            </form>
        @endif
        </section>

        <section class="profiel-indeling-bottom-middle">
            <!-- ... -->
        </section>

        <section class="profiel-indeling-bottom-right">
            <h1> Voeg een foto van je huis toe! </h1>
            <form action="../edit/foto_woning" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="photo" accept="image/*">
                <button type="submit">Opslaan</button>
            </form>
        </section>

    </section>
</main>


@endsection