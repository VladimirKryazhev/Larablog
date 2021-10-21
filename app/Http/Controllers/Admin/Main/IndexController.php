<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = []; // создаем массив и доваляем в него все что снизу
        $data ['usersCount'] = User::all()->count();//счситаем все с помошью каунт
        $data ['postsCount'] = Post::all()->count();
        $data ['categoriesCount'] = Category::all()->count();
        $data ['tagsCount'] = Tag::all()->count();
        return view('admin.main.index', compact('data'));// передаем массив с данными в вид через компакт
    }
}
