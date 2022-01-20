@extends('dashboard.layouts.main')
@section('container')

<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">

            <h2 class="my-3">{{ $event->title }}</h2>
            <div class="d-flex">
                <a href="/dashboard/events" class="text-decoration-none p-1 border-bottom" ><span data-feather="arrow-left"></span> Back</a>
                <a href="/dashboard/events/{{ $event->slug }}/edit" class="text-decoration-none p-1 border-bottom ms-3" style="color: limegreen"><span data-feather="edit"></span> Edit</a>
                <form action="/dashboard/events/{{ $event->slug }}" method="POST" class="ms-auto">
                    @method("delete")
                    @csrf
                    <button class="text-decoration-none p-1 border-0 border-bottom bg-transparent" onclick="return confirm('are you sure?')" style="color: red"><span data-feather="trash-2"></span> Delete</button>
                </form>

            </div>

            @if ($event->image)
            <div style="max-height: 258px; overflow:hidden;">
                <img src="{{ asset("storage/" . $event->image) }}" class="card-img-top mt-4" alt="{{ $event->category->slug }}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x500/?nature,water" class="card-img-top mt-4" alt="{{ $event->category->slug }}">
            @endif

            
            <article class="my-3 fs-5">
                {!! $event->body !!}
            </article>

        </div>
    </div>
</div>
@endsection