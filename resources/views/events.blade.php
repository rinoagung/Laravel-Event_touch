@extends('layouts.main')
      @section('judul')

        @if ($events->count())  {{-- menghasilkan nilai > 0 jika "true" dan 0 jika "false" --}}

        
        <div class="row d-flex justify-content-between">
            <div class="col-md-6">
                <h1 class="mb-5">{{ $title }}</h1>
            </div>
            
                <div class="col-md-6 mt-2">
                <form action="/events"> {{-- default menggunakan GETS --}}
                    @if (request("category"))
                    <input type="hidden" name="category" value="{{ request("category") }}">
                    @endif
                    @if (request("author"))
                    <input type="hidden" name="author" value="{{ request("author") }}">
                    @endif
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request("search") }}">
                        <button class="btn btn-secondary" type="submit">Search</button>
                      </div>
                </form>
            </div>
        </div>
        @if (request("search"))
        <div class="mb-3">
            <a href="/events" class="text-decoration-none fs-4" >&laquo;  Back</a>
        </div>
        @endif


        <div class="card mb-3">
            @if ($events[0]->image)
            <div style="max-height: 200px; overflow:hidden;">
                <img src="{{ asset("storage/" . $events[0]->image) }}" class="card-img-top" alt="{{ $events[0]->category->slug }}">
            </div>
            @else
            <img src="https://source.unsplash.com/1200x200/?nature,water" class="card-img-top" alt="{{ $events[0]->category->slug }}">
            @endif
            <div class="card-body text-center">
              <h3 class="card-title">
                  
                  <a href="/events/{{ $events[0]->slug }}" class="text-decoration-none link-dark">{{ $events[0]->title }}</a>

                </h3>
              <p>
                  <small class="text-muted"> By. <a href="/events?author={{ $events[0]->author->username }}" class="text-decoration-none">{{ $events[0]->author->name }}</a> in <a href="/events?category={{ $events[0]->category->slug }}" class="text-decoration-none">{{ $events[0]->category->name }}</a> {{ $events[0]->created_at->diffForHumans() }}
                  </small>
                </p>
              <p class="card-text">{{ $events[0]->excerpt }}</p>
              <a href="/events/{{ $events[0]->slug }}" class="text-decoration-none btn btn-sm btn-outline-info rounded-pill">Read more..</a>

            </div>
          </div>


        <div class="container pb-5">

            <div class="row justify-content-evenly">
                
                @foreach ($events->skip(1) as $event)
                    <div class="card mb-3 mx-2 p-0" style="max-width: 540px;">
                        <div class="row g-0 h-100">
                            <div class="col-md-4 .g-col-6">
                                <div class="position-absolute px-2 py-1" style="background-color: rgba(0, 0, 0, 0.5)">
                                    <a href="/events?category={{ $event->category->slug }}" class="link-light text-decoration-none">
                                        {{ $event->category->name }}
                                    </a>
                                </div>
                                    @if ($event->image)
                                    <img src="{{ asset("storage/" . $event->image) }}" class="img-fluid rounded-start h-100" alt="{{ $event->category->slug }}">
                                    @else
                                    <img src="https://source.unsplash.com/200x200/?nature,water" class="img-fluid rounded-start h-100" alt="...">
                                    @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="/events/{{ $event->slug }}" class="text-decoration-none link-dark">{{ $event->title }}</a></h5>
                                    <small class="text-muted">
                                        <p>By. <a href="/events?author={{ $event->author->username }}" class="text-decoration-none">{{ $event->author->name }}</a>   {{ $event->created_at->diffForHumans() }}</p>
                                    </small>
                                    <p class="card-text">{{ $event->excerpt }}</p>
                                        <a href="/events/{{ $event->slug }}" class="text-decoration-none position-absolute bottom-0 end-0 p-1">Read more..</a>
                                </div>
                            </div>
                        </div>
                    </div>
          @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $events->links() }}
    </div>

    @else
    <p class="text-center fs-2">Event not found.</p>
    <div class="d-flex w-100 justify-content-around">
        <a href="/events" class="text-decoration-none mb-3 fs-4" >&laquo;  Back</a>
        <a href="/categories" class="pb-5 text-decoration-none fs-4">Categories</a>
    </div>
    
    @endif
      @endsection

      

