
<form action=" {{route('admin.news.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titel nieuwsitem: </label>
    <input type="text" id="title" name="title">

    <label for="image">Afbeelding bij nieuwsartikel: </label>
    <input type="file" id="image" name="image">

    <label for="content">Inhoud van het nieuwsfeit: </label>
    <textarea name="content" id="content" ></textarea>

    <label for="published_at">Datum van publicatie: </label>
    <input type="date" id="published_at" name="published_at">

    <button type="submit">Nieuws opslaan</button>

</form>

