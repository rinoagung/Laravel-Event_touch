@extends('layouts.main')
      @section('judul')
      <h1>Event Categories</h1>

      @foreach ($categories as $category)
          
      <div class="card bg-dark text-white mt-5">
        <a href="/events?category={{ $category->slug }}" class="text-decoration-none link-light">
        <img src="https://source.unsplash.com/1200x200/?nature,water" class="card-img" alt="...">
        <div class="card-img-overlay w-100 px-0 align-items-center">
            <h2 class=" position-absolute card-title text-center m-0 top-50 start-50 translate-middle w-100 py-2 fs-3" style="background-color: rgba(0, 0, 0, 0.7)">{{ $category->name }}</h2>
        </div>
        </a>
      </div>
      @endforeach
      <div class="mb-5"></div>
      @endsection
