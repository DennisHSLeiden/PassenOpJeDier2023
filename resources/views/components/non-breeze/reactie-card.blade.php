@push('css')
<link rel="stylesheet" href="/css/reactie-card.css">
@endpush

<a href="/addReactie/{{$aanvraag->aanvraag_id}}" class="reactie-card button" data-huisdier-soort="{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}">
    <section  class="Jouw-reactie-Card">

        <section class="row-information">

            <figure class="card-image">
               <img src="{{ asset('storage/img/'.'huisdier_' . $aanvraag->aanvraagHuisdier->huisdier_id . '_' . $aanvraag->aanvraagHuisdier->naam . '/' . $aanvraag->aanvraagHuisdier->allFotosHuisdier->first()->filename) }}">
            </figure>

            <section class="column-information reactie-card-information">
                <h1>{{$aanvraag->aanvraagHuisdier->naam}}</h1>
                <h1>{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}</h1>
                <h1>{{$aanvraag->wanneer}}</h1>
                <h1>{{$aanvraag->prijs}}</h1>
            </section>
            
        </section>
            
    </section>
</a>
