@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Event Categories, {{ auth()->user()->name }}</h1>
</div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-7" role="alert">
        {{ session('success') }}
      </div>
    @endif


<div class="table-responsive col-lg-7">
    <a href="/dashboard/categories/create" class="text-decoration-none p-1 border-bottom" style="color: darkorange"><span data-feather="plus"></span> Create new category</a>

    <table class="table table-striped table-sm mt-3">
      <thead>
        <tr>
          <th scope="col" class="col-lg-1 ps-4">#</th>
          <th scope="col">Category Name</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($categories as $category)
              
          <tr>
              <td class="col-lg-1 ps-4">{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td class="col-lg-2 col-4">
                  <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-transparent shadow-sm"><span data-feather="edit-3" style="color: deeppink"></span></a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
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