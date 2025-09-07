<x-layouts.app>
  <!-- Hero Section -->
  <section class="hero-bg min-h-screen flex items-center justify-center text-white">
    <div class=" container mx-auto px-4 text-center">
      <h1 class="text-5xl md:text-6xl font-bold mb-6">
        اكتشف عجائب مصر القديمة
        <br>
        مع Egypt Destinations
      </h1>
      <p class="text-xl mb-8">اعثر على ما يسعدك في أي وقت وأي مكان</p>

      <!-- Search Form -->
      <form action="">
        <div class="bg-white rounded-lg p-6 max-w-4xl mx-auto shadow-2xl">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="text-right">
              <label class="block text-gray-700 text-sm font-bold mb-2">الوجهة</label>
              <input type="text" name="destination" placeholder="إلى أين تريد الذهاب؟"
                class="w-full p-3 border rounded-lg text-gray-700">
            </div>
            <div class="text-right">
              <label class="block text-gray-700 text-sm font-bold mb-2">تاريخ الوصول</label>
              <input type="date" name="check_in" class="w-full p-3 border rounded-lg text-gray-700">
            </div>
            <div class="text-right">
              <label class="block text-gray-700 text-sm font-bold mb-2">تاريخ المغادرة</label>
              <input type="date" name="check_out" class="w-full p-3 border rounded-lg text-gray-700">
            </div>
            <div class="flex items-end">
              <button type="submit"
                class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition font-bold">
                بحث
              </button>
      </form>
    </div>
    </div>
    </div>
    </div>
  </section>

  <!-- Day Trips Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">

      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">الرحلات اليومية والوجهات</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @foreach ($destinations as $destination)
          <div class="text-center group cursor-pointer">
            <div class="relative overflow-hidden rounded-full w-48 h-48 mx-auto mb-4">
              <img src="{{ asset($destination->image_url) }}" alt="{{ $destination->name }}"
                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
              <div class="absolute bottom-4 left-0 right-0 text-white">
                <h3 class="font-bold text-lg">{{ $destination->name }}</h3>
                <p class="text-sm">{{ $destination->id }} رحلة</p>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- Tour Packages Section -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">الباقات السياحية</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($packages as $package)
          <!-- Package Card -->
          <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
            <div class="relative">
              <img src="{{ asset($package->image_url) ?? 'https://via.placeholder.com/600x400' }}"
                alt="{{ $package->title }}" class="w-full h-48 object-cover">

              <!-- Badge مدة الرحلة -->
              <div class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                {{ \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date)) }}
                يوم
              </div>
            </div>
            <div class="p-6">
              <a href="/packages/{{ $package->slug }}" class=" block text-xl font-bold mb-2">{{ $package->title }}</a>
              <div class="flex items-center mb-2">
                <div class="flex gap-0.5">
                  <i class="fa-regular fa-star text-yellow-400 text-sm"></i>
                  <i class="fa-regular fa-star text-yellow-400 text-sm"></i>
                  <i class="fa-regular fa-star text-yellow-400 text-sm"></i>
                  <i class="fa-regular fa-star text-yellow-400 text-sm"></i>
                  <i class="fa-regular fa-star text-yellow-400 text-sm"></i>
                </div>
                <span class="text-gray-600 mr-2">(لا توجد مراجعات)</span>
              </div>
              <div class="flex justify-between items-center">
                <span class="text-2xl font-bold text-blue-600">${{ $package->price }}</span>
                <span class="text-gray-600">
                  {{ \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date)) }}
                  يوم
                  {{ \Carbon\Carbon::parse($package->start_date)->diffInDays(\Carbon\Carbon::parse($package->end_date)) - 1 }}
                  ليلة
                </span>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="text-center mt-12">
        <a href="/packages" class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition font-bold">
          استكشف جميع الباقات
        </a>
      </div>
    </div>
  </section>

  <!-- Categories Section -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">فئاتنا</h2>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Hotels -->
        <div
          class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-2xl transition-shadow duration-500">
          <img src="{{ asset('images/hotel.jpg') }}" alt="أسعار الفنادق" class="w-full h-64 object-cover ">

          <!-- Gradient using before -->
          <div
            class="absolute inset-0 before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/90 before:to-transparent before:content-[''] before:z-10">
          </div>

          <!-- النص فوق الـ before -->
          <div
            class="absolute bottom-6 right-6 text-white z-20 transition-all duration-700 ease-in-out group-hover:-translate-y-2">
            <h3 class="text-2xl font-bold mb-2">أسعار الفنادق</h3>
            <p class="text-sm">فنادقنا تقدم إقامة فاخرة في أجمل الوجهات الساحلية في مصر.</p>
          </div>
        </div>

        <!-- Day Trips -->
        <div
          class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-2xl transition-shadow duration-500">
          <img src="{{ asset('images/daily.jpg') }}" alt="رحلات يومية" class="w-full h-64 object-cover ">

          <div
            class="absolute inset-0 before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:content-[''] before:z-10">
          </div>

          <div
            class="absolute bottom-6 right-6 text-white z-20 transition-all duration-700 ease-in-out group-hover:-translate-y-2">
            <h3 class="text-2xl font-bold mb-2">رحلات يومية</h3>
            <p class="text-sm">وقت قصير ولكن تتوق للمغامرة؟ رحلاتنا اليومية هي الهروب المثالي.</p>
          </div>
        </div>

        <!-- Tour Packages -->
        <div
          class="relative group cursor-pointer overflow-hidden rounded-lg shadow-md hover:shadow-2xl transition-shadow duration-500">
          <img src="{{ asset('images/packge.jpg') }}" alt="باقات سياحية" class="w-full h-64 object-cover ">

          <div
            class="absolute inset-0 before:absolute before:inset-0 before:bg-gradient-to-t before:from-black/80 before:to-transparent before:content-[''] before:z-10">
          </div>

          <div
            class="absolute bottom-6 right-6 text-white z-20 transition-all duration-700 ease-in-out group-hover:-translate-y-2">
            <h3 class="text-2xl font-bold mb-2">باقات سياحية</h3>
            <p class="text-sm">دعنا نتولى كل تفاصيل رحلتك مع باقاتنا السياحية المخصصة.</p>
          </div>
        </div>

      </div>
    </div>

  </section>

  <!-- Explore Egypt Section -->
  <section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">استكشف الوجوه المتعددة لمصر</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div>
          <h3 class="text-2xl font-bold mb-4 text-blue-900">مغامرات الصحراء والهروب الطبيعي</h3>
          <p class="text-gray-700 leading-relaxed">
            وراء المدن تكمن أرض المغامرة - سواء كان التزلج على الرمال في الكثبان الرملية، أو التخييم تحت النجوم في
            الصحراء البيضاء، أو الاستحمام في الينابيع الساخنة في واحة سيوة، فإن طبيعة مصر خام ولا تُنسى.
          </p>
        </div>
        <div class="relative">
          <img src="{{asset('images/egyptdesert.jpg')}}" alt="مغامرات الصحراء"
            class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div class="order-2 md:order-1 relative">
          <img src="{{asset('images/cairo.jpg')}}" alt="المدن النابضة بالحياة"
            class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>
        <div class="order-1 md:order-2">
          <h3 class="text-2xl font-bold mb-4 text-blue-900">المدن النابضة بالحياة والثقافة الحديثة</h3>
          <p class="text-gray-700 leading-relaxed">
            من شوارع القاهرة الصاخبة إلى الأجواء الفنية في الإسكندرية وسحر الأقصر وأسوان، تقدم مصر مزيجاً من الروح
            القديمة والحياة الحديثة.
          </p>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-16">
        <div>
          <h3 class="text-2xl font-bold mb-4 text-blue-900">التاريخ الغني والعجائب القديمة</h3>
          <p class="text-gray-700 leading-relaxed">
            ارجع بالزمن إلى الوراء واستكشف إرث واحدة من أقدم الحضارات في العالم. مصر متحف حي مليء بالكنوز الخالدة.
          </p>
        </div>
        <div class="relative">
          <img src="{{asset('images/luxor.jpg')}}" alt="العجائب القديمة"
            class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="order-2 md:order-1 relative">
          <img src="{{asset('images/redsea.jpg')}}" alt="الشواطئ الخلابة"
            class="w-full h-64 object-cover rounded-lg shadow-lg">
        </div>
        <div class="order-1 md:order-2">
          <h3 class="text-2xl font-bold mb-4 text-blue-900">الشواطئ الخلابة ومنتجعات البحر الأحمر</h3>
          <p class="text-gray-700 leading-relaxed">
            اكتشف الشواطئ ذات المستوى العالمي والمياه الصافية والشعاب المرجانية النابضة بالحياة في الجواهر الساحلية.
            مثالية للغوص أو الغطس أو مجرد الاسترخاء بجانب البحر.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="py-16 bg-blue-900 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-4xl font-bold mb-6">خصص رحلتك بطريقتك</h2>
      <p class="text-xl mb-8">صمم تجربة السفر المثالية عبر مصر - وفقاً لشروطك.</p>
      <button class="bg-white text-blue-900 px-8 py-4 rounded-lg hover:bg-gray-100 transition font-bold text-lg">
        خصص رحلتك
      </button>
    </div>
  </section>

</x-layouts.app>