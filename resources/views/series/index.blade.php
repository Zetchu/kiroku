<x-site-layout title="Series overview">

 @foreach($series as $show)
     <div class="mb-2 border-t border-orange-400">

     </div>
        <h2 class="text-2xl font-bold">
         {{$show -> name}}
     </h2>
    <p>      {{$show -> synopsis}}</p>



 @endforeach
</x-site-layout>
