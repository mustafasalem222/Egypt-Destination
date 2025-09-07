<x-layouts.app>
  <!-- Main Content -->
  <div class="w-full max-w-md mx-auto my-14">
    <div class="bg-white shadow-2xl rounded-2xl my-auto form-shadow p-8 backdrop-blur-sm">
      <!-- Logo Section -->
      <div class="text-center mb-8">
        <div
          class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
          <span class="text-white text-2xl font-bold">🏛️</span>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 mb-2">مرحباً بعودتك</h2>
        <p class="text-gray-600">سجل دخولك لاستكشاف مصر الجميلة</p>
      </div>

      <!-- Login Form -->
      <form class="space-y-6" method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="space-y-4">
          <!-- Email -->
          <div>
            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">البريد الإلكتروني</label>
            <div class="relative">
              <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل بريدك الإلكتروني" required>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <span class="text-gray-400">📧</span>
              </div>
            </div>
            <x-forms.error error="email" />
          </div>

          <!-- Password -->
          <div>
            <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">كلمة المرور</label>
            <div class="relative">
              <input type="password" id="password" name="password"
                class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                placeholder="أدخل كلمة المرور" required>
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <span class="text-gray-400">🔒</span>
              </div>
            </div>
            <x-forms.error error="password" />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input type="checkbox" id="remember" name="remember"
              class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
            <label for="remember" class="mr-2 block text-sm text-gray-700">تذكرني</label>
          </div>
          <a href="#" class="text-sm text-blue-600 hover:text-blue-800 transition-colors duration-300">نسيت كلمة
            المرور؟</a>
        </div>

        <button type="submit"
          class="w-full bg-gradient-to-r text-white bg-blue-600 hover:bg-blue-700 py-3 rounded-lg font-semibold transition-colors duration-150 shadow-lg">
          تسجيل الدخول
        </button>
      </form>

      <!-- Social Login -->
      <!-- Social Login -->
      <div class="mt-6">
        <div class="relative">
          <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
          </div>
          <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">أو سجل الدخول باستخدام</span>
          </div>
        </div>

        <div class="mt-6 grid grid-cols-2 gap-3">
          <!-- Facebook -->
          <button type="button"
            class="w-full inline-flex items-center justify-center py-2 px-4 rounded-lg shadow-sm text-sm font-medium text-white bg-[#1877F2] hover:bg-[#145DBF] transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.676 0H1.326C.594 0 0 .593 0 1.326v21.348C0 23.407.594 24 1.326 
          24h11.495v-9.294H9.692V11.09h3.129V8.41c0-3.1 1.894-4.788 4.659-4.788 
          1.325 0 2.463.099 2.794.143v3.24h-1.918c-1.504 
          0-1.795.715-1.795 1.763v2.322h3.587l-.467 
          3.616h-3.12V24h6.116C23.406 24 24 23.407 24 
          22.674V1.326C24 .593 23.406 0 22.676 0z" />
            </svg>
            <span class="mr-2">فيسبوك</span>
          </button>

          <!-- Google -->
          <button type="button"
            class="w-full inline-flex items-center justify-center py-2 px-4 border border-gray-300 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 48 48">
              <path fill="#EA4335" d="M24 9.5c3.54 0 6.72 1.22 9.23 3.61l6.85-6.85C35.9 2.69 
          30.47 0 24 0 14.62 0 6.44 5.38 2.56 13.22l7.98 6.2C12.35 
          13.46 17.74 9.5 24 9.5z" />
              <path fill="#4285F4" d="M46.1 24.5c0-1.53-.15-3-.43-4.43H24v8.39h12.45c-.54 
          2.9-2.19 5.36-4.66 7.01l7.27 5.64C43.98 37.1 46.1 31.28 
          46.1 24.5z" />
              <path fill="#FBBC05" d="M10.54 28.42c-.48-1.42-.74-2.94-.74-4.42s.26-3 
          .74-4.42l-7.98-6.2C1.23 16.82 0 20.26 0 24s1.23 7.18 
          3.34 10.62l7.2-6.2z" />
              <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 
          15.9-5.79l-7.27-5.64c-2.02 1.37-4.61 
          2.18-8.63 2.18-6.26 0-11.65-3.96-13.47-9.52l-7.98 
          6.2C6.44 42.62 14.62 48 24 48z" />
            </svg>
            <span class="mr-2">جوجل</span>
          </button>
        </div>
      </div>


      <!-- Register Link -->
      <div class="mt-8 text-center">
        <p class="text-gray-600 text-sm">
          ليس لديك حساب؟
          <a href="{{ route('register') }}"
            class="text-blue-600 hover:text-blue-800 font-semibold transition-colors duration-300">سجل
            الآن</a>
        </p>
      </div>
    </div>
  </div>
</x-layouts.app>