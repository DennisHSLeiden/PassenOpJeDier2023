@section('title')
{{"PassenOpJeDier | Admin"}}
@endsection

@extends('body')
@section('content')

@push('css')
<link rel="stylesheet" href="/css/admin.css">
@endpush

<main class="content">
    <h1>
        Welcome Admin
    </h1>

    <section class="row-information verdeling">
        <section class="cardsHolder AllUsers">
            <h1>Hier zijn alle gebruikers</h1>
            @foreach ($users as $user)
            <section class="row-information admin-card">
                @if ($user->role === 'User')
                @include('./components/non-breeze/user-card-admin')   
                <section class="blokkeer AdminButton">
                    <a href="/admin/{{$user->email}}/blokkeer">
                        @if ($user->blocked === 1)
                        Deblokkeer
                        @else
                        Blokkeer
                        @endif
                    </a>
                </section>
                @endif
            </section>
            @endforeach
        </section>
        <section class="cardsHolder AllAanvragen">
            <h1>Hier zijn alle aanvragen</h1>
            @foreach ($aanvragen as $aanvraag)
                <section class="row-information admin-card">
                    @include('./components/non-breeze/aanvraag-card-admin')

                    <form action="/admin/{{$aanvraag->aanvraag_id}}/verwijder" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Verwijder</button>
                    </form>
                </section>
            @endforeach
        </section>
    </section>


</main>

@endsection