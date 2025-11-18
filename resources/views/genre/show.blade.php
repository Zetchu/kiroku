
<x-site-layout title="{{$genre->name}}">
<ul>
    @foreach($genre -> series as $series)

       <li> <a href="/series/{{$series->id}}">{{$series->name}}</a></li>

    @endforeach
</ul>
{{--    @foreach(genres as $genre)--}}
{{--        <span class="bg-orange-400">{{$genre->name}} </span>--}}
{{--    @endforeach--}}
{{--{{$series -> synopsis}}--}}

{{--    <h2 class="font-bold my-3">  COMMENTS</h2>--}}

{{--@if($series->comments->isNotEmpty())--}}
{{--<ul class="list-disc pl-4">--}}
{{--    @foreach($series->comments as $comment)--}}
{{--<li>--}}
{{--    <h2 class="font-bold">{{$comment -> user ->name}} </h2>   {{$comment -> content}}--}}
{{--</li>--}}
{{--    @endforeach--}}
{{--</ul>--}}
{{--    @else--}}
{{--    <p>No comments yet. Be the first one to say something :)    </p>--}}
{{--    @endif--}}


</x-site-layout>

