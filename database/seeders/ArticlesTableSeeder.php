<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Article;
use Carbon\Carbon;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::factory()->count(10)->create();
        
        $publishedArticleCount = Article::get()->whereNotNull('published_at')->count();
        while ($publishedArticleCount<5) {
            $article = \App\Models\Article::factory(1)->create();
            if ($article[0]['published_at'] != null)
            {
                $publishedArticleCount += 1;
            }
        }

    }
}
