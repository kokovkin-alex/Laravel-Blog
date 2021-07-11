<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
    public function getArticleBySlug($request)
    {
        return Article::findBySlug($request->slug);
    }
}
