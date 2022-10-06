@extends('layouts.app')

@section('content')
    <header>
        <h1>
            {{ $post->title }}
        </h1>
    </header>
    <div class="clearfix">
        @if ($post->image)
            <img width="150px" class="float-left mr-2 img-fluid" src="{{ asset('storage/' . $post->image) }}"
                alt="{{ $post->slug }}">
        @endif
        <p><strong>Categoria:</strong>
            @if ($post->category)
                {{ $post->category->label }}
            @else
                Nessuna
            @endif
        </p>
        <div class="mb-2">
            <strong>Tags:</strong>
            @forelse($post->tags as $tag)
                <span class="badge text-white p-1" style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
            @empty
                Nessun tag
            @endforelse
        </div>
        <p>{{ $post->content }}</p>
        <div>
            <strong>Creato il:</strong> {{ $post->created_at }}
        </div>
        <div>
            <strong>Modificato il:</strong> {{ $post->updated_at }}
        </div>
        <div>
            <strong>Autore:</strong>
            @if ($post->user)
                {{ $post->user->name }}
            @else
                Autore anonimo
            @endif
        </div>
    </div>
    <footer class="d-flex align-items-center justify-content-end">
        <div>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                <i class="fa solid fa-rotate-left m-2"></i>
            </a>
            @if ($post->user_id === Auth::id())
                <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}"><i
                        class="fa-solid fa-pencil m-2"></i>
                    Modifica</a>

        </div>
        <div class="d-flex align-items-center justify-content-end">
            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mx-2" type="submit">
                    <i class="fa-solid fa-trash m-2"></i>Elimina
                </button>
            </form>
            @endif
        </div>
    </footer>
@endsection
