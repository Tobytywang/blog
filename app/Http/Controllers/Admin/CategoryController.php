<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected $category;
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('/admin/category', compact('categories'));
    }

    public function new_category(StoreCategory $request)
    {
        // 新增不能超过8个
        if(DB::table('categories')->where('father', '=', 0)->count() >= 8){
            return redirect()->to('admin/category');
        }
        DB::table('categories')->insert(['name' => request('name'), 'father' => request('father'), 'path' => '/category/'. request('name'), 'type' => 'column']);
        return redirect()->to('admin/category');
    }

    public function del_category()
    {
        DB::table('categories')->where('id', '=', request('id'))->delete();
        return redirect()->to('admin/category');
    }

    public function update_category()
    {
        DB::table('categories')->insert(['name' => request('name'), 'father' => request('father'), 'path' => '/category/'. request('name'), 'type' => 'column']);
        return redirect()->to('admin/category');
    }
}
