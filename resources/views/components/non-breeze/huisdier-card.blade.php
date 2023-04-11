@push('css')
<link rel="stylesheet" href="/css/huisdier-card.css">
@endpush

<a href= '/huisdier/{{$huisdier->huisdier_id}}/' class="js--huisdierCard">
    <section  class="Jouw-Huisdier-Card">

        <section class="row-information">

            <figure class="card-image">
                <img src="/img/Cooper.jpg" alt="The dog cooper">
            </figure>

            <section class="column-information huisdier-card-information">
                <h1>{{$huisdier->naam}}</h1>
                <h1>{{$huisdier->soort}}</h1>
            </section>
            
        </section>
        
    </section>
</a>