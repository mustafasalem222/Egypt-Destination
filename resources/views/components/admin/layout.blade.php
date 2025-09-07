<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $heading }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 2000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(5px);
    }

    .modal-content {
      animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
      from {
        opacity: 0;
        transform: translateY(-50px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>

<body class="flex bg-gradient-to-br from-blue-400 to-purple-600 min-h-screen">
  <!-- Sidebar -->
  <x-admin.sidebar />
  <div class="mr-72 flex-grow p-0 bg-gray-50 min-h-screen">
    <!-- Header -->
    <!-- Header -->
    <header class="bg-white p-6 flex justify-between items-center shadow-md sticky top-0 z-40">
      <!-- العنوان -->
      <div class="flex flex-col">
        <h1 id="page-title" class="text-3xl font-bold text-gray-800">{{ $heading }}</h1>
        <p class="text-gray-600 text-sm">لوحة التحكم / <span id="current-page">{{ $heading }}</span></p>
      </div>

      <!-- اليمين: البحث + معلومات الادمن + تسجيل الخروج -->
      <div class="flex items-center gap-6">
        <!-- البحث -->
        <div class="flex bg-gray-100 rounded-full p-2 border border-gray-200 items-center gap-2">
          <input type="text" placeholder="البحث..." class="bg-transparent outline-none px-3 w-48 text-gray-700">
          <button class="text-gray-500 text-lg">🔍</button>
        </div>

        <!-- معلومات الادمن + تسجيل الخروج -->
        <div class="flex items-center gap-4">
          <span class="text-gray-800 font-medium">مرحباً، أحمد</span>
          <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-lg">👤</div>
          <button class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-colors duration-300">
            تسجيل الخروج
          </button>
        </div>
      </div>
    </header>


    <!-- Content Area -->
    <div class="p-8">
      {{ $slot }}
    </div>
</body>

</html>