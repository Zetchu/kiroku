
<x-site-layout title="{{$genre->name}}">
<ul>
    @foreach($genre -> series as $series)

       <li>
           <a href="/series/{{$series->id}}">{{$series->name}}</a>


       </li>

    @endforeach
</ul>



</x-site-layout>

