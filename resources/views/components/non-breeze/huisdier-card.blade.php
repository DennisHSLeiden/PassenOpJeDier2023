@push('css')
<link rel="stylesheet" href="/css/huisdier-card.css">
@endpush

@php
$reviews = $huisdier->allReviewsHuisdier()->get();
if ($reviews->isEmpty()) {
    $reviews = null;
}
@endphp

<section>
  <section class="card">
    <section class="card-left">
      <section class="slideshow-container">
        <section class="slideshow">
          @foreach ($huisdier->allFotosHuisdier()->get() as $index => $foto)
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
        <h2>Mijn naam is {{ $huisdier->naam }}</h2>
      </section>
      <section class="card-content">
        <p>Eigenaar: {{ $huisdier->email }}</p>
        <p>Ik ben een {{$huisdier->huisdierSoort()->first()->soort}}</p>
        <p> Informatie over mij:</p>
        <p>{{$huisdier->generieke_informatie}}</p>
      </section>
      <section class="card-footer">
        <section>
        @if ($reviews === null)
            <p class="card-button js__toggleReview">Er zijn nog geen Reviews</p>
        @else
            <a class="card-button js__toggleReview" id="js__toggleReview{{$huisdier->huisdier_id }}">Show Reviews</a>
        @endif
        </section>
        <section class="huisdier-card-footer-right">
          <h1> Voeg een extra foto van je huisdier toe! </h1>
          <form action="mijnHuisdieren/voegFotoToe/{{$huisdier->huisdier_id}}" method="POST" enctype="multipart/form-data">
              @csrf
              <section class="file-input-container">
                  <input type="file" name="foto" id="foto" accept="image/*" class="file-input" onchange="updateFileName(this)">
                  <label for="foto" class="file-label">Bestand kiezen</label>
              </section>
              <button type="submit">Opslaan</button>
          </form>
        </section>
      </section>
    </section>
  </section>
  @if ($reviews === null)

  @else
  <section class="reviews-container js__reviewsContainer" id="js__reviewsContainer{{$huisdier->huisdier_id }}">
    @foreach ($reviews as $review)
      @if ($review->rating)
        @include('./components/non-breeze/review-card')
      @endif
    @endforeach
  @endif

  </section>
</section>
