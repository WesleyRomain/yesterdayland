<h1>Gebruiksbeheer</h1>

@if(session('success'))
    <div style="color:green;">{{session('success')}}</div>
@endif

@if(session('error'))
    <div style="color:red;">{{session('error')}}</div>
@endif
<ul>
@foreach($users as $user)
    <li>{{$user->name}} ({{$user->email}})</li>
        <form action="{{route('admin.users.destroy', $user)}}" method="POST">
            @csrf {{--Beveiliging met unieke token--}}
            @method('DELETE') {{--Methode = delete--}}
            <button type="submit">verwijderen</button> {{--In loop gezet zodat alle gebruikers verwijderd kunnen worden en niet enkel de laatste.--}}
        </form>
@endforeach

</ul>


