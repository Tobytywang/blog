<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategory;
use App\Http\Controllers\Controller;
use App\Category;


class CategoryController extends Controller
{
    protected $category;

    // 首页
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('/admin/category', compact('categories'));
    }

    // 处理post请求
    public function new_category(StoreCategory $request)
    {
        // 新增不能超过8个
        // if(DB::table('categories')->where('father', '=', 0)->count() >= 7)
        if (Category::roots()->count() >= 7)
        {
            return redirect()->to('admin/category');
        }
        $category = Category::create([
            'name' => request('name'),
            'path' => '/category/'. request('name'),
            'type' => 'column'
        ]);
        $father = Category::where('parent_id', '=', request('father'));
        $category->makeChildOf($father);
        return redirect()->to('admin/category');
    }

    // 删除目录
    public function del_category()
    {
        // 如果栏目下有内容不能删除
        if(DB::table('articles')->where('category_id', '=', request('id'))->count() != 0)
        {
            return redirect()->to('admin/category');
        }
        DB::table('categories')->where('id', '=', request('id'))->delete();
        return redirect()->to('admin/category');
    }

    // 更新目录的内容
    public function update_category()
    {
        DB::table('categories')->insert(['name' => request('name'), 'father' => request('father'), 'path' => '/category/'. request('name'), 'type' => 'column']);
        return redirect()->to('admin/category');
    }
}
