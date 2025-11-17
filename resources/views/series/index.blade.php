<x-site-layout title="Series overview">

 @foreach($series as $show)
     <div class="mb-2 border-t border-orange-400">

     </div>
        <a href="series/{{$show->id}}" class="text-2xl font-bold">
         {{$show -> name}}
     </a>
    <p>      {{$show -> synopsis}}</p>



 @endforeach
</x-site-layout>
