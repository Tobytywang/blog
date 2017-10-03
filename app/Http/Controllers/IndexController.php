<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
// use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        if (Category::where('slug', '=', 'time')->count() > 0) {
            // $articles = Article::where('category_id', 1)->paginate(15);
            // $categories = Category::where('depth', '=', 0)->get();
            // return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
            return redirect('/category/time');
        } else {
            $articles = Article::orderBy('created_at', 'desc')->paginate(15);
            $categories = Category::where('depth', '=', 0)->get();
            return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));        
        }
    }

    public function category($category){
        if (Category::where('slug', '=', $category)->count() < 0) {
         return view("404")->with('content', $category);
        }
        $cate_id = Category::where('slug', '=', $category)->value('id');
        $categories = Category::where('depth', '=', 0)->get();
        $articles = Article::where('category_id', '=', $cate_id)->paginate(15);
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }
    public function article($id){
        $article = Article::findOrFail($id);
        $categories = Category::where('depth', '=', 0)->get();
        return view("article", compact(['article' => 'article', 'categories' => 'categories']));
    }
}
