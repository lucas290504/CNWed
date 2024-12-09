<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'publication_year' => 2008,
                'genre' => 'Programming',
                'library_id' => 1,
            ],
            [
                'title' => 'The Pragmatic Programmer',
                'author' => 'Andrew Hunt & David Thomas',
                'publication_year' => 1999,
                'genre' => 'Programming',
                'library_id' => 1,
            ],
            [
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'publication_year' => 2014,
                'genre' => 'History',
                'library_id' => 2,
            ],
        ]);
    }
}
