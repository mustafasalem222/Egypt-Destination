<x-layouts.app>
  <!-- Hero Section -->
  <section class="packages-bg py-32 text-white">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-bold mb-6">مكونات باقات الوجهات السياحية</h1>
      <p class="text-xl">اختر من بين أفضل الباقات السياحية المصممة خصيصاً لك</p>
    </div>
  </section>

  <style>
    .packages-bg {
      background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23b91c1c" width="1200" height="600"/><polygon fill="%23ef4444" points="0,600 300,200 700,400 1200,150 1200,600"/></svg>');
      background-size: cover;
      background-position: center;
    }
  </style>

  <!-- Grid of Package Components -->
  <div class="max-w-7xl mx-auto px-6 lg:px-12 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">

      @php
        $start = \Carbon\Carbon::parse($package->start_date);
        $end = \Carbon\Carbon::parse($package->end_date);
        $days = $start->diffInDays($end);
      @endphp

      <!-- Package Card Example -->
      <div class="package-card bg-white rounded-2xl shadow-lg overflow-hidden max-w-sm mx-auto lg:max-w-md">
        <!-- Destination Image -->
        <div class="relative h-48 md:h-60 w-full overflow-hidden">
          <img src="{{ asset('images/redsea.jpg ') }}" alt="{{ $package->title }}" class="w-full h-full object-cover">
          <!-- Price Badge -->
          <div class="absolute top-4 left-4 bg-red-600 text-white px-3 py-1 rounded-full text-sm font-bold shadow">
            EGP {{ $package->price }}
          </div>
        </div>

        <!-- Package Details -->
        <div class="p-5">
          <div class="flex items-center justify-between mb-3">
            <a href="/packages/{{ $package->slug }}" class="text-lg font-bold text-red-600">{{ $package->title }}</a>
            <div class="flex gap-0.5">
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
              <i class="fa-solid fa-star text-yellow-400 text-sm"></i>
            </div>
          </div>

          <div class="flex items-center justify-between mb-2 text-gray-600 text-sm">
            <span>📅 البداية</span>
            <span class="font-bold text-red-600">{{ $start->format('d-m-Y') }}</span>
          </div>
          <div class="flex items-center justify-between mb-4 text-gray-600 text-sm">
            <span>📅 النهاية</span>
            <span class="font-bold text-red-600">{{ $end->format('d-m-Y') }}</span>
          </div>
          <div class="flex items-center justify-center mb-4 bg-red-50 rounded-lg p-2">
            <span class="text-red-600 font-bold text-sm">
              {{ $days }} أيام / {{ $days - 1 }} ليالي
            </span>
          </div>

          <div class="flex gap-2">
            <button
              class="flex-1 font-bold border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
              احجز الآن
            </button>
            @php
              $isFavourite = $package->favourites
                ->where('user_id', Auth::id())
                ->where('favouritable_id', $package->id)
                ->first();
            @endphp

            <div x-data="{
        isFavourite: {{ $isFavourite ? 'true' : 'false' }},
        toggleFavourite(packageId) {
            let url = this.isFavourite 
                ? '{{ route('packages.unfavourite', $package->id) }}' 
                : '{{ route('packages.favourite', $package->id) }}';
            let method = this.isFavourite ? 'DELETE' : 'POST';

            fetch(url, {
                method: method,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'added') {
                    this.isFavourite = true;
                } else if (data.status === 'removed') {
                    this.isFavourite = false;
                }
            })
            .catch(err => console.error(err));
        }
    }">
              <button @click.prevent="toggleFavourite({{ $package->id }})"
                x-bind:class="isFavourite 
            ? 'px-3 py-2 border-2 border-red-600 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-all duration-300' 
            : 'px-3 py-2 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300'">
                <i x-bind:class="isFavourite ? 'fa-solid fa-heart text-lg' : 'fa-regular fa-heart text-lg'"></i>
              </button>
            </div>


          </div>
        </div>
      </div>

    </div>
  </div>
</x-layouts.app>