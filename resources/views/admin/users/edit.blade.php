@if($errors->any())
    <div style="color:red;">
        <ul style="list-style-type: none">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('admin.users.update', $user)}}" method="post"> {{--Verstuurt gegevens naar admin.users.update--}}
    @csrf
    @method('PUT') {{--HTML ondersteunt enkel GET/POST, geen PUT (updaten data), daarom hier vermelden zodat juiste actie wordt aangeroepen--}}

    <label for="naam">Naam: </label>
    <input type="text" id="naam" name="name" value="{{old('name', $user->name)}}"><br> {{--Lees: toon eerst de vorige ingevulde waarde, lukt het niet? Gebruik dan de waarden van de database.--}}

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="{{old('email', $user->email)}}"><br>

    <label for="admin">Wil je van de gebruiker een admin. maken?</label>
    <input type="checkbox" id="admin" name="is_admin" value="1"
           {{old('is_admin', $user->is_admin) ? 'checked' : ''}}><br>

    <button type="submit">Gebruiker aanpassen</button>
</form>
