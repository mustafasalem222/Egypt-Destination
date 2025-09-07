<x-layouts.app>
  <div class="w-full max-w-md mx-auto my-14">
    <div class="bg-white rounded-2xl shadow-2xl form-shadow my-auto p-8 backdrop-blur-sm">
      <!-- Logo Section -->
      <div class="text-center mb-8">
        <div
          class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-white text-2xl font-bold">🏛️</span>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">انضم إلينا</h2>
        <p class="text-gray-600">أنشئ حسابك واستكشف مصر الجميلة</p>
      </div>

      <!-- Register Form -->
      <form class="space-y-6" method="POST" action="/register" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
          <!-- Name -->
          <div>
            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">الاسم الكامل</label>
            <div class="relative">
              <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل اسمك الكامل">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-user text-gray-400"></i>
              </div>
            </div>
            <x-forms.error error="name" />
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">البريد الإلكتروني</label>
            <div class="relative">
              <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل بريدك الإلكتروني">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-envelope text-gray-400"></i>
              </div>
            </div>
            <x-forms.error error="email" />
          </div>

          <!-- Phone -->
          <div>
            <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">رقم الهاتف</label>
            <div class="relative">
              <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل رقم هاتفك">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-phone text-gray-400"></i>
              </div>
            </div>
            <x-forms.error error="phone" />
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">كلمة المرور</label>
            <div class="relative">
              <input type="password" id="password" name="password"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل كلمة المرور">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-lock text-gray-400"></i>
              </div>
            </div>
            <x-forms.error error="password" />
          </div>

          <!-- Confirm Password -->
          <div>
            <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">تأكيد كلمة
              المرور</label>
            <div class="relative">
              <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أعد إدخال كلمة المرور">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-lock-keyhole text-gray-400"></i>
              </div>
            </div>
            <x-forms.error error="password_confirmation" />
          </div>

          <!-- Image -->
          <div>
            <label for="image_url" class="block text-gray-700 text-sm font-semibold mb-2">الصورة الشخصية</label>
            <input type="file" id="image_url" name="image_url" class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
               file:rounded-lg file:border-0
               file:text-sm file:font-semibold
               file:bg-blue-50 file:text-blue-600
               hover:file:bg-blue-100">
            <x-forms.error error="image_url" />
          </div>
        </div>

        <button type="submit"
          class="w-full bg-gradient-to-r  text-white bg-blue-600 hover:bg-blue-700 py-3 rounded-lg font-semibold transition-colors duration-150 shadow-lg">
          إنشاء حساب
        </button>
      </form>

      <!-- Login Link -->
      <div class="mt-8 text-center">
        <p class="text-gray-600 text-sm">
          لديك حساب بالفعل؟
          <a href="{{ route('login') }}"
            class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-300">سجل الدخول الآن</a>
        </p>
      </div>
    </div>
  </div>
</x-layouts.app>