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
    <section class="add-button" id="js--addHuisdierBtn">
        <span>Voeg Nieuw Huisdier Toe</span>
    </section>
    @include('./components/non-breeze/add_huisdier_overlay')

    @foreach ($huisdieren as $huisdier)
    @include('./components/non-breeze/huisdier-card')
    @endforeach


</main>

@endsection