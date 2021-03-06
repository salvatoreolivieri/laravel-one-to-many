@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mt-3 mb-4">Modifica Post Esistente</h1>
        <h3>Stai modificando: "{{$post->title}}"</h3>
        <p style="font-size: 18px">Modifica i dati e fai click su <span style="color: blue; text-decoration: underline">invia</span> per aggiornare i dati del post presente nel database.</p>


        <div class="w-50">
            <form action="{{ route('admin.posts.update', $post)}}" method="POST">
                {{-- @csrf deve essere inserito in tutti i form altrimenti il form non è valido --}}
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label sc-label">Titolo Post</label>
                    {{-- il name dell'input deve corrispondere al nome della colonna della tabella di riferimento --}}
                    <input type="text" id="name" name="title"
                    value="{{$post->title }}"
                    class="form-control"
                    placeholder="Titolo Post">
                </div>

                <div class="mb-3">

                    <span style="display: inline-block" class="mb-2">Seleziona la categoria</span>

                    <select type="text"
                                id="category_id"
                                name="category_id"
                                class="form-control"
                                uncliccable>

                                <option value="null" selected>Nessuna categoria</option>

                                @foreach ($categories as $category )
                                    <option
                                    @if ($category->id == $post->category_id) selected @endif
                                    value="{{$category->id}}" >{{$category->name}}</option>
                                @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea
                    class="form-control"
                    name="content" id="content" cols="30" rows="10">{{ $post->content }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Invia</button>
            </form>
        </div>




    </div>

@endsection
