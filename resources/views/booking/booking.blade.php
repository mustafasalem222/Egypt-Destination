<x-layouts.app>
  <!DOCTYPE html>
  <html lang="ar" dir="rtl">


  <style>
    .payment-card {
      transition: all 0.3s ease;
    }

    .payment-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .bg-gradient-booking {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .status-pending {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .status-paid {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .status-cancelled {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .payment-method {
      transition: all 0.3s ease;
    }

    .payment-method.selected {
      border-color: #3b82f6;
      background-color: #eff6ff;
    }

    .step-indicator {
      transition: all 0.3s ease;
    }

    .step-indicator.active {
      background-color: #3b82f6;
      color: white;
    }

    .step-indicator.completed {
      background-color: #10b981;
      color: white;
    }
  </style>



  <!-- Header Navigation -->


  <div class="container mx-auto p-6 pt-28 max-w-6xl">
    <!-- Booking Header -->
    <div class="bg-gradient-booking rounded-2xl shadow-xl p-8 mb-8 text-white">
      <div class="flex items-center justify-between">
        <div>
          <h2 class="text-4xl font-bold mb-2">تأكيد الحجز والدفع</h2>
          <p class="text-xl opacity-90">أكمل عملية الدفع لتأكيد حجزك</p>
        </div>
        <div class="text-center">
          <div class="bg-white bg-opacity-20 rounded-xl p-4">
            <div class="text-3xl mb-2">💳</div>
            <div class="text-sm opacity-80">دفع آمن</div>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Booking Summary -->
      <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-32">
          <h3 class="text-2xl font-bold text-gray-800 mb-6">ملخص الحجز</h3>

          <!-- Package Image -->
          <div class="relative h-48 rounded-xl flex items-center justify-center mb-6 overflow-hidden">
            @if($package->image_url)
              <img src="{{ asset($package->image_url) }}" alt="{{ $package->title }}" class="w-full h-full object-cover">
            @else
              <div class="text-center text-gray-300 text-6xl">🏖️</div>
            @endif
          </div>

          <!-- Package Details -->
          <div class="space-y-4 mb-6">
            <div>
              <h4 class="text-xl font-bold text-gray-800">{{ $package->title }}</h4>
              <p class="text-gray-600 text-sm">{{ $package->description }}</p>
            </div>

            @php
              $days = \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date));
            @endphp

            <div class="border-t pt-4">
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">📅 تاريخ البداية:</span>
                <span class="font-semibold">{{ $package->start_date }}</span>
              </div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">📅 تاريخ النهاية:</span>
                <span class="font-semibold">{{ $package->end_date }}</span>
              </div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">🕒 المدة:</span>
                <span class="font-semibold">{{ $days }} يوم</span>
              </div>
              <div class="flex justify-between items-center mb-2">
                <span class="text-gray-600">💰 السعر:</span>
                <span class="font-semibold">${{ number_format($package->price, 2) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Payment Form -->
      <div class="lg:col-span-2">
        <div class="bg-white rounded-2xl shadow-xl p-8">
          <h3 class="text-3xl font-bold text-gray-800 mb-8">إتمام الدفع</h3>

          <!-- Payment Methods -->
          <div class="mb-8">
            <h4 class="text-xl font-semibold text-gray-800 mb-4">اختر طريقة الدفع</h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div class="payment-method border-2 border-gray-200 rounded-lg p-4 cursor-pointer selected"
                onclick="selectPaymentMethod(this, 'credit-card')">
                <div class="text-center">
                  <div class="text-3xl mb-2">💳</div>
                  <div class="font-semibold">بطاقة ائتمان</div>
                </div>
              </div>
              <div class="payment-method border-2 border-gray-200 rounded-lg p-4 cursor-pointer"
                onclick="selectPaymentMethod(this, 'paypal')">
                <div class="text-center">
                  <div class="text-3xl mb-2">🅿️</div>
                  <div class="font-semibold">PayPal</div>
                </div>
              </div>
              <div class="payment-method border-2 border-gray-200 rounded-lg p-4 cursor-pointer"
                onclick="selectPaymentMethod(this, 'bank-transfer')">
                <div class="text-center">
                  <div class="text-3xl mb-2">🏦</div>
                  <div class="font-semibold">تحويل بنكي</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Credit Card Form -->
          <div id="credit-card-form" class="payment-form">
            <form id="payment-form" onsubmit="processPayment(event)">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="md:col-span-2">
                  <label for="card-number" class="block text-gray-700 text-sm font-bold mb-2">رقم البطاقة *</label>
                  <input type="text" id="card-number" maxlength="19" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                    placeholder="1234 5678 9012 3456" oninput="formatCardNumber(this)">
                </div>

                <div>
                  <label for="card-holder" class="block text-gray-700 text-sm font-bold mb-2">اسم حامل البطاقة *</label>
                  <input type="text" id="card-holder" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                    placeholder="الاسم كما هو مكتوب على البطاقة">
                </div>

                <div>
                  <label for="expiry-date" class="block text-gray-700 text-sm font-bold mb-2">تاريخ الانتهاء *</label>
                  <input type="text" id="expiry-date" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                    placeholder="MM/YY" oninput="formatExpiryDate(this)">
                </div>

                <div>
                  <label for="cvv" class="block text-gray-700 text-sm font-bold mb-2">رمز الأمان (CVV) *</label>
                  <input type="text" id="cvv" required maxlength="4"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300"
                    placeholder="123">
                </div>

                <div>
                  <label for="billing-country" class="block text-gray-700 text-sm font-bold mb-2">البلد *</label>
                  <select id="billing-country" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                    <option value="">اختر البلد</option>
                    <option value="EG">مصر</option>
                    <option value="SA">السعودية</option>
                    <option value="AE">الإمارات</option>
                    <option value="US">الولايات المتحدة</option>
                  </select>
                </div>
              </div>

              <!-- Terms and Conditions -->
              <div class="mb-6">
                <label class="flex items-center">
                  <input type="checkbox" id="terms-checkbox" required
                    class="mr-2 h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                  <span class="text-sm text-gray-700">
                    أوافق على <a href="#" class="text-blue-600 hover:underline">الشروط والأحكام</a> و <a href="#"
                      class="text-blue-600 hover:underline">سياسة الخصوصية</a>
                  </span>
                </label>
              </div>

              <!-- Security Notice -->
              <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                  <div class="text-green-600 text-xl mr-3">🔒</div>
                  <div>
                    <h5 class="font-semibold text-green-800">دفع آمن ومحمي</h5>
                    <p class="text-sm text-green-700">جميع معلوماتك محمية بتشفير SSL 256-bit</p>
                  </div>
                </div>
              </div>

              <!-- Payment Button -->
              <button type="submit" id="pay-button"
                class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white py-4 px-8 rounded-lg font-bold text-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <span class="flex items-center justify-center">
                  <span class="text-2xl mr-2">💳</span>
                  ادفع الآن $1,428.90
                </span>
              </button>
            </form>
          </div>

          <!-- PayPal Form (Hidden by default) -->
          <div id="paypal-form" class="payment-form hidden">
            <div class="text-center py-12">
              <div class="text-6xl mb-4">🅿️</div>
              <h4 class="text-2xl font-bold text-gray-800 mb-4">الدفع عبر PayPal</h4>
              <p class="text-gray-600 mb-8">سيتم توجيهك إلى PayPal لإتمام عملية الدفع</p>
              <button
                class="bg-yellow-500 text-white py-4 px-8 rounded-lg font-bold text-lg hover:bg-yellow-600 transition-colors duration-300">
                الانتقال إلى PayPal
              </button>
            </div>
          </div>
          <!-- Bank Transfer Form (Hidden by default) -->
          <div id="bank-transfer-form" class="payment-form hidden">
            <form action="/booking/{{ $package->slug }}" method="POST">
              @csrf
              <div class="text-center py-12">
                <div class="text-6xl mb-4">🏦</div>
                <h4 class="text-2xl font-bold text-gray-800 mb-4">التحويل البنكي</h4>
                <div class="bg-gray-50 rounded-lg p-6 text-right">
                  <h5 class="font-bold mb-4">تفاصيل الحساب البنكي:</h5>
                  <p><strong>اسم البنك:</strong> البنك الأهلي المصري</p>
                  <p><strong>رقم الحساب:</strong> 1234567890123456</p>
                  <p><strong>IBAN:</strong> EG380003000000001234567890123</p>
                  <p><strong>SWIFT Code:</strong> NBEAEGCX</p>
                  <p class="mt-4 text-sm text-gray-600">يرجى إرسال إيصال التحويل عبر البريد الإلكتروني</p>
                </div>
              </div>
              <div>
                <button type="submit"
                  class="p-4 rounded flex items-center justify-center text-white font-semibold mr-auto bg-blue-600">ادفع</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Success Modal (Hidden by default) -->
  <div id="success-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-2xl p-8 max-w-md mx-4 text-center">
      <div class="text-6xl mb-4">✅</div>
      <h3 class="text-2xl font-bold text-green-600 mb-4">تم الدفع بنجاح!</h3>
      <p class="text-gray-600 mb-6">تم تأكيد حجزك وسيتم إرسال تفاصيل الرحلة إلى بريدك الإلكتروني</p>
      <button onclick="closeSuccessModal()"
        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300">
        العودة إلى لوحة التحكم
      </button>
    </div>
  </div>

  <script>
    let selectedPaymentMethod = 'credit-card';

    function selectPaymentMethod(element, method) {
      // Remove selected class from all payment methods
      document.querySelectorAll('.payment-method').forEach(el => {
        el.classList.remove('selected');
      });

      // Add selected class to clicked element
      element.classList.add('selected');
      selectedPaymentMethod = method;

      // Hide all payment forms
      document.querySelectorAll('.payment-form').forEach(form => {
        form.classList.add('hidden');
      });

      // Show selected payment form
      document.getElementById(method + '-form').classList.remove('hidden');
    }

    function formatCardNumber(input) {
      let value = input.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
      let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
      input.value = formattedValue;
    }

    function formatExpiryDate(input) {
      let value = input.value.replace(/\D/g, '');
      if (value.length >= 2) {
        value = value.substring(0, 2) + '/' + value.substring(2, 4);
      }
      input.value = value;
    }

    function processPayment(event) {
      event.preventDefault();

      // Show loading state
      const payButton = document.getElementById('pay-button');
      const originalText = payButton.innerHTML;
      payButton.innerHTML =
        '<span class="flex items-center justify-center"><span class="animate-spin mr-2">⏳</span>جاري المعالجة...</span>';
      payButton.disabled = true;

      // Simulate payment processing
      setTimeout(() => {
        // Reset button
        payButton.innerHTML = originalText;
        payButton.disabled = false;

        // Show success modal
        document.getElementById('success-modal').classList.remove('hidden');

        // Update payment status
        document.getElementById('payment-status').innerHTML =
          '<span class="status-paid text-white px-3 py-1 rounded-full text-sm font-bold">مدفوع</span>';
      }, 3000);
    }

    function closeSuccessModal() {
      document.getElementById('success-modal').classList.add('hidden');
      // Redirect to dashboard
      window.location.href = 'user_dashboard.html';
    }

    // Form validation
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('payment-form');
      const inputs = form.querySelectorAll('input[required], select[required]');

      inputs.forEach(input => {
        input.addEventListener('blur', function () {
          if (this.value.trim() === '') {
            this.classList.add('border-red-500');
          } else {
            this.classList.remove('border-red-500');
            this.classList.add('border-green-500');
          }
        });
      });
    });
  </script>
  </body>

  </html>

</x-layouts.app>