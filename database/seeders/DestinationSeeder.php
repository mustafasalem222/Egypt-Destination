<?php

namespace Database\Seeders;
use App\Models\Destination;
use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // إنشاء Destination واحد (مثال)
        $destination = Destination::create([
            'name' => 'الغردقة',
            'slug' => 'alghardaka',
            'description' => 'مدينة ساحلية رائعة',
            'image_url' => 'images/redsea.jpg',
        ]);

        // إنشاء 5 Packages باستخدام Factory
        $packages = Package::factory(5)->create();

        // ربط كل Package بالـ Destination
        foreach ($packages as $package) {
            $package->destinations()->attach($destination->id);
        }
    }
}