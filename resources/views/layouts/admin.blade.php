<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/admin.css')
</head>
<body>

<nav class="admin-navbar">
    <div class="admin-nav-left">
        <a href=" {{ route('admin.dashboard') }} " class="admin-logo">Admin Panel</a>

        <a href=" {{ route('admin.users.index') }}">Gebruiksbeheer</a>
        <a href=" {{ route('news.index') }} ">Nieuwsbeheer</a>
        <a href="#">FAQ</a>
        <a href="#">Contact</a>
    </div>

    <div class="admin-nav-right">
        <span class="admin-user">Ingelogd als: {{ auth()->user()->name }}</span>

        <form action=" {{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="logout-link">Uitloggen</button>
        </form>
    </div>
</nav>

<div class="admin-content">
    @yield('content')
</div>

</body>
</html>
