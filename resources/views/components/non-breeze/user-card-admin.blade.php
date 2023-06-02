@push('css')
<link rel="stylesheet" href="/css/profiel.css">
<link rel="stylesheet" href="/css/user-card.css">

@endpush


<section  class="Jouw-user-Card">

    <section class="row-information">

        @php
            $userInformation = $user->UserExtra_user_information()->first();
            $imagePath = $userInformation ? $userInformation->path : null;
        @endphp

        <figure class="card-image">
        @if (!$imagePath)
            <img src="/storage/img/no-picture/Profile_avatar_placeholder_large.png" alt="Profielfoto">
            <p>Er is helaas nog geen foto</p>
        @else
            <img src="/{{$profielOwner->UserExtra_user_information()->first()->path}}/{{$profielOwner->UserExtra_user_information()->first()->filename}}" alt="Profielfoto">
        @endif
        </figure>
        
        <section class="column-information user-card-information">
            <h1>{{$user->name}}</h1>
            <h1>{{$user->email}}</h1>
        </section>
        
    </section>
    
</section>