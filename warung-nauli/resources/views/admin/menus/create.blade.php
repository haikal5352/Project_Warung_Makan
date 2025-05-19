@extends('layouts.admin')

@section('title','Tambah Menu')

@section('content')
<h1 class="mb-4">Tambah Menu</h1>

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Harga</label>
    <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
  </div>
  <div class="mb-3 form-check">
    <input type="hidden" name="is_available" value="0">
    <input type="checkbox" name="is_available" value="1" class="form-check-input" id="avail" checked>
    <label for="avail" class="form-check-label">Tersedia</label>
  </div>
  <div class="mb-3">
    <label class="form-label">Gambar</label>
    <input type="file" name="image" class="form-control">
  </div>
  <button class="btn btn-success">Simpan</button>
</form>
@endsection
