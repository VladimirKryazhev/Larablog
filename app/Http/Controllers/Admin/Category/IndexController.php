<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));// с помощью компакта делаем доступным переменную категориес во view index в функции
    }
}
