<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleCommentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Article::factory()
            ->count(30)
            ->hasComments(5)
            ->create();
    }
}
