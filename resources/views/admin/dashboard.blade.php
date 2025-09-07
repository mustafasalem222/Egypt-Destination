<x-admin.layout heading="الرئيسيه">
  <section id="orders" class="content-section bg-white rounded-xl p-8 shadow-lg active">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl font-bold text-gray-800">إدارة الطلبات</h2>
      <button
        class="bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition-colors duration-300 shadow-lg"
        onclick="openModal(\'orderModal\')">➕ إضافة طلب جديد</button>
    </div>

    <div class="overflow-x-auto rounded-xl shadow-md">
      <table class="min-w-full bg-white border-collapse">
        <thead>
          <tr class="bg-gray-100 text-gray-700 text-right">
            <th class="py-3 px-4 font-semibold">رقم الطلب</th>
            <th class="py-3 px-4 font-semibold">العميل</th>
            <th class="py-3 px-4 font-semibold">المنتجات</th>
            <th class="py-3 px-4 font-semibold">المبلغ الإجمالي</th>
            <th class="py-3 px-4 font-semibold">تاريخ الطلب</th>
            <th class="py-3 px-4 font-semibold">الحالة</th>
            <th class="py-3 px-4 font-semibold">الإجراءات</th>
          </tr>
        </thead>
        <tbody id="ordersTable">
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 px-4">#1001</td>
            <td class="py-3 px-4">أحمد علي</td>
            <td class="py-3 px-4">هاتف ذكي، سماعات</td>
            <td class="py-3 px-4">1,350.00 ر.س</td>
            <td class="py-3 px-4">2024-03-15</td>
            <td class="py-3 px-4"><span
                class="bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">تم
                التسليم</span>
            </td>
            <td class="py-3 px-4 flex space-x-2">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                onclick="viewOrder(1)">👁️</button>
              <button class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                onclick="editOrder(1)">✏️</button>
              <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                onclick="deleteOrder(1)">🗑️</button>
            </td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 px-4">#1002</td>
            <td class="py-3 px-4">فاطمة سعيد</td>
            <td class="py-3 px-4">جهاز كمبيوتر محمول</td>
            <td class="py-3 px-4">3,500.00 ر.س</td>
            <td class="py-3 px-4">2024-03-20</td>
            <td class="py-3 px-4"><span
                class="bg-yellow-100 text-yellow-700 text-xs font-medium px-3 py-1 rounded-full">قيد المعالجة</span>
            </td>
            <td class="py-3 px-4 flex space-x-2">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                onclick="viewOrder(2)">👁️</button>
              <button class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                onclick="editOrder(2)">✏️</button>
              <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                onclick="deleteOrder(2)">🗑️</button>
            </td>
          </tr>
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="py-3 px-4">#1003</td>
            <td class="py-3 px-4">محمد حسن</td>
            <td class="py-3 px-4">ساعة ذكية</td>
            <td class="py-3 px-4">800.00 ر.س</td>
            <td class="py-3 px-4">2024-03-22</td>
            <td class="py-3 px-4"><span class="bg-blue-100 text-blue-700 text-xs font-medium px-3 py-1 rounded-full">في
                الانتظار</span></td>
            <td class="py-3 px-4 flex space-x-2">
              <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                onclick="viewOrder(3)">👁️</button>
              <button class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                onclick="editOrder(3)">✏️</button>
              <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                onclick="deleteOrder(3)">🗑️</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</x-admin.layout>