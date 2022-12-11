<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'name' => 'Oxford Dictionary',
            'price' => 7000,
            'description' => 'literature language Dictionary',
            'category_id' => 2,
        ]);

        Book::create([
            'name' => 'Differential Equations',
            'price' => 9000,
            'description' => 'Essential Skills Practice Workbook with Answers',
            'category_id' => 1,
        ]);
    }
}
