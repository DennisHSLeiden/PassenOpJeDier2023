<header class="header">
    <section class="header__left">
        <a href="{{'/dashboard'}}" class="header__logo">
            <img src="\img\logo.png" alt="PassenOpJeDier logo">
        </a>
    </section>
    <section class="header__center">
        @auth
            <h1>
                Welcome {{ Auth::user()->name }}
            </h1>
        @endauth
        @guest
            <h1>
                PassenOpJeDier!
            </h1>
        @endguest
    </section>

    <section class="header__right">
    @auth
        @php
            $role = auth()->user()->role;
        @endphp
        <section class= "logout-knop">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </section>

        <a href="/admin" class="adminbutton" id="js--adminButton" data-role="{{$role}}">
            Ga naar Admin Page
        </a>
    @endauth
</section>
</header>
