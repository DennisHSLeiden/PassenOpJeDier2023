@section('title', 'PassenOpJeDier | ReviewHuisdier')

@push('css')
<link rel="stylesheet" href="/css/review-huisdier.css">
@endpush


@extends('body')
@section('content')

<main class="content">
    <section>
        <form action="/reviewHuisdier/{{$reviewHuisdier->review_huisdier_id}}/geven" method="post">
            @csrf
            <h1 class="review-title">Plaats een review</h1>
            <input type="hidden" name="review_huisdier_id" value="{{$reviewHuisdier->review_huisdier_id}}">
            <div class="form-group">
                <textarea name="review" class="form-textarea" placeholder="Voeg hier je review van de huisdier toe" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Voeg review toe">
            </div>
        </form>
    </section>
</main>

@endsection