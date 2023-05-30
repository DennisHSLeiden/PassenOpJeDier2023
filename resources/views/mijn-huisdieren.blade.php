@section('title')
{{"PassenOpJeDier | Mijn Huisdieren"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/mijnhuisdieren.css">
@endpush

@push('js')
<script src="/js/huisdieren.js"></script>
@endpush


<main class="content">
    <section class= "frontPageHuisdieren">
        @foreach ($huisdieren as $huisdier)
        @include('./components/non-breeze/huisdier-card')
        @endforeach
    
        <section class="add-huisdier-button" id="js--addHuisdierBtn">
            <span>Voeg Nieuw Huisdier Toe</span>
        </section>
        @include('./components/non-breeze/add_huisdier_overlay')
    </section>
</main>

@endsection