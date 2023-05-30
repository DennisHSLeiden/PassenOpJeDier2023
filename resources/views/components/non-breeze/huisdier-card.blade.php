@push('css')
<link rel="stylesheet" href="/css/huisdier-card.css">
@endpush

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
            <button class="card-button">Knop</button>
        </section>
    </section>
</section>
