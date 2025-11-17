
<x-site-layout title="{{$series->name}}">
{{$series -> synopsis}}

    <h2 class="font-bold my-3">  COMMENTS</h2>


<ul class="list-disc pl-4">
    @foreach($series->comments as $comment)
<li>
        {{$comment -> content}}
</li>
    @endforeach
</ul>


</x-site-layout>

