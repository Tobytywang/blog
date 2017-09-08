<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategory;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;


class CategoryController extends Controller
{
    protected $category;

    // 首页
    public function index()
    {
        $categories = Category::all();
        return view('/admin/category', compact('categories'));
    }

    // 处理post请求
    public function new_category(StoreCategory $request)
    {
        if (Category::roots()->count() >= 7)
        {
            return redirect()->to('admin/category');
        }
        $category = Category::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'path' => '/category/'. request('slug'),
            'type' => request('type')
        ]);
        if (request('father') == 0){
            $category->parent_id = null;
            $category->save();
        } else {
            $father = Category::where('parent_id', '=', request('father'));
            $category->makeChildOf($father);
        }
        return redirect()->to('admin/category');
    }

    // 删除目录
    public function del_category()
    {
        // 如果栏目下有内容（其他栏目或者文章）不能删除
        // if(Category::where('category_id', '=', request('id'))->count() != 0)
        // $articles = Article::withCount('category')->get();
        // for 
        if ((Category::where('parent_id', '=', request('id'))->count()>0) ||
            (Article::where('category_id', '=', request('id'))->count() > 0))
        {
            return redirect()->to('admin/category');
        }
        Category::where('id', '=', request('id'))->delete();
        return redirect()->to('admin/category');
    }

    // 更新目录的内容
    public function update_category()
    {
        Category::insert(['name' => request('name'), 'father' => request('father'), 'path' => '/category/'. request('name'), 'type' => 'column']);
        return redirect()->to('admin/category');
    }
}
