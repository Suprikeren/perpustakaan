<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sejarah',
            'Biografi',
            'Sains',
            'Teknologi',
            'Agama',
            'Sastra',
            'Pendidikan',
            'Psikologi',
        ];

        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
            ]);
        }
    }
}
