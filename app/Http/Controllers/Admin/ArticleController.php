<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Requests\StoreArticle;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //
    public function index()
    {
        $articles = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view('/admin/article', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('/admin/article_new', compact('categories'));
    }
    public function new_article(StoreArticle $request)
    {
        // DB::table('articles')->insert([
        //     'title'        =>  request('title'),
        //     'slug'         =>  '/article/'.request('slug'),
        //     'category_id'  =>  request('category_id'),
        //     'content'      =>  request('test-editormd-html-code'),
        //     'markdown'     =>  request('markdown'),
        // ]);
        $article = new Article;
        $article->title       = request('title');
        $article->slug        = '/article/'.request('slug');
        $article->category_id = request('category_id');
        $article->content     = request('test-editormd-html-code');
        $article->markdown    = request('markdown');
        $article->save();
        return redirect()->to('admin/article');
    }

    public function del_article()
    {
        DB::table('articles')->where('id', '=', request('id'))->delete();
        return redirect()->to('admin/article');
    }
}
