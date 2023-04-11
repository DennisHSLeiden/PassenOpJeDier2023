<article class="addAanvraagCard__overlay" id="js--addAanvraagOverlay">
    <form action="addAanvraag" method="post" id="js--addAanvraagForm">
    @csrf


        @foreach ($huisdieren as $huisdier)
        <label for="huisdier_id">{{$huisdier->naam}}</label><br>
        <input type="radio" id="{{$huisdier->huisdier_id}}" name="huisdier_id" value="{{$huisdier->huisdier_id}}">
        @endforeach

        <label for="wanneer">Wanneer?</label>
        <input type="text" name="wanneer" placeholder="Geef hier de wanneer van je Aanvraag">


        <label for="prijs">Prijs?</label>
        <input type="text" name="prijs" placeholder="Geef hier de prijs van je Aanvraag">

        
        <label for="extra_informatie">Extra informatie</label>
        <input type="text" name="extra_informatie" placeholder="Bijvoorbeeld, slaapt elke dag om 8 uur">

        <input type="submit" id="js--addAanvraagBtnSubmit" value="Voeg Aanvraag toe">
    </form>
    <input type="submit" class="addAanvraagCard__cancelBtn" id="js--cancelAddAanvraag" value="Cancel">

</article> 