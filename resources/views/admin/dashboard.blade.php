<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Beheerspagina</title>
</head>
<body>

<h1>Admin Dashboard</h1>

<p> Welkom {{auth()->user()->name}}</p>
<p> Je bent succesvol ingelogd als admin. Wat wil je doen?</p>

<a href="{{route('admin.users.index')}}">Beheer gebruikers</a><br> {{--!Verbindt door naar route admin.users.index--}}
<a href="#">Nieuws beheren</a><br>
<a href="#">FAQ beheren</a><br>
<a href="#">Contactberichten</a><br>
</body>
</html>
