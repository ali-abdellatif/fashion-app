<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'title' => [
                    'en' => 'Glamorous<br>Glam',
                    'ar' => 'جلامور<br>جلام'
                ],
                'subtitle' => [
                    'en' => 'From casual to formal, we\'ve got you covered',
                    'ar' => 'من الكاجوال إلى الرسمي، نحن نغطي احتياجاتك'
                ],
                'button_text' => [
                    'en' => 'Shop collection',
                    'ar' => 'تسوق المجموعة'
                ],
                'button_url' => 'shop-default.html',
                'image' => 'images/slider/fashion-slideshow-01.jpg',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Simple <br>Style',
                    'ar' => 'أناقة<br>بسيطة'
                ],
                'subtitle' => [
                    'en' => 'From casual to formal, we\'ve got you covered',
                    'ar' => 'من الكاجوال إلى الرسمي، نحن نغطي احتياجاتك'
                ],
                'button_text' => [
                    'en' => 'Shop collection',
                    'ar' => 'تسوق المجموعة'
                ],
                'button_url' => 'shop-default.html',
                'image' => 'images/slider/fashion-slideshow-02.jpg',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => [
                    'en' => 'Glamorous<br>Glam',
                    'ar' => 'جلامور<br>جلام'
                ],
                'subtitle' => [
                    'en' => 'From casual to formal, we\'ve got you covered',
                    'ar' => 'من الكاجوال إلى الرسمي، نحن نغطي احتياجاتك'
                ],
                'button_text' => [
                    'en' => 'Shop collection',
                    'ar' => 'تسوق المجموعة'
                ],
                'button_url' => 'shop-default.html',
                'image' => 'images/slider/fashion-slideshow-03.jpg',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
