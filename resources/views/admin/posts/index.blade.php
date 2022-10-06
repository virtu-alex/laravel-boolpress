@extends('layouts.app')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Lista Post</h1>
        <a class="btn btn-success" href="{{ route('admin.posts.create') }}">
            <i class="fa-solid fa-plus my-2"></i> Nuovo Post</a>
        <form action='' method="">
            <div class="input-group">
                <select name="category_id" id="custom-select">
                    <option value="">Tutte le categorie</option>
                    @foreach ($categories as $category)
                        <option @if ($category->id == $selected_category) selected @endif value={{ $category->id }}>
                            {{ $category->label }} </option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Filtra</button>
                </div>
            </div>
        </form>
    </header>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Autore</th>
                <th scope="col">Categoria</th>
                <th scope="col">Tags</th>
                <th scope="col">Slug</th>
                <th scope="col">Creato il </th>
                <th scope="col">Modificato il </th>
                <th>Bottoni</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</td>
                    <td>
                        @if ($post->user)
                            {{ $post->user->name }}
                        @else
                            Autore anonimo
                        @endif
                    </td>
                    <td>
                        @if ($post->category)
                            <span class="p-2 badge badge-{{ $post->category->color }}">{{ $post->category->label }}</span>
                        @else
                            Nessuna
                        @endif
                    </td>
                    <td>
                        @forelse($post->tags as $tag)
                            <span class="badge text-white p-1"
                                style="background-color: {{ $tag->color }}">{{ $post->label }}</span>
                        @empty
                            Nessun tag
                        @endforelse
                    </td>
                    <td>{{ $post->slug }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.show', $post) }}"><i
                                    class="fa-solid fa-eye"></i> </a>
                            {{-- @if ($post->user_id === Auth::id()) --}}
                            <a class="btn btn-sm btn-warning" href="{{ route('admin.posts.edit', $post) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">
                                <i class="fa-solid fa-trash"></i></button>
                            {{-- @endif --}}
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">
                        <h3 class="text-center">Nessun Post</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <nav class="mt-3">
        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif
    </nav>
    <section class="my-5" id="category-posts">
        <h2 class="mb-2">
            Posts by category:
        </h2>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-4">


                    <h3 class="my-3">{{ $category->label }} ({{ count($category->posts) }})</h3>
                    @forelse($category->posts as $post)
                        <p><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></p>

                    @empty
                        Nessun Post
                    @endforelse
                </div>
            @endforeach
        </div>
    </section>
@endsection
