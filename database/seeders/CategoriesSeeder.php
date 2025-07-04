<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data kategori yang ingin dimasukkan
        $categories = [
            ['nama_kategori' => 'UMKM'],
            ['nama_kategori' => 'Instansi'],
            ['nama_kategori' => 'Perusahaan'],
        ];

        // Masukkan data ke tabel categories
        foreach ($categories as $category) {
            Categories::create($category);
        }
    }
}