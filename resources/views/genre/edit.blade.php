
<x-site-layout title="Edit {{$genre->name}}">
<form action="/genres/{{$genre->id}}" method="POST">
    @csrf
    @method('PUT')
    <label>Genre</label>
    <input type="text" class="border border-black" name="name" value={{$genre->name}}  />
    <div class="mt-4">
    <button class="bg-gray-500 p-3"  type="submit">Update</button>
    </div>
</form>


</x-site-layout>

