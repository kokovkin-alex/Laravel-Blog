<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticleBySlug($slug)
    {
        return Article::findBySlug($slug);
    }
}
