<x-layouts.app>
  <div class="container mx-auto p-6 pt-28 max-w-7xl">
    <!-- Welcome Header -->
    <div class="bg-violet-700 rounded-2xl shadow-xl p-8 mb-8 text-white">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-6">
          <div class="w-24 h-24 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
            <span class="text-4xl">👤</span>
          </div>
          <div>
            <h2 class="text-4xl font-bold mb-2">مرحباً، {{ $user->name }}</h2>
            <p class="text-xl opacity-90">{{ $user->email }}</p>
            <p class="text-lg opacity-80">عضو منذ: يناير 2023</p>
          </div>
        </div>
        <div class="text-center">
          <div class="bg-white bg-opacity-20 rounded-xl p-4">
            <div class="text-3xl font-bold">5</div>
            <div class="text-sm opacity-80">رحلات مكتملة</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-3xl mb-2">✈️</div>
        <div class="text-2xl font-bold text-blue-600">3</div>
        <div class="text-gray-600">رحلات مسجلة</div>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-3xl mb-2">❤️</div>
        <div class="text-2xl font-bold text-red-500">7</div>
        <div class="text-gray-600">رحلات مفضلة</div>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-3xl mb-2">💰</div>
        <div class="text-2xl font-bold text-green-600">$4,297</div>
        <div class="text-gray-600">إجمالي المدفوع</div>
      </div>
      <div class="bg-white rounded-xl shadow-lg p-6 text-center">
        <div class="text-3xl mb-2">⭐</div>
        <div class="text-2xl font-bold text-yellow-500">4.8</div>
        <div class="text-gray-600">متوسط التقييم</div>
      </div>
    </div>

    <!-- Tabs Section -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
      <!-- Tab Navigation -->
      <div class="border-b border-gray-200 bg-gray-50">
        <nav class="flex" aria-label="Tabs">
          <button
            class="tab-button flex-1 py-4 px-6 text-center font-semibold text-lg border-b-4 transition-all duration-300 active"
            onclick="showTab('registered-trips')" id="registered-trips-tab">
            <span class="text-2xl mr-2">✈️</span>
            رحلاتي المسجلة
          </button>
          <button
            class="tab-button flex-1 py-4 px-6 text-center font-semibold text-lg border-b-4 border-transparent text-gray-500 hover:text-gray-700 transition-all duration-300"
            onclick="showTab('favorite-trips')" id="favorite-trips-tab">
            <span class="text-2xl mr-2">❤️</span>
            رحلاتي المفضلة
          </button>
        </nav>
      </div>

      <!-- Tab Content -->
      <div class="p-8">
        <!-- Registered Trips Content -->
        <!-- Registered Trips Content -->
        <div id="registered-trips" class="tab-content">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-3xl font-bold text-gray-800">رحلاتك المسجلة</h3>
            <a href="#"
              class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300 font-semibold flex items-center gap-2">
              <span>➕</span> حجز رحلة جديدة
            </a>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            @foreach($bookings as $booking)
              @php
                $package = $booking->package;
              @endphp
              <div class="trip-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div
                  class="relative h-48 {{ $booking->payment_status == 'paid' ? 'bg-gradient-to-br from-green-400 to-teal-500' : 'bg-gradient-to-br from-purple-500 to-pink-500' }} flex items-center justify-center">
                  <div class="text-center text-white">
                    <div class="text-6xl mb-2">🏖️</div>
                    <h4 class="text-xl font-bold">{{ $package->title }}</h4>
                  </div>
                  <div
                    class="absolute top-4 right-4 {{ $booking->payment_status == 'paid' ? 'status-confirmed' : 'status-pending' }} text-green-500 px-3 py-1 rounded-full text-sm font-bold">
                    {{ $booking->payment_status == 'paid' ? 'مؤكدة' : 'قيد الانتظار' }}
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-bold text-gray-800 mb-3">{{ $package->title }}</h4>
                  <div class="space-y-2 mb-4">
                    <div class="flex items-center justify-between text-sm">
                      <span class="text-gray-600">📅 تاريخ البداية:</span>
                      <span class="font-semibold">{{ $package->start_date }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                      <span class="text-gray-600">📅 تاريخ النهاية:</span>
                      <span class="font-semibold">{{ $package->end_date }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                      <span class="text-gray-600">💰 السعر المدفوع:</span>
                      <span class="font-bold text-green-600">${{ number_format($booking->amount_paid, 2) }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                      <span class="text-gray-600">⏱️ المدة:</span>
                      <span
                        class="font-semibold">{{ \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date)) }}
                        أيام</span>
                    </div>
                  </div>
                  <div class="flex gap-2">
                    <a href="#"
                      class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-sm font-semibold">
                      عرض التفاصيل
                    </a>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>


        <!-- Favorite Trips Content -->
        <div id="favorite-trips" class="tab-content hidden">
          <div class="flex items-center justify-between mb-6">
            <h3 class="text-3xl font-bold text-gray-800">رحلاتك المفضلة</h3>
            <button
              class="bg-red-500 text-white px-6 py-3 rounded-lg hover:bg-red-600 transition-colors duration-300 font-semibold">
              <span class="text-lg mr-2">🗑️</span>
              مسح الكل
            </button>
          </div>

          <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
            <!-- Favorite Trip Card 1 -->
            <div class="trip-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
              <div class="relative h-48 bg-gradient-to-br from-green-400 to-teal-500 flex items-center justify-center">
                <div class="text-center text-white">
                  <div class="text-6xl mb-2">⛵</div>
                  <h4 class="text-xl font-bold">أسوان</h4>
                </div>
                <div class="absolute top-4 left-4 bg-red-500 text-white p-2 rounded-full">
                  <span class="text-lg">❤️</span>
                </div>
              </div>
              <div class="p-6">
                <h4 class="text-xl font-bold text-gray-800 mb-3">باقة أسوان النيلية</h4>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ البداية:</span>
                    <span class="font-semibold">2024-06-01</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ النهاية:</span>
                    <span class="font-semibold">2024-06-06</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">💰 السعر:</span>
                    <span class="font-bold text-blue-600">$1,099</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">⏱️ المدة:</span>
                    <span class="font-semibold">5 أيام / 4 ليالي</span>
                  </div>
                </div>
                <div class="flex gap-2">
                  <button
                    class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-sm font-semibold">
                    احجز الآن
                  </button>
                  <button
                    class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="removeFavorite(this)">
                    🗑️
                  </button>
                </div>
              </div>
            </div>

            <!-- Favorite Trip Card 2 -->
            <div class="trip-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
              <div class="relative h-48 bg-gradient-to-br from-red-400 to-pink-500 flex items-center justify-center">
                <div class="text-center text-white">
                  <div class="text-6xl mb-2">🤿</div>
                  <h4 class="text-xl font-bold">شرم الشيخ</h4>
                </div>
                <div class="absolute top-4 left-4 bg-red-500 text-white p-2 rounded-full">
                  <span class="text-lg">❤️</span>
                </div>
              </div>
              <div class="p-6">
                <h4 class="text-xl font-bold text-gray-800 mb-3">باقة شرم الشيخ للغوص</h4>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ البداية:</span>
                    <span class="font-semibold">2024-07-15</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ النهاية:</span>
                    <span class="font-semibold">2024-07-27</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">💰 السعر:</span>
                    <span class="font-bold text-blue-600">$1,799</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">⏱️ المدة:</span>
                    <span class="font-semibold">12 يوم / 11 ليلة</span>
                  </div>
                </div>
                <div class="flex gap-2">
                  <button
                    class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-sm font-semibold">
                    احجز الآن
                  </button>
                  <button
                    class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="removeFavorite(this)">
                    🗑️
                  </button>
                </div>
              </div>
            </div>

            <!-- Favorite Trip Card 3 -->
            <div class="trip-card bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
              <div
                class="relative h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                <div class="text-center text-white">
                  <div class="text-6xl mb-2">🏛️</div>
                  <h4 class="text-xl font-bold">الإسكندرية</h4>
                </div>
                <div class="absolute top-4 left-4 bg-red-500 text-white p-2 rounded-full">
                  <span class="text-lg">❤️</span>
                </div>
              </div>
              <div class="p-6">
                <h4 class="text-xl font-bold text-gray-800 mb-3">باقة الإسكندرية التاريخية</h4>
                <div class="space-y-2 mb-4">
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ البداية:</span>
                    <span class="font-semibold">2024-08-01</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">📅 تاريخ النهاية:</span>
                    <span class="font-semibold">2024-08-04</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">💰 السعر:</span>
                    <span class="font-bold text-blue-600">$799</span>
                  </div>
                  <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-600">⏱️ المدة:</span>
                    <span class="font-semibold">3 أيام / 2 ليلة</span>
                  </div>
                </div>
                <div class="flex gap-2">
                  <button
                    class="flex-1 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors duration-300 text-sm font-semibold">
                    احجز الآن
                  </button>
                  <button
                    class="px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="removeFavorite(this)">
                    🗑️
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
      <p class="text-lg">&copy; 2024 Egypt Destinations. جميع الحقوق محفوظة.</p>
    </div>
  </footer>

  <script>
    function showTab(tabId) {
      // Hide all tab contents
      document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
      });

      // Deactivate all tab buttons
      document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('active');
        button.classList.add('text-gray-500');
      });

      // Show the selected tab content
      document.getElementById(tabId).classList.remove('hidden');

      // Activate the selected tab button
      const activeTab = document.getElementById(tabId + '-tab');
      activeTab.classList.add('active');
      activeTab.classList.remove('text-gray-500');
    }

    function removeFavorite(button) {
      const card = button.closest('.trip-card');
      card.style.transform = 'scale(0.8)';
      card.style.opacity = '0';
      setTimeout(() => {
        card.remove();
        // Update favorite count
        updateFavoriteCount();
      }, 300);
    }

    function updateFavoriteCount() {
      const favoriteCards = document.querySelectorAll('#favorite-trips .trip-card');
      const countElement = document.querySelector('.text-red-500').previousElementSibling;
      countElement.textContent = favoriteCards.length;
    }

    function logout() {
      if (confirm('هل أنت متأكد من تسجيل الخروج؟')) {
        window.location.href = 'login.html';
      }
    }

    // Show registered trips tab by default on page load
    document.addEventListener('DOMContentLoaded', () => {
      showTab('registered-trips');
    });

    // Add hover effects to trip cards
    document.querySelectorAll('.trip-card').forEach(card => {
      card.addEventListener('mouseenter', function () {
        this.style.transform = 'translateY(-4px)';
      });

      card.addEventListener('mouseleave', function () {
        this.style.transform = 'translateY(0)';
      });
    });
  </script>
</x-layouts.app>