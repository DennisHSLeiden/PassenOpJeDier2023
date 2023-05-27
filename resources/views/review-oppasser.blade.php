@section('title')
{{"PassenOpJeDier | Reactie"}}
@endsection

@extends('body')
@section('content')


<main class="content">

    <section">
        <form action="/reviewOppasser/{{$reviewOppasser->review_oppasser_id}}/geven" method="post">
        @csrf
            
            {{$reviewOppasser->review_oppasser_id}}

            <label for="review">geef hier je review</label>
            <input type="text" name="review" placeholder="Geef hier de review van je Oppasser">

            <label for="rating">Rating:</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>

            <input type="submit" value="voeg reactie toe">
        </form>

    </section> 

</main>

@endsection