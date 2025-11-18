<x-site-layout title="Genres">
<ul>
@foreach($genres as $genre)
    <li>
       <a href="/genres/{{$genre->id}}">{{$genre -> name}} </a>
        <a href="/genres/{{$genre->id}}/edit">EDIT </a>

        <form action="/genres/{{$genre->id}}" method="POST">
            @csrf
            @method("DELETE")
            <button>DELETE </button>

        </form>

    </li>

@endforeach
</ul>
</x-site-layout>