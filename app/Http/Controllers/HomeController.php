<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
//        BAD загружаются все записи, только потом берутся 6
//        $articles = Article::orderBy('created_at', 'desc')->get()->take(6);

//        BAD загружаются все зависимости, N + 1
//        $articles = Article::orderBy('created_at', 'desc')->limit(6)->get();

//        BAD надо сделать scope который можно вызывать в разных местах сайта
//        $articles = Article::with('state', 'tags')->orderBy('created_at', 'desc')->limit(6)->get();

        $articles = Article::lastLimit(6);
        return view('app.home', compact('articles'));
    }
}
