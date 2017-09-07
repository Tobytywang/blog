<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
// use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(15);
        $categories = Category::all();
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }

    public function category($category){
        if (Category::where('name', '=', $category)->count() <= 0) {
         return view("404");
        }
        $cate_id = Category::where('name', $category)->value('id');
        $categories = category::all();
        $articles = Article::where('category_id', $cate_id)->paginate(15);
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }
    public function article($id){
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view("article", compact(['article' => 'article', 'categories' => 'categories']));
    }
}
