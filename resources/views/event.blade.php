@extends('layouts.main')
@section('judul')

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2 class="my-3">{{ $event->title }}</h2>
                <p>By. <a href="/events?author={{ $event->author->username }}" class="text-decoration-none">{{ $event->author->name }}</a> in <a href="/events?category={{ $event->category->slug }}" class="text-decoration-none">{{ $event->category->name }}</a></p>
                
            @if ($event->image)
            <div style="max-height: 258px; overflow:hidden;">
                <img src="{{ asset("storage/" . $event->image) }}" class="card-img-top" alt="{{ $event->category->slug }}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x500/?nature,water" class="card-img-top" alt="{{ $event->category->slug }}">
            @endif

                <article class="my-3 fs-5">
                    {!! $event->body !!}
                </article>
                <a href="/events" class="text-decoration-none mb-3 fs-4" >&laquo;  Back</a>

                
            </div>
        </div>
    </div>
@endsection