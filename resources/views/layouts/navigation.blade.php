<nav class="navbar">
    <a href="/">Home</a>

    @auth
        <a href="{{ route('profile.show', auth()->user())}} ">Mijn profiel</a>
        <a href="{{ route('profile.edit')}} ">Profiel bewerken</a>

    @endauth

    <a href="/news">Nieuws</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact</a>

    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href=" {{ route('register') }}">Registreren</a>
    @endguest

    @auth
        @if(auth()->user()->is_admin)
            <a href="/admin">Admin</a>
        @endif

        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Uitloggen</button>
        </form>
    @endauth
</nav>
