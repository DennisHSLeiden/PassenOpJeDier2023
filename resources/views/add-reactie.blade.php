@section('title')
{{"PassenOpJeDier | Reactie"}}
@endsection

@extends('body')
@section('content')


<main class="content">

    <section id="js--addReactieOverlay">
        <form action="/addReactie/{{$aanvraag->aanvraag_id}}/aanmaken" method="post" id="js--addReactieForm">
        @csrf
            
            {{$aanvraag->aanvraag_id}}

            

            <label for="comment">geef hier je reactie</label>
            <input type="text" name="comment" placeholder="Geef hier de comment van je huisdier">

            <input type="submit" id="js--addReactieBtnSubmit" value="voeg reactie toe">
        </form>

    </section> 

</main>

@endsection