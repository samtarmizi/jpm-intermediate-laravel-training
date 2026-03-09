<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::create([
            'title' => 'Blog 1',
            'content' => 'Content 1',
            'user_id' => 1,
        ]);
    }
}
