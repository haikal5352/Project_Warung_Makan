@extends('layouts.admin')

@section('title','Edit Menu')

@section('content')
<h1 class="mb-4">Edit Menu</h1>

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('menus.update', $menu) }}" method="POST" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control">{{ old('description', $menu->description) }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $menu->price) }}" required>
  </div>
  <div class="mb-3 form-check">
    <input type="hidden" name="is_available" value="0">
    <input type="checkbox" name="is_available" value="1" class="form-check-input" id="avail" {{ $menu->is_available ? 'checked' : '' }}>
    <label for="avail" class="form-check-label">Tersedia</label>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar</label>
    @if($menu->image)
      <div class="mb-2"><img src="{{ asset('storage/'.$menu->image) }}" width="120"></div>
    @endif
    <input type="file" name="image" class="form-control">
  </div>
  <button class="btn btn-primary">Update</button>
</form>
@endsection
