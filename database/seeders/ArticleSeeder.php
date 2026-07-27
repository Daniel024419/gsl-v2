<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('news.articles') as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                [
                    'cat' => $article['cat'],
                    'title' => $article['title'],
                    'excerpt' => $article['excerpt'],
                    'body' => $article['body'],
                    'published_at' => Carbon::parse($article['date']),
                    'read' => $article['read'],
                    'author' => $article['author'],
                    'image' => $article['image'],
                    'icon' => $article['icon'],
                ]
            );
        }
    }
}
