<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Destination>
 */
class DestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $governorates = [
            "القاهرة",
            "الجيزة",
            "القليوبية",
            "الإسكندرية",
            "البحيرة",
            "مطروح",
            "دمياط",
            "الدقهلية",
            "كفر الشيخ",
            "الغربية",
            "المنوفية",
            "الشرقية",
            "بورسعيد",
            "الإسماعيلية",
            "السويس",
            "شمال سيناء",
            "جنوب سيناء",
            "بني سويف",
            "الفيوم",
            "المنيا",
            "أسيوط",
            "سوهاج",
            "قنا",
            "الأقصر",
            "أسوان",
            "البحر الأحمر",
            "الوادي الجديد"
        ];

        $name = $this->faker->randomElement($governorates);

        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'description' => $this->faker->paragraph(),
            'image_url' => $this->faker->imageUrl(800, 600, 'travel', true),
        ];
    }
}