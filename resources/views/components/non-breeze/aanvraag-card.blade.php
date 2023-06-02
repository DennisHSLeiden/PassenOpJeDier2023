@push('css')
<link rel="stylesheet" href="/css/aanvraag-card.css">
@endpush

<section class="aanvraag-card">
    <a href="aanvraag-details/{{$eigen_aanvraag->aanvraag_id}}" class="aanvraag-card-button">
        <section class= "aanvraag-card-inhoud">
            <h1>Mijn aanvraag voor {{$eigen_aanvraag->aanvraagHuisdier->naam}}</h1>
            <h1>Wanneer: {{$eigen_aanvraag->wanneer}}
        </section>
        @php($i = 0)
        @foreach ($reacties as $reactie)
            @if($eigen_aanvraag->aanvraag_id == $reactie->aanvraag_id)
                @if(is_null($reactie->antwoord))
                    @php($i++)
                @endif
            @endif
        @endforeach
        @if ($i > 0)
            <section class="new-reactions-badge">{{ $i }}</section>
        @endif
    </a>
</section>
