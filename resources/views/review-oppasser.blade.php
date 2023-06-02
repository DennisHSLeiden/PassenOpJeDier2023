@section('title')
{{ "PassenOpJeDier | Reactie" }}
@endsection

@push('css')
<link rel="stylesheet" href="/css/review-oppasser.css">
@endpush

@extends('body')
@section('content')
<main class="content">
    <section>
        <form action="/reviewOppasser/{{$reviewOppasser->review_oppasser_id}}/geven" method="post">
            @csrf
            <h1 class="review-title">Plaats een review</h1>
            <input type="hidden" name="review_oppasser_id" value="{{$reviewOppasser->review_oppasser_id}}">
            <section class="form-group">
                <textarea name="review" class="form-textarea" placeholder="Voeg hier je review van de oppasser toe" required></textarea>
            </section>
            <section class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" id="rating" name="rating" min="1" max="5" required>
            </section>
            <section class="form-group">
                <input type="submit" class="btn-submit" value="Voeg review toe">
            </section>
        </form>
    </section>
</main>
@endsection
