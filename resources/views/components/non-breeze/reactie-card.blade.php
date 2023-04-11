@push('css')
<link rel="stylesheet" href="/css/reactie-card.css">
@endpush

<a href="/addReactie/{{$aanvraag->aanvraag_id}}" class="reactie-card button">
    <h1>Hello dit is een aanvraag voor {{$aanvraag->aanvraagHuisdier->naam}}</h1>
</a>

