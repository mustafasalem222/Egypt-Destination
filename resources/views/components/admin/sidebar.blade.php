<!-- Sidebar -->
<div class="w-72 bg-gradient-to-b from-gray-800 to-gray-700 text-white p-0 h-screen fixed right-0 top-0 shadow-lg z-50">
  <div class="p-8 text-center border-b border-gray-700">
    <h2 class="text-2xl font-semibold text-gray-100">🏢 لوحة التحكم</h2>
  </div>
  <nav class="py-5">
    <ul>
      <li>
        <x-admin.link href="/admin/dashboard" :active="request()->is('admin/dashboard') ">📊 الرئيسية</x-admin.link>
      </li>
      <li>
        <x-admin.link href="/admin/destinations" :active="request()->is('admin/destinations')">🗺️ كل الوجهات
        </x-admin.link>
      </li>
      <li>
        <x-admin.link href="/admin/destinations/create" :active="request()->is('admin/destinations/create')">➕ إضافة
          وجهة</x-admin.link>
      </li>
      <li>
        <x-admin.link href="/admin/destinations/categories" :active="request()->is('admin/destinations/categories')">
          📂 الفئات</x-admin.link>
      </li>
      <li>
        <x-admin.link href="/admin/destinations/settings" :active="request()->is('admin/destinations/settings')">⚙️
          إعدادات
          الوجهات</x-admin.link>
      </li>
    </ul>
  </nav>

</div>