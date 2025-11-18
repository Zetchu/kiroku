
<x-site-layout title="Add new genre">
<form action="/genres" method="post">
    @csrf
    <label>Genre</label>
    <input type="text" name="name" placeholder="Add genre name" class="border border-black"/>
    <div class="mt-4">
    <button class="bg-gray-500 p-3"  type="submit">Create</button>
    </div>
</form>


</x-site-layout>

