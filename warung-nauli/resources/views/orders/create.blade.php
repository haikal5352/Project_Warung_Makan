@extends('layouts.app')

@section('title','Buat Pesanan')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-semibold mb-6">Form Pemesanan</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
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
                            <p class="text-gray-600 mt-1">Rp {{ number_format($menu->price,0,',','.') }}</p>
                        </div>
                        <input
                            type="number"
                            name="items[{{ $menu->id }}]"
                            class="mt-4 w-full border rounded px-2 py-1"
                            value="{{ old('items.'.$menu->id,0) }}"
                            min="0"
                        >
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Alamat Pengiriman</label>
            <textarea name="address" class="w-full border rounded px-3 py-2" required>{{ old('address') }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-semibold mb-1">Nomor Telepon</label>
            <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone') }}" required>
        </div>
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Pesan Sekarang</button>
    </form>
</div>
@endsection
