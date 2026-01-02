<nav class="navbar">
    <a href="/">Home</a>

    @auth {{--Als gebruiker geauthenticeerd is, dan kan de gebruiker naar zijn profiel gaan en het profiel bewerken.--}}
        <a href="{{ route('profile.show', auth()->user())}} ">Mijn profiel</a>
        <a href="{{ route('profile.edit')}} ">Profiel bewerken</a>

    @endauth

    <a href="/news">Nieuws</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact</a>

    @guest {{--Als de user niet ingelogd is, toon dan registreren of login zodat de gebruiker ook zijn profiel kan bekijk en inloggen (na authenticatie)--}}
        <a href="{{ route('login') }}">Login</a>
        <a href=" {{ route('register') }}">Registreren</a>
    @endguest

    @auth
        @if(auth()->user()->is_admin) {{--Als gebruiker ook een admin is, toon dan nog voor de logout knop om te redirecten naar de adminpagina.--}}
            <a href="/admin">Admin</a>
        @endif

        <form action="{{ route('logout') }}" method="POST" style="display:inline;"> {{--Button om inlogsessie te beïndigen via POST-functie(logout)--}}
            @csrf
            <button type="submit" class="logout-btn">Uitloggen</button>
        </form>
    @endauth
</nav>
