@extends('layouts.app')

@section('title','Pesanan Berhasil')

@section('content')
<div class="container mx-auto px-6 py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">Terima Kasih!</h1>
    <p class="text-lg mb-6">Pesananmu sudah kami terima dan sedang diproses.</p>
    <a href="{{ route('home') }}" class="px-6 py-3 bg-green-500 text-white rounded hover:bg-green-600 transition">Kembali ke Menu</a>
</div>
@endsection
