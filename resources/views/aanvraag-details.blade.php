@section('title')
{{"PassenOpJeDier | Aanvraag"}}
@endsection

@extends('body')
@section('content')


<main class="content">

    <section>
        <h1> Dit zijn de reacties op een aanvraag voor {{$huisdier->naam}} </h1>
        @foreach ($reacties as $reactie)
            @if(is_null($reactie->antwoord))
                <section>
                    <p> {{$reactie->comment}} </p>
                
                    <form action="../reageer/{{$reactie->reactie_id}}" method="POST" id="js--reageer">
                    @csrf

                        <label for="True">Oppas Aannemen</label><br>
                        <input type="radio" id='True' name="antwoord" value='1'>

                        <label for="False">Oppas Weigeren</label><br>
                        <input type="radio" id='False' name="antwoord" value='0'>


                        <input type="submit" id="js--reageer" value="Voeg reactie toe">
                    </form>

                </section>
            @endif
        @endforeach
    </section> 

</main>

@endsection



