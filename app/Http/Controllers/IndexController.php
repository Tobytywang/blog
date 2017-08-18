<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Article;
use App\Category;
use Illuminate\Support\Facades\DB;

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
        $articles = DB::table('articles')->orderBy('created_at', 'desc')->get();
        $categories = DB::table('categories')->get();
//      $users = DB::table('users')->whereBetween('votes', [1, 100])->get();
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
//      echo view('index');
    }

    public function category($category){
        $cate_id = DB::table('categories')->where('name', $category)->value('id');
//        $categories = Category::get()->value('name');
        $categories = DB::table('categories')->get();
        $articles = DB::table('articles')->where('category_id', $cate_id)->get();
        return view("index", compact(['articles' => 'articles', 'categories' => 'categories']));
    }
}
