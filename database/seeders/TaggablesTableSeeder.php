<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Tag;

class TaggablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::inRandomOrder()->limit(3)->get();
        foreach ($tags as $tag) {
            $tag->articles()->attach(Article::inRandomOrder()->limit(3)->get());
        }
        $articles = Article::inRandomOrder()->limit(3)->get();
        foreach ($articles as $article) {
            $article->tags()->attach(Tag::inRandomOrder()->limit(3)->get());
        }
    }
}
