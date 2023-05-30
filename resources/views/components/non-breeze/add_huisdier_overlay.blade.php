<article class="overlay addHuisdierCard__overlay" id="js--addHuisdierOverlay">
  <form class="addhuisdieroverlay"action="addHuisdier" method="post" id="js--addHuisdierForm" enctype="multipart/form-data">
    @csrf
    <section  class="form-control">
      <label for="naam">Naam van je huisdier</label>
      <input type="text" name="naam" placeholder="Geef hier de naam van je huisdier">

      <h1> wat voor soort is je huisdier?</h1>
      <section class="soorten-container">
      @foreach ($soorten as $soort)
        <label for="soort_id" class="add-huisdier-overlay-container">{{$soort->soort}}
            <input type="radio" id="{{$soort->soort_id}}" name="soort_id" value="{{$soort->soort_id}}">
            <span class="checkmark"></span>
        </label>
      @endforeach
      </section>

      <label for="generieke_informatie">Generieke informatie</label>
      <input type="text" name="generieke_informatie" placeholder="Bijvoorbeeld, slaapt elke dag om 8 uur">

      <input type="file" name="foto" accept="image/*">

      <section class="form-actions">
        <input type="submit" id="js--addHuisdierBtnSubmit" value="Voeg Huisdier toe" class="submit-btn">
        <input type="button" class="cancel-btn addHuisdierCard__cancelBtn" id="js--cancelAddHuisdier" value="Cancel">
      </section>
    </section>
  </form>
</article>
