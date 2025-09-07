<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>الإعدادات - لوحة التحكم الإدارية</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>

<body class="flex bg-gradient-to-br from-blue-400 to-purple-600 min-h-screen">
  <!-- Sidebar -->
  <x-admin.sidebar />

  <!-- Main Content -->
  <div class="mr-72 flex-grow p-0 bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white p-6 flex justify-between items-center shadow-md sticky top-0 z-40">
      <div class="flex flex-col">
        <h1 id="page-title" class="text-3xl font-bold text-gray-800">الإعدادات</h1>
        <p class="text-gray-600 text-sm">لوحة التحكم / <span id="current-page">الإعدادات</span></p>
      </div>
      <div class="flex items-center space-x-4">
        <div class="flex bg-gray-100 rounded-full p-2 border border-gray-200">
          <input type="text" placeholder="البحث..." class="bg-transparent outline-none px-3 w-48 text-gray-700">
          <button class="text-gray-500 text-lg">🔍</button>
        </div>
        <div class="flex items-center space-x-3">
          <span class="text-gray-800 font-medium">مرحباً، أحمد</span>
          <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white text-lg">👤</div>
          <button
            class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition-colors duration-300">تسجيل
            الخروج</button>
        </div>
      </div>
    </header>

    <!-- Content Area -->
    <div class="p-8">
      <!-- Settings Section Content -->
      <section id="settings" class="content-section bg-white rounded-xl p-8 shadow-lg active">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800">إعدادات لوحة التحكم</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div class="bg-gray-100 rounded-xl p-6 shadow-md">
            <h3 class="text-gray-800 text-xl font-semibold mb-4">إعدادات الحساب</h3>
            <form class="flex flex-col space-y-4">
              <div class="flex flex-col">
                <label class="text-gray-700 font-medium mb-1">اسم المستخدم</label>
                <input type="text" value="أحمد علي"
                  class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div class="flex flex-col">
                <label class="text-gray-700 font-medium mb-1">البريد الإلكتروني</label>
                <input type="email" value="admin@example.com"
                  class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <button type="submit"
                class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-300">حفظ
                التغييرات</button>
            </form>
          </div>

          <div class="bg-gray-100 rounded-xl p-6 shadow-md">
            <h3 class="text-gray-800 text-xl font-semibold mb-4">إعدادات النظام</h3>
            <form class="flex flex-col space-y-4">
              <div class="flex flex-col">
                <label class="text-gray-700 font-medium mb-1">اسم الموقع</label>
                <input type="text" value="متجر إلكتروني"
                  class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
              </div>
              <div class="flex flex-col">
                <label class="text-gray-700 font-medium mb-1">العملة الافتراضية</label>
                <select
                  class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                  <option>ريال سعودي</option>
                  <option>دولار أمريكي</option>
                  <option>يورو</option>
                </select>
              </div>
              <button type="submit"
                class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-300">حفظ
                التغييرات</button>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>