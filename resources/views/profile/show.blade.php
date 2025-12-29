<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profiel van {{$user->username ?? $user->name}}</title> {{--Dynamisch tonen van username in de titel, indien geen username => naam tonen uit database--}}
</head>
<body>
<h1>Profiel van {{$user->username ?? $user->name}}</h1> {{--Idem vorige comment.--}}

@if($user->profile_picture) {{--Als er een profielfoto aanwezig is, toon hem dan.--}}
    <img src="{{asset('storage/'. $user->profile_picture)}}"
         alt="Profielfoto"
         width="150">
@endif

<p><strong>Verjaardag</strong></p> {{--Verjaardag tonen--}}
{{$user->birthday ?? 'Niet ingevuld.'}}

<p>Over mij</p> {{--Over mij tonen--}}
{{$user->about_me ?? 'Geen informatie opgegeven.'}}
</body>
</html>
