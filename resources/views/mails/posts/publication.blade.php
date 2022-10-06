<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>
        {{ $post->title }}
    </h1>
    <h4>
        {{ $post->user->title }}
    </h4>
    {{-- <img src="{{ $post->image }}" alt=""> --}}
    <span>
        Data pubblicazione: {{ $post->created_at }}
    </span>
    <p>
        Categoria: {{ $post->category ? $post->category->label : 'Nessuna' }}
    </p>
    <p>
        Tags:
    </p>
    @forelse($post->tags as $tag)
        <div>{{ $tag->label }}</div>
    @empty
        Vuoto...
    @endforelse
</body>

</html>
