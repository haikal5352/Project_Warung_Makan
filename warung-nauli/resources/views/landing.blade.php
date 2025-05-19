@extends('layouts.app')

@section('title','Beranda')

@section('content')
    {{-- Hero Section --}}
    <section class="min-h-screen flex flex-col justify-center items-center text-center bg-gradient-to-br from-yellow-300 to-yellow-300 px-4" data-aos="fade-in">
        <h1 class="text-5xl font-bold mb-4">Selamat Datang di Warung Makan Nauli!</h1>
        <p class="text-lg mb-6">Kami menyediakan makanan terbaik dan enak.</p>
        <a href="{{ route('orders.create') }}" class="px-6 py-3 bg-red-500 text-white rounded-full hover:bg-red-600 transition">Order Online</a>
    </section>

    {{-- Tentang Kami --}}
    <section class="py-20 px-6 bg-white" data-aos="fade-up">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-semibold mb-4">Tentang Kami</h2>
            <p class="text-gray-600">
                Rumah Makan Nauli berdiri sejak tahun 2019 dengan semangat menyajikan masakan rumahan (home made) yang lezat...
            </p>
        </div>
    </section>

    {{-- Galeri Menu --}}
    <section class="py-12 bg-gray-50" data-aos="zoom-in">
        <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach(\App\Models\Menu::where('is_available', true)->limit(6)->get() as $menu)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col" data-aos="flip-left" data-aos-delay="{{ $loop->index * 100 }}">
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
                        <a href="{{ route('orders.create') }}" class="mt-4 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition text-center">Pesan</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Testimonial --}}
    <section class="py-12 px-6 bg-white" data-aos="fade-up">
        @include('components.rating')
    </section>

    {{-- Footer --}}
    <footer class="text-center py-8 bg-yellow-200" data-aos="fade-in">
        <p class="text-sm mb-4">&copy; {{ date('Y') }} Warung Makan Nauli. All rights reserved.</p>
        <a href="https://wa.me/6281234567890" target="_blank" class="inline-block px-6 py-3 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
            Pesan via WhatsApp
        </a>
    </footer>

    {{-- AOS JS init --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
@endsection
