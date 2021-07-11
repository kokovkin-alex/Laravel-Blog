<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleController extends Controller
{
    protected $service;

    public function __construct(ArticleService $service)
    {
        $this->service = $service;
    }

    public function show(Request $request)
    {
        $article = $this->service->getArticleBySlug($request->slug);
        return new ArticleResource($article);
    }

    public function incrementViews(Request $request)
    {
        $article = $this->service->getArticleBySlug($request->slug);
        $article->state->increment('views');
        return new ArticleResource($article);
    }

    public function incrementLikes(Request $request)
    {
        $article = $this->service->getArticleBySlug($request->slug);
        $inc = $request->increment;
        $inc ? $article->state->increment('likes') : $article->state->decrement('likes');
        return new ArticleResource($article);
    }
}
