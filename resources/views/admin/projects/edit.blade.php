@extends('layouts.admin')

@section('title', 'Aggiugni un nuovo progetto')

@section('content')
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Aggiorna {{ $project->title }}</h2>

        @include('partials.error')

        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Modifica il titolo del progetto</label>
                <input type="text" class="form-control
                       @error('title')
                        is-invalid
                       @enderror
                       " 
                       id="title" name="title" value="{{ old('name', $project->title) }}"
                >

                @error('title')    
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_path" class="label-control">Modifica la cover</label>
                <input type="file" id="cover_path" name="cover_path" class="form-control @error('cover_path') is-invalid @enderror">

                @error('cover_path')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="text-center">
                <img src="{{ $project->cover_path ? asset('storage/' . $project->cover_path) : '' }}" alt="{{ $project->cover_path ? "Cover di $project->title" : '' }}" id="preview-img" class="show-img">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Modifica la descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror"  id="description"  name="description" >{{ old('description', $project->description) }} </textarea>

                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Aggiungi</button>
            <button type="reset" class="btn btn-danger">Resetta</button>
        </form>
    </div>
@endsection