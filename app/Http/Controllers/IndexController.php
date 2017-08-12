<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    // // article作为保护变量！
    // protected $article;
    //
    // // 构造函数
    // public function __construct(ArticleRepository $article)
    // {
    //     $this->article = $article;
    // }
    //
    // /**
    //  * Display the dashboard page.
    //  *
    //  * @return mixed
    //  */
    // public function dashboard()
    // {
    //     return view('dashboard.index');
    // }
    //
    // /**
    //  * Search the article by keyword.
    //  *
    //  * @param  Request $request
    //  * @return mixed
    //  */
    // public function search(Request $request)
    // {
    //     $key = trim($request->get('q'));
    //
    //     $articles = $this->article->search($key);
    //
    //     return view('search', compact('articles'));
    // }
    public function index(){
      echo "这是吴弓的博客";
    }
}
