@push('css')
<link rel="stylesheet" href="/css/reactie-card.css">
@endpush


<section  class="Jouw-reactie-Card">

    <section class="row-information">

        <figure class="card-image">
            <img src="/{{$aanvraag->aanvraagHuisdier->allFotosHuisdier->first()->path}}/{{$aanvraag->aanvraagHuisdier->allFotosHuisdier->first()->filename}}" alt="foto van huisdier">
        </figure>

        <section class="column-information reactie-card-information">
            <h1>{{$aanvraag->aanvraagHuisdier->naam}}</h1>
            <h1>{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}</h1>
            <h1>{{$aanvraag->wanneer}}</h1>
            <h1>{{$aanvraag->prijs}}</h1>
        </section>
        
    </section>
        
</section>

