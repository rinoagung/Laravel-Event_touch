@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Events, {{ auth()->user()->name }}</h1>
</div>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-11" role="alert">
        {{ session('success') }}
      </div>
    @endif


<div class="table-responsive col-lg-11">
    <a href="/dashboard/events/create" class="text-decoration-none p-1 border-bottom" style="color: darkorange"><span data-feather="plus"></span> Create new event</a>

    <table class="table table-striped table-sm mt-3">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($events as $event)
              
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $event->title }}</td>
              <td>{{ $event->category->name }}</td>
              <td>
                  <a href="/dashboard/events/{{ $event->slug }}" class="badge bg-transparent shadow-sm"><span data-feather="eye" style="color: dodgerblue"></span></a>
                  <a href="/dashboard/events/{{ $event->slug }}/edit" class="badge bg-transparent shadow-sm"><span data-feather="edit-3" style="color: deeppink"></span></a>
                    <form action="/dashboard/events/{{ $event->slug }}" method="POST" class="d-inline">
                        @method("delete")
                        @csrf
                        <button class="badge bg-transparent border-0 shadow-sm" onclick="return confirm('are you sure?')"><span data-feather="trash-2" style="color: red"></span></button>
                    </form>
              </td>
            </tr>
            @endforeach
      </tbody>
    </table>
  </div>
@endsection