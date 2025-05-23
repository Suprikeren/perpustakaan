<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('books')->insert([
                'avatar' => 'default/avatar.png', // ganti path sesuai kebutuhan
                'title' => 'Judul Buku ' . $i,
                'author' => 'Penulis ' . $i,
                'publication_date' => Carbon::now()->subYears(rand(1, 10)),
                'isbn' => 'MD' . now()->format('Ymd') . str_pad($i, 4, '0', STR_PAD_LEFT),
                'status' => 'tersedia',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
