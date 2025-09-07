<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // توليد عنوان مختلف لكل باكدج
        $titles = [
            "باقة الغردقة الكبرى",
            "باقة الأقصر التاريخية",
            "باقة شرم الشيخ الغوصية",
            "باقة أسوان النيلية",
            "باقة الإسكندرية الساحلية"
        ];

        $title = $this->faker->randomElement($titles);

        // توليد وصف عشوائي
        $descriptions = [
            "رحلة ساحرة إلى البحر الأحمر، استمتع بالسباحة والغوص وسط الشعاب المرجانية.",
            "جولة تاريخية ممتعة مع زيارة المعابد والأماكن الأثرية.",
            "رحلة استرخاء على الشاطئ مع أنشطة مائية ممتعة لجميع الأعمار.",
            "تجربة نيلية ساحرة، مع رحلات القوارب وزيارات للأقصر وأسوان.",
            "جولة ساحلية في الإسكندرية مع تذوق المأكولات البحرية وزيارة المعالم."
        ];

        $description = $this->faker->randomElement($descriptions);

        // نولّد تاريخ البداية والنهاية
        $startDate = $this->faker->dateTimeBetween('now', '+3 months');
        $endDate = (clone $startDate)->modify('+' . rand(3, 14) . ' days');

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . $this->faker->unique()->numberBetween(1, 100)),
            'image_url' => 'images/redsea.jpg',
            'description' => $description,
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'price' => $this->faker->randomFloat(2, 1000, 10000),
        ];
    }
}