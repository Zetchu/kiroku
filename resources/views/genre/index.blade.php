<x-site-layout title="Genres">
<ul>
@foreach($genres as $genre)
    <li>
       <a href="/genres/{{$genre->id}}">{{$genre -> name}} </a>
        <a href="/genres/{{$genre->id}}/edit">EDIT </a>
    </li>

@endforeach
</ul>
</x-site-layout>