
<x-site-layout title="{{$series->name}}">


    @foreach($series->genres as $genre)
        <a href="/genres/{{$genre->id}}" class="bg-orange-400">{{$genre->name}} </a>
    @endforeach
{{$series -> synopsis}}

    <h2 class="font-bold my-3">  COMMENTS</h2>

@if($series->comments->isNotEmpty())
<ul class="list-disc pl-4">
    @foreach($series->comments as $comment)
<li>
    <h2 class="font-bold">{{$comment -> user ->name}} </h2>   {{$comment -> content}}
</li>
    @endforeach
</ul>
    @else
    <p>No comments yet. Be the first one to say something :)    </p>
    @endif


</x-site-layout>

