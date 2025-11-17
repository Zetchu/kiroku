<!DOCTYPE html>
<html>
<head>
{{--    <title>{{$title}}</title>--}}
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="white">
<header class="bg-teal-500 text-teal-50 mb-2">
    <div class="mx-auto w-2/3 flex gap-x-10">
        <a href="/" class="font-bold">Kiroku</a>

        <nav class="flex gap-x-4">
            <a href="/series">Series</a>
{{--            <a href="/genres">Genres</a>--}}
        </nav>


    </div>
</header>
<main>
    {{$slot}}
</main>
<footer class="bg-teal-100 mt-10 h-20">
    <div class="mx-auto w-2/3">
        some really important legal stuff
    </div>

</footer>
</body>
</html>