
<form action={{ route('admin.news.update', $news) }} method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titel nieuwsitem: </label>
    <input type="text" id="title" name="title" value="{{ old('title', $news->title) }}">

    <label for="image">Afbeelding bij nieuwsartikel: </label>
    <input type="file" id="image" name="image">

    <label for="content">Inhoud van het nieuwsfeit: </label>
    <textarea name="content" id="content" > {{ old('content', $news->content) }}</textarea>

    <label for="published_at">Datum van publicatie: </label>
    <input type="date" id="published_at" name="published_at" value=" {{ old('published_at',$news->published_at) }}">

    <button type="submit">Nieuws opslaan</button>
</form>
