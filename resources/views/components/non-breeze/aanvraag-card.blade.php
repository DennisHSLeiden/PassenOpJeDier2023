@push('css')
<link rel="stylesheet" href="/css/aanvraag-card.css">
@endpush

<a href="aanvraag-details/{{$eigen_aanvraag->aanvraag_id}}" class="aanvraag-card button">
    <h1>Ik zoek iemand voor {{$eigen_aanvraag->aanvraagHuisdier->naam}}</h1>
    @php($i = 0)
    @foreach ($reacties as $reactie)
        @if($eigen_aanvraag->aanvraag_id == $reactie->aanvraag_id)
            @if(is_null($reactie->antwoord))
                @php($i++)
            @endif
        @endif
    @endforeach
    <h1>nieuwe reacties: {{$i}}</h1>
</a>
