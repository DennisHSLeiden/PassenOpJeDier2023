@section('title')
{{ "PassenOpJeDier | Aanvraag" }}
@endsection

@push('css')
<link rel="stylesheet" href="/css/aanvraag-details.css">
@endpush

@extends('body')
@section('content')
<main class="content">
    <section>
        <h1>Dit zijn de reacties op een aanvraag voor {{ $huisdier->naam }}</h1>
        @foreach ($reacties as $reactie)
        @if (is_null($reactie->antwoord))
        <section class="reactie-kaartje">
            <p class="comment">{{ $reactie->comment }}</p>

            <form action="../reageer/{{ $reactie->reactie_id }}" method="POST" class="reageer-form">
                @csrf
                <section class="reactie-knopper">
                    <label class="reageer-keuze-container">Oppas Aannemen
                        <input type="radio" id="True" name="antwoord" value="1">
                        <span class="checkmark"></span>
                    </label>
                    
                    <label class="reageer-keuze-container">Oppas Weigeren
                        <input type="radio" id="False" name="antwoord" value="0">
                        <span class="checkmark"></span>
                    </label>
                </section>

                <input type="submit" value="Voeg reactie toe">
            </form>
        </section>
        @endif
        @endforeach
    </section>
</main>
@endsection
