<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Nature',
            'Portrait',
            'Wedding',
            'Travel',
            'Wildlife',
            'Street',
            'Sports',
            'Food',
            'Architecture',
            'Fashion',
            'Abstract',
            'Black and White',
            'Macro',
            'Night',
            'Event',
            'Documentary',
            'Aerial',
            'Fine Art',
            'Underwater',
            'Commercial',
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name =$category;
            $newCategory->save();
        }
    }
}
