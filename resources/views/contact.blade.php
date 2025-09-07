<x-layouts.app>

    <section class="contact-bg py-32 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">اتصل بنا</h1>
            <p class="text-xl mb-8">نحن هنا لمساعدتك في تخطيط رحلتك المثالية إلى مصر</p>
        </div>
    </section>
    <style>
        .contact-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%23264653" width="1200" height="600"/><polygon fill="%232a9d8f" points="0,600 400,200 800,400 1200,100 1200,600"/></svg>');
            background-size: cover;
            background-position: center;
        }
    </style>
    <!-- Contact Information Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                <!-- Phone -->
                <div class="text-center p-8 bg-gray-50 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">📞</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">اتصل بنا</h3>
                    <p class="text-gray-600 mb-2">0105 062 2361</p>
                    <p class="text-gray-600">متاح 24/7</p>
                </div>

                <!-- Email -->
                <div class="text-center p-8 bg-gray-50 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">✉️</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">راسلنا</h3>
                    <p class="text-gray-600 mb-2">info@egydestinations.com</p>
                    <p class="text-gray-600">نرد خلال 24 ساعة</p>
                </div>

                <!-- Location -->
                <div class="text-center p-8 bg-gray-50 rounded-lg hover:shadow-lg transition-shadow">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">📍</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-gray-800">موقعنا</h3>
                    <p class="text-gray-600 mb-2">القاهرة، مصر</p>
                    <p class="text-gray-600">مكتب رئيسي</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-4 text-gray-800">أرسل لنا رسالة</h2>
                    <p class="text-gray-600">املأ النموذج أدناه وسنتواصل معك في أقرب وقت ممكن</p>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">الاسم الكامل *</label>
                            <input type="text" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">البريد الإلكتروني *</label>
                            <input type="email" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">رقم الهاتف</label>
                            <input type="tel"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Subject -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2">الموضوع *</label>
                            <select required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition-colors">
                                <option value="">اختر الموضوع</option>
                                <option value="booking">حجز رحلة</option>
                                <option value="inquiry">استفسار عام</option>
                                <option value="complaint">شكوى</option>
                                <option value="suggestion">اقتراح</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">الرسالة *</label>
                            <textarea required rows="6"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition-colors"
                                placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="md:col-span-2 text-center">
                            <button type="submit"
                                class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition-colors font-bold text-lg">
                                إرسال الرسالة
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">موقعنا على الخريطة</h2>
                <p class="text-gray-600">زورنا في مكتبنا الرئيسي في القاهرة</p>
            </div>

            <div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white text-2xl">🗺️</span>
                    </div>
                    <p class="text-gray-600">خريطة تفاعلية - القاهرة، مصر</p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 text-gray-800">الأسئلة الشائعة</h2>
                <p class="text-gray-600">إجابات على أكثر الأسئلة شيوعاً</p>
            </div>

            <div class="max-w-4xl mx-auto space-y-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">كيف يمكنني حجز رحلة؟</h3>
                    <p class="text-gray-600">يمكنك حجز رحلة من خلال موقعنا الإلكتروني أو الاتصال بنا مباشرة على الرقم
                        المذكور أعلاه. فريقنا سيساعدك في اختيار الباقة المناسبة لك.</p>
                </div>

                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">هل تقدمون رحلات مخصصة؟</h3>
                    <p class="text-gray-600">نعم، نحن متخصصون في تصميم رحلات مخصصة حسب احتياجاتك وميزانيتك. تواصل معنا
                        لمناقشة متطلباتك الخاصة.</p>
                </div>

                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">ما هي طرق الدفع المتاحة؟</h3>
                    <p class="text-gray-600">نقبل جميع طرق الدفع الرئيسية بما في ذلك البطاقات الائتمانية والتحويل البنكي
                        والدفع النقدي في المكتب.</p>
                </div>

                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold mb-3 text-gray-800">هل تشمل الباقات التأمين؟</h3>
                    <p class="text-gray-600">نعم، جميع باقاتنا تشمل التأمين الأساسي. كما يمكنك إضافة تأمين شامل مقابل
                        رسوم
                        إضافية.</p>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>