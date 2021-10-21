<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));// с помощью компакта делаем доступным переменную users во view index в функции
    }
}
