@php
  // Hardcode sementara
  $rating       = 4.2;
  $reviewsCount = 127;

  // Hitung bintang penuh & kosong
  $fullStars  = floor($rating);
  $emptyStars = 5 - $fullStars;
@endphp

<section class="py-20 px-6 bg-white" data-aos="fade-up">
  <div class="max-w-3xl mx-auto text-center mb-8">
    <h2 class="text-3xl font-semibold">Rating Pelanggan</h2>
    <p class="text-gray-600 mt-2">Dilihat dari penilaian bintang (maksimal 5)</p>
  </div>

  <div class="text-center">
    <div class="flex justify-center items-center space-x-1 mb-2">
      {{-- Bintang penuh --}}
      @for ($i = 0; $i < $fullStars; $i++)
        <span class="text-4xl text-yellow-400">★</span>
      @endfor

      {{-- Bintang kosong --}}
      @for ($i = 0; $i < $emptyStars; $i++)
        <span class="text-4xl text-gray-300">★</span>
      @endfor
    </div>

    <p class="text-gray-700 font-medium">
      {{ number_format($rating, 1) }} dari 5  
      <span class="text-gray-500 text-sm">({{ $reviewsCount }} ulasan)</span>
    </p>
  </div>
</section>
