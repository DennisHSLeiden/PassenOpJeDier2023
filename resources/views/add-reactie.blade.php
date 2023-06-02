@section('title')
{{ "PassenOpJeDier | Reactie" }}
@endsection

@push('css')
<link rel="stylesheet" href="/css/addReactie.css">
@endpush

@extends('body')
@section('content')
<main class="content">
    <section id="js--addReactieOverlay">
        <form action="/addReactie/{{$aanvraag->aanvraag_id}}/aanmaken" method="post" id="js--addReactieForm">
            @csrf
            <h1 class="reactie-title">Plaats een reactie</h1>
            <input type="hidden" name="aanvraag_id" value="{{$aanvraag->aanvraag_id}}">
            <div class="form-group">
                <textarea name="comment" class="form-textarea" placeholder="Voeg hier je reactie toe" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" id="js--addReactieBtnSubmit" class="btn-submit" value="Voeg reactie toe">
            </div>
        </form>
    </section>
</main>
@endsection
