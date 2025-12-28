<h1>Gebruiksbeheer</h1>

@if(session('success'))
    <div style="color:green;">{{session('success')}}</div>
@endif

@if(session('error'))
    <div style="color:red;">{{session('error')}}</div>
@endif
<ul>
@foreach($users as $user)
    <li>{{$user->name}} ({{$user->email}})
        <a href="{{route('admin.users.edit', $user)}}">Bewerken</a>
        <form action="{{route('admin.users.destroy', $user)}}" method="POST">
            @csrf {{--Beveiliging met unieke token--}}
            @method('DELETE') {{--Methode = delete--}}
            <button type="submit">verwijderen</button> {{--In loop gezet zodat alle gebruikers verwijderd kunnen worden en niet enkel de laatste.--}}
        </form>
    </li>
@endforeach
</ul>

<a href="{{route('admin.users.create')}}">Nieuwe gebruiker aanmaken</a>

{{--
Link voor aanmaken nieuwe gebruiker.
Verwijst direct door naar de route admin.users.create.
Die route is gedefinieerd door in de UserController, de functie create aan te roepen.
--}}



