<x-layouts.app>
  <section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-6 lg:px-12">

      <!-- Package Header -->
      <div class="bg-white shadow-lg rounded-2xl overflow-hidden mb-8">
        <div class="relative h-64">
          <img src="{{ asset($package->image_url) ?? 'https://via.placeholder.com/800x400' }}"
            alt="{{ $package->title }}" class="w-full h-full object-cover">
          <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white">
            <h1 class="text-4xl font-bold">{{ $package->title }}</h1>
          </div>
        </div>

        <div class="p-6">
          <a href="/destinations/{{ $package->destinations()->first()->slug ?? '#'  }}"
            class="text-2xl block font-bold text-red-600 mb-3">
            {{ $package->destinations()->first()->name ?? 'وجهة غير محددة' }}
          </a>
          <p class="text-gray-700 mb-4">{{ $package->description ?? 'لا يوجد وصف متاح' }}</p>

          <div class="grid grid-cols-2 gap-6 mb-6 text-gray-600">
            <div>
              <span class="font-bold">📅 البداية:</span>
              {{ \Carbon\Carbon::parse($package->start_date)->format('d-m-Y') }}
            </div>
            <div>
              <span class="font-bold">📅 النهاية:</span>
              {{ \Carbon\Carbon::parse($package->end_date)->format('d-m-Y') }}
            </div>
            <div>
              <span class="font-bold">💰 السعر:</span>
              {{ $package->price }} EGP
            </div>
            <div>
              <span class="font-bold">⏳ المدة:</span>
              {{ \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date)) }}
              أيام
            </div>
          </div>
        </div>
      </div>

      <!-- Booking Form -->
      <div class="bg-white shadow-lg rounded-2xl p-6 mb-8">
        <h3 class="text-xl font-bold mb-4 text-gray-800">📌 احجز رحلتك الآن</h3>
        <form action="/booking/{{ $package->slug }}" method="GET" class="space-y-4">
          @csrf
          <input type="hidden" name="package_id" value="{{ $package->slug }}">

          <!-- <div>
            <label class="block text-gray-700 mb-1">تاريخ الوصول</label>
            <input type="date" name="check_in" class="w-full border rounded-lg px-3 py-2">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">تاريخ المغادرة</label>
            <input type="date" name="check_out" class="w-full border rounded-lg px-3 py-2">
          </div>

          <div>
            <label class="block text-gray-700 mb-1">عدد الأشخاص</label>
            <input type="number" name="guests" min="1" class="w-full border rounded-lg px-3 py-2">
          </div> -->

          <!-- Package Actions -->
          <div class="flex gap-2">

            <button
              class="flex-1 font-bold border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
              احجز الآن
            </button>

            <!-- زر المفضلة -->
            <form method="GET">
              @csrf
              <input type="hidden" name="package_slug" value="{{ $package->slug }}">
              <button type="submit"
                class="px-3 py-2 border-2 border-red-600 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition-all duration-300">
                <i class="fa-solid fa-heart text-lg"></i>
              </button>
            </form>
          </div>


      </div>
  </section>
</x-layouts.app>