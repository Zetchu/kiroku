<x-site-layout title="Genres">
<ul>
@foreach($genres as $genre)
    <li>{{$genre -> name}}</li>

@endforeach
</ul>
</x-site-layout>