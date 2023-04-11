@push('css')
<link rel="stylesheet" href="/css/user-card.css">
@endpush


<section  class="Jouw-user-Card">

    
    <section class="row-information">
        
        <figure class="card-image">
            <img src="/img/Profile_avatar_placeholder_large.png" alt="Foto van jezelf">
        </figure>
        
        <section class="column-information user-card-information">
            <h1>{{$user->name}}</h1>
            <h1>{{$user->email}}</h1>
        </section>
        
    </section>
    
</section>