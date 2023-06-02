@section('title')
{{"PassenOpJeDier | Mijn Huisdieren"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/alleAanvragen.css">
@endpush

@push('js')
<script src="/js/aanvragen.js"></script>
@endpush


<main class="alle-aanvragen-content">
    <section class="filter-container">
        <form id="filterForm">
            <section id="checkboxes" class="checkboxes">
                <label><input type="checkbox" name="soort" value="kat" onchange="filterAanvragen()">Kat</label>
                <label><input type="checkbox" name="soort" value="hond" onchange="filterAanvragen()">hond</label>
                <label><input type="checkbox" name="soort" value="cavia" onchange="filterAanvragen()">Cavia</label>
                <label><input type="checkbox" name="soort" value="rat" onchange="filterAanvragen()">Rat</label>
                <label><input type="checkbox" name="soort" value="konijn" onchange="filterAanvragen()">Konijn</label>
                <label><input type="checkbox" name="soort" value="papagaai" onchange="filterAanvragen()">Papagaai</label>
            </section>
        </form>
    </section>
    <section class="alle-aanvragen-container">
        @foreach ($aanvragen as $aanvraag)
            @include('./components/non-breeze/reactie-card')
        @endforeach
        <section id="geenAanvragenTekst" style="display: none;">
            Er zijn helaas geen aanvragen voor deze soorten dieren.
        </section>
    </section>

</main>

@endsection