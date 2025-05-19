@extends('layouts.admin')

@section('title','Kelola Menu')

@section('content')
<h1 class="mb-4">Daftar Menu</h1>
<a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">Tambah Menu</a>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Harga</th>
      <th>Deskripsi</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menus as $menu)
      <tr>
        <td>{{ $menu->name }}</td>
        <td>Rp{{ number_format($menu->price,0,',','.') }}</td>
        <td>{{ $menu->description }}</td>
        <td>
          @if($menu->image)
            <img src="{{ asset('storage/'.$menu->image) }}" width="80">
          @endif
        </td>
        <td>
          <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-warning">Edit</a>
          <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
