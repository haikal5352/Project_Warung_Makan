@extends('layouts.app')

@section('title','Menu')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-semibold mb-6">Menu Kami</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                @if($menu->image)
                    <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200"></div>
                @endif
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-semibold">{{ $menu->name }}</h3>
                        <p class="text-gray-600 mt-1">{{ $menu->description }}</p>
                        <p class="text-gray-800 font-bold mt-2">Rp {{ number_format($menu->price,0,',','.') }}</p>
                    </div>
                    <a href="{{ route('orders.create') }}" class="mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition text-center">Pesan</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
