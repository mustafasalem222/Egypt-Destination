<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>المستخدمون - لوحة التحكم الإدارية</title>
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

  <!-- Main Content -->
  <div class="mr-72 flex-grow p-0 bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white p-6 flex justify-between items-center shadow-md sticky top-0 z-40">
      <div class="flex flex-col">
        <h1 id="page-title" class="text-3xl font-bold text-gray-800">المستخدمون</h1>
        <p class="text-gray-600 text-sm">لوحة التحكم / <span id="current-page">المستخدمون</span></p>
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
      <!-- Users Section Content -->
      <section id="users" class="content-section bg-white rounded-xl p-8 shadow-lg active">
        <div class="flex justify-between items-center mb-6">
          <h2 class="text-2xl font-bold text-gray-800">إدارة المستخدمين</h2>
          <button
            class="bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600 transition-colors duration-300 shadow-lg"
            onclick="openModal(\'userModal\')">➕ إضافة مستخدم جديد</button>
        </div>

        <div class="overflow-x-auto rounded-xl shadow-md">
          <table class="min-w-full bg-white border-collapse">
            <thead>
              <tr class="bg-gray-100 text-gray-700 text-right">
                <th class="py-3 px-4 font-semibold">الصورة</th>
                <th class="py-3 px-4 font-semibold">الاسم</th>
                <th class="py-3 px-4 font-semibold">البريد الإلكتروني</th>
                <th class="py-3 px-4 font-semibold">الدور</th>
                <th class="py-3 px-4 font-semibold">تاريخ التسجيل</th>
                <th class="py-3 px-4 font-semibold">الحالة</th>
                <th class="py-3 px-4 font-semibold">الإجراءات</th>
              </tr>
            </thead>
            <tbody id="usersTable">
              <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-4">
                  <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">👤
                  </div>
                </td>
                <td class="py-3 px-4">أحمد علي محمد</td>
                <td class="py-3 px-4">ahmed@example.com</td>
                <td class="py-3 px-4"><span
                    class="bg-red-500 text-white text-xs font-medium px-3 py-1 rounded-full">مدير</span></td>
                <td class="py-3 px-4">2024-01-15</td>
                <td class="py-3 px-4"><span
                    class="bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">نشط</span></td>
                <td class="py-3 px-4 flex space-x-2">
                  <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                    onclick="viewUser(1)">👁️</button>
                  <button
                    class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                    onclick="editUser(1)">✏️</button>
                  <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="deleteUser(1)">🗑️</button>
                </td>
              </tr>
              <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-4">
                  <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">👤
                  </div>
                </td>
                <td class="py-3 px-4">فاطمة سعيد أحمد</td>
                <td class="py-3 px-4">fatma@example.com</td>
                <td class="py-3 px-4"><span
                    class="bg-blue-500 text-white text-xs font-medium px-3 py-1 rounded-full">مستخدم</span></td>
                <td class="py-3 px-4">2024-02-20</td>
                <td class="py-3 px-4"><span
                    class="bg-green-100 text-green-700 text-xs font-medium px-3 py-1 rounded-full">نشط</span></td>
                <td class="py-3 px-4 flex space-x-2">
                  <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                    onclick="viewUser(2)">👁️</button>
                  <button
                    class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                    onclick="editUser(2)">✏️</button>
                  <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="deleteUser(2)">🗑️</button>
                </td>
              </tr>
              <tr class="border-b border-gray-200 hover:bg-gray-50">
                <td class="py-3 px-4">
                  <div class="w-9 h-9 bg-blue-500 rounded-full flex items-center justify-center text-white text-sm">👤
                  </div>
                </td>
                <td class="py-3 px-4">محمد حسن علي</td>
                <td class="py-3 px-4">mohamed@example.com</td>
                <td class="py-3 px-4"><span
                    class="bg-orange-500 text-white text-xs font-medium px-3 py-1 rounded-full">مشرف</span></td>
                <td class="py-3 px-4">2024-03-10</td>
                <td class="py-3 px-4"><span
                    class="bg-red-100 text-red-700 text-xs font-medium px-3 py-1 rounded-full">غير نشط</span></td>
                <td class="py-3 px-4 flex space-x-2">
                  <button class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 transition-colors duration-300"
                    onclick="viewUser(3)">👁️</button>
                  <button
                    class="bg-yellow-500 text-white p-2 rounded-lg hover:bg-yellow-600 transition-colors duration-300"
                    onclick="editUser(3)">✏️</button>
                  <button class="bg-red-500 text-white p-2 rounded-lg hover:bg-red-600 transition-colors duration-300"
                    onclick="deleteUser(3)">🗑️</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </div>

  <!-- Modals -->
  <div id="userModal"
    class="modal hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
    <div class="modal-content bg-white rounded-xl p-8 w-11/12 max-w-md shadow-2xl">
      <div class="flex justify-between items-center border-b pb-4 mb-6">
        <h3 class="text-2xl font-semibold text-gray-800">إضافة مستخدم جديد</h3>
        <span class="text-gray-500 text-4xl cursor-pointer hover:text-gray-700"
          onclick="closeModal(\'userModal\')">&times;</span>
      </div>
      <form class="flex flex-col space-y-4">
        <div class="flex flex-col">
          <label class="text-gray-700 font-medium mb-1">الاسم الكامل</label>
          <input type="text" required
            class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
          <label class="text-gray-700 font-medium mb-1">البريد الإلكتروني</label>
          <input type="email" required
            class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex flex-col">
          <label class="text-gray-700 font-medium mb-1">الدور</label>
          <select required
            class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">اختر الدور</option>
            <option value="admin">مدير</option>
            <option value="moderator">مشرف</option>
            <option value="user">مستخدم</option>
          </select>
        </div>
        <div class="flex flex-col">
          <label class="text-gray-700 font-medium mb-1">كلمة المرور</label>
          <input type="password" required
            class="p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="flex justify-end space-x-3 mt-6">
          <button type="button"
            class="bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400 transition-colors duration-300"
            onclick="closeModal(\'userModal\')">إلغاء</button>
          <button type="submit"
            class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition-colors duration-300">حفظ</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openModal(modalId) {
      document.getElementById(modalId).style.display = "flex";
    }

    function closeModal(modalId) {
      document.getElementById(modalId).style.display = "none";
    }

    function viewUser(id) {
      alert("عرض تفاصيل المستخدم رقم: " + id);
    }

    function editUser(id) {
      alert("تعديل المستخدم رقم: " + id);
    }

    function deleteUser(id) {
      if (confirm("هل أنت متأكد من حذف هذا المستخدم؟")) {
        alert("تم حذف المستخدم رقم: " + id);
      }
    }

    window.onclick = function (event) {
      const modals = document.querySelectorAll(\".modal\");
            modals.forEach(modal => {
        if (event.target == modal) {
          modal.style.display = "none";
        }
      });
    }
  </script>
</body>

</html>