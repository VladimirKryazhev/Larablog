<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));// с помощью компакта делаем доступным переменную категориес во view index в функции
    }
}
