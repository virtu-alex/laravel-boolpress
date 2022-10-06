@if ($errors->any())
    <div class='alert alert-danger'>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
    </div>
@endif

@if ($post->exists)
    <form action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" method="POST" novalidate>
        @method('PUT')
    @else
        <form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="POST" novalidate>
@endif
@csrf
<div class="row">
    <div class="col-8">
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $post->title) }}" required minlenght="5" maxlenght="50">
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control" id="category_id" name="category_id">
                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category)
                    <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">
                        {{ $category->label }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea rows="12" class="form-control" id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
        </div>
    </div>
    <div class="col-11">
        <div class="form-group">
            <label for="image">Immagine</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
    </div>
    <div class="col-1">
        <img class="img-fluid pt-4"
            src="{{ $post->image ? asset('storage/' . $post->image) : 'https://media.istockphoto.com/vectors/thumbnail-image-vector-graphic-vector-id1147544807?k=20&m=1147544807&s=612x612&w=0&h=pBhz1dkwsCMq37Udtp9sfxbjaMl27JUapoyYpQm0anc=' }}"
            alt="{{$post->image ? $post->title : 'placeholder'}}">
    </div>
</div>
<hr />
@if (count($tags))
    <div class="col-12">
        <fieldset>
            <h5>Tags</h5>
            @foreach ($tags as $tag)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="tag-{{ $tag->label }}" name="tags[]"
                        value="{{ $tag->id }}" @if (in_array($tag->id, old('tags', $prev_tags ?? []))) checked @endif>
                    <label class="form-check-label" for="tag-{{ $tag->label }}">{{ $tag->label }}</label>
                </div>
            @endforeach
        </fieldset>
@endif
</div>
<footer class="d-flex justify-content-between">
    <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">
        <i class="fa-solid fa-rotate-left mr-2"></i> Indietro
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-floppy-disk mr-2"></i> Salva
    </button>
    {{-- Checkbox non utilizzato perche' in conflitto con la logica precedente --}}
    {{-- @if ($post->exists && $post->user_id === Auth::id())
        <div class="form-froup form-check">
            <input type="checkbox" class="form-check input" id="switch_author" name="switch_author" value="1"
                @if (old('switch_author'))  @endif>
            <label class="form-check-label" for="switch_author">Assegnami come autore
                </br>{{ $post->user->name }}</label>
        </div>
    @endif --}}

</footer>
</form>
