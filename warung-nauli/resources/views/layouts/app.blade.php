<!DOCTYPE html>
<html lang="en">

<!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Warung Makan Nauli - @yield('title')</title>

  {{-- Tailwind CSS --}}
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800">

  {{-- Navbar --}}
  <nav class="bg-yellow-300 shadow">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="{{ route('landing') }}" class="text-2xl font-bold">Nauli</a>
      <div class="space-x-4">
        <a href="{{ route('landing') }}" class="hover:underline">Home</a>
        <a href="{{ route('menu.index') }}" class="hover:underline">Menu</a>
        @auth
          @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
          @else
            <a href="{{ route('orders.create') }}" class="hover:underline">Order</a>
          @endif
          <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="hover:underline">Logout</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="hover:underline">Login</a>
          <a href="{{ route('register') }}" class="hover:underline">Register</a>
        @endauth
      </div>
    </div>
  </nav>

  {{-- Main Content --}}
  <main>
    @yield('content')
  </main>

<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({ duration: 800, once: true });
</script>

</body>
</html>
