<article class="addHuisdierCard__overlay" id="js--addHuisdierOverlay">
    <form action="addHuisdier" method="post" id="js--addHuisdierForm">
    @csrf

        <label for="naam">Naam van je huisdier</label>
        <input type="text" name="naam" placeholder="Geef hier de naam van je huisdier">


        <label for="soort">Soort van je huisdier</label>
        <input type="text" name="soort" placeholder="Geef hier de soort van je huisdier">

        
        <label for="generieke_informatie">Generieke informatie</label>
        <input type="text" name="generieke_informatie" placeholder="Bijvoorbeeld, slaapt elke dag om 8 uur">

        <input type="submit" id="js--addHuisdierBtnSubmit" value="Voeg Huisdier toe">
    </form>
</article> 