<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Non-Fiksi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sains & Teknologi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sejarah', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Biografi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Komik & Novel Grafis', 'created_at' => now(), 'updated_at' => now()],
        ];

        // Langsung masukkan ke tabel tanpa lewat Model
        DB::table('categories')->insert($categories);
    }
}
