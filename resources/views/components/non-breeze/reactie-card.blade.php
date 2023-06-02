<!-- @push('css')
<link rel="stylesheet" href="/css/reactie-card.css">
@endpush

<a href="/addReactie/{{$aanvraag->aanvraag_id}}" class="reactie-card button" data-huisdier-soort="{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}">
    <section  class="Jouw-reactie-Card">

        <section class="row-information">

            <section class="column-information reactie-card-information">
                <h1>{{$aanvraag->aanvraagHuisdier->naam}}</h1>
                <h1>{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}</h1>
                <h1>{{$aanvraag->wanneer}}</h1>
                <h1>{{$aanvraag->prijs}}</h1>
            </section>
            
        </section>
            
    </section>
</a> -->


@push('css')
<link rel="stylesheet" href="./css/mijnhuisdieren.css">
@endpush

@php
$reviews = $aanvraag->aanvraagHuisdier->allReviewsHuisdier()->get();
if ($reviews->isEmpty()) {
    $reviews = null;
}
@endphp

<section class="reactie-card" data-huisdier-soort="{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}">
  <section class="card">
    <section class="card-left">
      <section class="slideshow-container">
        <section class="slideshow">
          @foreach ($aanvraag->aanvraagHuisdier->allFotosHuisdier()->get() as $index => $foto)
          <section class="slide photo-container{{ $index === 0 ? ' active' : '' }}">
            <img src="../{{ $foto->path }}/{{ $foto->filename}}" alt="Foto">
          </section>
          @endforeach
        </section>
        <a class="prev">&#10094;</a>
        <a class="next">&#10095;</a>
      </section>
    </section>
    <section class="card-right">
      <section class="card-header">
        <h2>Mijn naam is {{$aanvraag->aanvraagHuisdier->naam }}</h2>
      </section>
      <section class="card-content">
        <a href="profiel/{{$aanvraag->aanvraagHuisdier->huisdierUser->email}}">Eigenaar: {{$aanvraag->aanvraagHuisdier->huisdierUser->name }}</a>
        <p>Ik ben een {{$aanvraag->aanvraagHuisdier->huisdierSoort()->first()->soort}}</p>
        <p>Informatie over mij: {{$aanvraag->aanvraagHuisdier->generieke_informatie}}</p>
        <p> "{{$aanvraag->wanneer}}" is wanneer ik een oppasser nodig heb </p>
        <p> je krijgt er {{$aanvraag->prijs}} voor! </p>
        </section>
        <section class="card-footer">
        <section class="huisdier-card-footer-left">
        @if ($reviews === null)
            <p class="card-button js__toggleReview">Er zijn nog geen Reviews</p>
        @else
            <a class="card-button js__toggleReview" id="js__toggleReview{{$aanvraag->aanvraagHuisdier->huisdier_id }}">Show Reviews</a>
        @endif

        </section>
        <section class="huisdier-card-footer-right">
            <section class="oppas-button-container">
                <a href="/addReactie/{{$aanvraag->aanvraag_id}}" class="oppas-button" data-huisdier-soort="{{$aanvraag->aanvraagHuisdier->huisdierSoort->soort}}">Hier wil ik op passen!</a>
            </section>
        </section>

      </section>
    </section>
  </section>
  @if ($reviews === null)

  @else
  <section class="reviews-container js__reviewsContainer" id="js__reviewsContainer{{$aanvraag->aanvraagHuisdier->huisdier_id }}">
    @foreach ($reviews as $review)
      @if ($review->rating)
        @include('./components/non-breeze/review-card')
      @endif
    @endforeach
  @endif

  </section>
</section>
