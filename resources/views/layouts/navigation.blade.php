<nav class="navbar">
    <a href="/">Home</a>

    @auth
        <a href="{{ route('profile.show', auth()->user())}} ">Mijn profiel</a>
        <a href="{{ route('profile.edit')}} ">Profiel bewerken</a>

    @endauth

    <a href="/news">Nieuws</a>
    <a href="/faq">FAQ</a>
    <a href="/contact">Contact</a>

    @auth
        @if(auth()->user()->is_admin)
            <a href="/admin">Admin</a>
        @endif
    @endauth
</nav>
