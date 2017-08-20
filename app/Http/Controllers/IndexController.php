<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $articles = DB::table('articles')->orderBy('created_at', 'desc')->paginate(15);
        $categories = DB::table('categories')->get();
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }

    public function category($category){
//        if (!$category = DB::table('categories')->where('name', '=', $category)->) abort(404);
        $cate_id = DB::table('categories')->where('name', $category)->value('id');
        $categories = DB::table('categories')->get();
        $articles = DB::table('articles')->where('category_id', $cate_id)->paginate(15);
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }
}
