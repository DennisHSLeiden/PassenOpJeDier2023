<header class="header">
    <a href="{{'/dashboard'}}" class="header__logo">
        <img src="\img\logo.png" alt="PassenOpJeDier logo">
    </a>

    <section class="header__center">
        @auth
            <h1>
                Welcome {{ Auth::user()->name }}
            </h1>
        @endauth
    </section>

    <section class="header__right">
    @auth
        @php
            $role = auth()->user()->role;
        @endphp

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                            this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-responsive-nav-link>
        </form>

        <a href="/admin" class="adminbutton" id="js--adminButton" data-role="{{$role}}">
            Ga naar Admin Page
        </a>
    @endauth
</section>
</header>
