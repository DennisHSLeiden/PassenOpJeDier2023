<article class="addHuisdierCard__overlay" id="js--addHuisdierOverlay">
    <form action="addHuisdier" method="post" id="js--addHuisdierForm" enctype="multipart/form-data">
    @csrf

        <label for="naam">Naam van je huisdier</label>
        <input type="text" name="naam" placeholder="Geef hier de naam van je huisdier">


        @foreach ($soorten as $soort)
            <label for="soort_id">{{$soort->soort}}</label><br>
            <input type="radio" id="{{$soort->soort_id}}" name="soort_id" value="{{$soort->soort_id}}">
        @endforeach

        <label for="generieke_informatie">Generieke informatie</label>
        <input type="text" name="generieke_informatie" placeholder="Bijvoorbeeld, slaapt elke dag om 8 uur">

        <input type="file" name="foto" accept="image/*">

        <input type="submit" id="js--addHuisdierBtnSubmit" value="Voeg Huisdier toe">
    </form>
    <input type="submit" class="addHuisdierCard__cancelBtn" id="js--cancelAddHuisdier" value="Cancel">

</article> 