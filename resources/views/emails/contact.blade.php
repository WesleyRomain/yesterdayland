<p><strong>Naam:</strong> {{ $data['name'] }}</p> {{--Toont de ingevulde naam--}}
<p><strong>Email:</strong> {{ $data['email'] }}</p> > {{--Toont de ingevulde email--}}
<p><strong>Bericht:</strong></p> {{--Toont het bericht--}}
<p>{{ $data['message'] }}</p>

{{----Kijken in storage-> log onderaan om te kijken of een mail gestuurd wordt. Admin is immers een fictieve beheerder (geen echte mail gestuurd) + .env aanpassen}}


