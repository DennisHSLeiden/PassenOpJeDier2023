@push('css')
<link rel="stylesheet" href="/css/aanvraag-overlay.css">
@endpush

<article class="addAanvraagCard__overlay" id="js--addAanvraagOverlay">
    <form class="addaanvraagoverlay" action="addAanvraag" method="post" id="js--addAanvraagForm">
        @csrf
        <section class='form-control'>
            <h1> Voor wie wil je een aanvraag aanmaken ?</h1>
            <section class="huisdieren-container">
                @foreach ($huisdieren as $huisdier)
                <label class="add-aanvraag-overlay-container">{{$huisdier->naam}}
                    <input type="radio" id="{{$huisdier->huisdier_id}}" name="huisdier_id" value="{{$huisdier->huisdier_id}}">
                    <span class="checkmark"></span>
                </label>
                @endforeach
            </section>

            <label for="wanneer">Wanneer?</label>
            <input type="text" name="wanneer" placeholder="Geef hier de wanneer van je Aanvraag">


            <label for="prijs">Prijs?</label>
            <input type="text" name="prijs" placeholder="Geef hier de prijs van je Aanvraag">

            
            <label for="extra_informatie">Extra informatie</label>
            <input type="text" name="extra_informatie" placeholder="Bijvoorbeeld, slaapt elke dag om 8 uur">

            <section class="form-actions">
                <input type="submit" id="js--addAanvraagBtnSubmit" value="Voeg Aanvraag toe">
                <input type="button" class="cancel-btn addAanvraagCard__cancelBtn" id="js--cancelAddAanvraag" value="Cancel">
            </section>
        </section>
    </form>

</article> 