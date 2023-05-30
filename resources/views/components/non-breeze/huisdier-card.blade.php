@push('css')
<link rel="stylesheet" href="/css/huisdier-card.css">
@endpush
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
        <h1>Mijn naam is {{ $huisdier->naam }}</h1>
        <p>Eigenaar: {{ $huisdier->email }}</p>
      </section>
      <section class="card-content">
        <!-- Inhoudsinformatie hier -->
      </section>
      <section class="card-footer">
        <a class="card-button js__toggleReview" id="js__toggleReview{{ $huisdier->huisdier_id }}">Show Reviews</a>
      </section>
    </section>
  </section>
  @php
  $reviews = $huisdier->allReviewsHuisdier()->get();
  @endphp
  <section class="reviews-container js__reviewsContainer" id="js__reviewsContainer{{ $huisdier->huisdier_id }}">
    @foreach ($reviews as $review)
      @if ($review->rating)
        @include('./components/non-breeze/review-card')
      @endif
    @endforeach

  </section>
</section>
