@push('css')
<link rel="stylesheet" href="/css/reactie-card.css">
@endpush

<a href="/addReactie/{{$aanvraag->aanvraag_id}}" class="reactie-card button">
    <section  class="Jouw-reactie-Card">

        <section class="row-information">

            <figure class="card-image">
                <img src="/img/Cooper.jpg" alt="The dog cooper">
            </figure>

            <section class="column-information reactie-card-information">
                <h1>{{$aanvraag->aanvraagHuisdier->naam}}</h1>
                <h1>{{$aanvraag->aanvraagHuisdier->soort}}</h1>
            </section>
            
        </section>
            
    </section>
</a>
