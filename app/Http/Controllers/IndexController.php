<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Support\Facades\DB;

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
        $cate_id = DB::table('categories')->where('name', $category)->value('id');
        $categories = DB::table('categories')->get();
        $articles = DB::table('articles')->where('category_id', $cate_id)->paginate(15);
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }
}
