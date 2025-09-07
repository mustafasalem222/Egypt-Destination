<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Egypt Destinations</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <style>
    [x-cloak] {
      display: none;
    }

    @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap');

    .hero-bg {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23f4a261" width="1200" height="600"/><polygon fill="%23e76f51" points="0,600 400,200 800,400 1200,100 1200,600"/></svg>');
      background-size: cover;
      background-position: center;
    }
  </style>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
  <!-- Header -->
  <header class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50">
    <!-- Top Bar -->
    <div class="bg-blue-900 text-white py-2">
      <div class="container mx-auto px-4 flex justify-between items-center text-sm">
        <div class="flex space-x-4">
          <span dir="ltr">📞 0105 062 2361</span>
          <span dir="ltr">✉️ info@egydestinations.com</span>
        </div>
        <div class="flex space-x-2">
          <a href="#" class="hover:text-blue-300" dir="ltr">🌐 English</a>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->
    <nav class="container mx-auto p-5">
      <div class="flex justify-between items-center">

        <!-- Main Links (في النص) -->
        <div class="hidden md:flex gap-8 mx-auto">
          <x-links.link href="/" :active="request()->is('/')"
            class="text-blue-900 hover:text-blue-600 font-semibold transition-colors duration-300">
            الرئيسية</x-links.link>
          <x-links.link href="#" :active="request()->is('hotel-price')"
            class="text-gray-700 hover:text-blue-600 transition-colors duration-300">أسعار الفنادق
          </x-links.link>
          <x-links.link href="/#" class="text-gray-700 hover:text-blue-600 transition-colors duration-300">
            رحلات يومية</x-links.link>
          <x-links.link href="/packages" :active="request()->is('packages*')"
            class="text-gray-700 hover:text-blue-600 transition-colors duration-300">باقات سياحية
          </x-links.link>
          <x-links.link href="/about" :active="request()->is('about')"
            class="text-gray-700 hover:text-blue-600 transition-colors duration-300">من نحن
          </x-links.link>
          <x-links.link href="/contact" :active="request()->is('contact')"
            class="text-gray-700 hover:text-blue-600 transition-colors duration-300">اتصل بنا</x-links.link>
        </div>

        <!-- حسابي -->
        <div class="flex items-center gap-x-2.5">
          @guest
            <!-- Dropdown حسابي -->
            <div class="relative" x-data="{ open:false }">
              <button @click="open=!open" @keydown.escape.window="open=false"
                class="flex items-center gap-2 text-blue-900 hover:text-blue-600 font-semibold transition-colors duration-300">
                حسابي
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform"
                  :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                    clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Dropdown Menu -->
              <div x-cloak x-show="open" @click.outside="open=false" x-transition.origin.top-left
                class="absolute left-0 mt-2 w-48 bg-white border border-gray-200 rounded-xl shadow-lg py-2 z-50">
                <div class="flex flex-col items-center">
                  <x-links.link href="/login" :active="request()->is('login')"
                    class="block px-4 py-2  text-gray-700 hover:bg-gray-50 transition">
                    تسجيل الدخول
                  </x-links.link>

                  <x-links.link href="/register" :active="request()->is('register')"
                    class="block px-4 py-2 text-gray-700 hover:bg-gray-50 transition">
                    إنشاء حساب
                  </x-links.link>
                </div>
              </div>
            </div>
          @endguest

          @auth
            <!-- Dropdown للمستخدم المسجل -->
            <div class="relative" x-data="{ open:false }">
              <button @click="open=!open" @keydown.escape.window="open=false"
                class="flex items-center gap-2 text-blue-900 hover:text-blue-600 font-semibold transition">
                {{ auth()->user()->name ?? 'حسابي' }}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition-transform"
                  :class="open ? 'rotate-180' : ''" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd"
                    d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                    clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="open" @click.outside="open=false" x-transition.origin.top-left
                class="absolute left-0 mt-2 w-52 bg-white border border-gray-200 rounded-xl shadow-lg py-2 z-50">
                <a href="/dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-50">لوحة التحكم</a>
                <form method="POST" action="/logout">
                  @method('DELETE')
                  @csrf
                  <button class="w-full text-left px-4 py-2 text-red-700 hover:bg-red-50">تسجيل الخروج</button>
                </form>
              </div>
            </div>
          @endauth
        </div>
      </div>
    </nav>

  </header>

  <main class="pt-24">
    {{ $slot }}
  </main>

  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
          <h3 class="text-xl font-bold mb-4">Egypt Destinations</h3>
          <p class="text-gray-400">اكتشف جمال مصر مع أفضل الباقات السياحية والرحلات المخصصة.</p>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">روابط سريعة</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">الرئيسية</a></li>
            <li><a href="#" class="hover:text-white">الباقات السياحية</a></li>
            <li><a href="#" class="hover:text-white">الرحلات اليومية</a></li>
            <li><a href="#" class="hover:text-white">من نحن</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">الوجهات</h4>
          <ul class="space-y-2 text-gray-400">
            <li><a href="#" class="hover:text-white">القاهرة</a></li>
            <li><a href="#" class="hover:text-white">الأقصر</a></li>
            <li><a href="#" class="hover:text-white">أسوان</a></li>
            <li><a href="#" class="hover:text-white">الغردقة</a></li>
          </ul>
        </div>
        <div>
          <h4 class="text-lg font-semibold mb-4">تواصل معنا</h4>
          <div class="space-y-2 text-gray-400">
            <p dir="ltr">📞 0105 062 2361</p>
            <p dir="ltr">✉️ info@egydestinations.com</p>
            <div class="flex space-x-4 mt-4" dir="ltr">
              <a href="#" class="  hover:text-white block"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="hover:text-white block"><i class="fab fa-instagram"></i></a>
              <a href="#" class="hover:text-white block"><i class="fab fa-twitter"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p dir="ltr">&copy; 2024 Egypt Destinations. جميع الحقوق محفوظة.</p>
      </div>
    </div>
  </footer>
</body>

</html>