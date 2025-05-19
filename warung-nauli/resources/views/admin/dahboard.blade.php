@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
<h1 class="mb-4">Dashboard Admin</h1>

<div class="row">
  <div class="col-md-6">
    <div class="card text-white bg-primary mb-3">
      <div class="card-header">Total Menu</div>
      <div class="card-body">
        <h5 class="card-title">{{ \App\Models\Menu::count() }}</h5>
        <a href="{{ route('menus.index') }}" class="btn btn-light btn-sm">Kelola Menu</a>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card text-white bg-success mb-3">
      <div class="card-header">Total Pesanan</div>
      <div class="card-body">
        <h5 class="card-title">{{ \App\Models\Order::count() }}</h5>
        <a href="{{ route('admin.orders') }}" class="btn btn-light btn-sm">Lihat Pesanan</a>
      </div>
    </div>
  </div>
</div>
@endsection
