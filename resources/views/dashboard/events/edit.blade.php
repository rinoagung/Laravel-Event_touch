@extends('dashboard.layouts.main')
@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Event</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/events/{{ $event->slug }}" enctype="multipart/form-data">
        @method("put")
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $event->title) }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required readonly value="{{ old('slug', $event->slug) }}">
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                @if (old('category_id', $event->category_id) == $category->id)
                    
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    
                @endif
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
            <input type="hidden" name="oldImage" value="{{ $event->image }}">
        @if ($event->image)
        <img src="{{ asset("storage/" . $event->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5">
        @endif
            <input class="form-control" type="file" name="image" id="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $event->body) }}">
            <trix-editor input="body" class="form-control @error('body') is-invalid @enderror"></trix-editor>
            @error('body')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="d-flex justify-content-between mt-4">
            <a href="/dashboard/events/{{ $event->slug }}" class="text-decoration-none p-1 border-bottom fs-5 d-flex" ><span data-feather="arrow-left" class="align-self-center me-1"></span> Back</a>
            <button type="submit" class="btn btn-primary">Update Event</button>
        </div>
    </form>
</div>
<div style="padding: 6rem"></div>

<script>
    const title = document.querySelector("#title")
    const slug = document.querySelector("#slug")

    title.addEventListener("change", function(){
        fetch("/dashboard/events/checkSlug?title=" + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    })

    document.addEventListener("trix-file-accept", function (e) {
        e.preventDefault();
    })

    
    function previewImage() {
        const image = document.querySelector('#image')
        const imgPreview = document.querySelector(".img-preview")
        imgPreview.style.display = "block"

        const ofReader = new FileReader()
        ofReader.readAsDataURL(image.files[0])
        ofReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
    }

</script>

@endsection