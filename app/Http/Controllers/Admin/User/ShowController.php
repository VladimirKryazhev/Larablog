<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(User $user)
    {
        return view('admin.user.show', compact('user'));// с помощью компакта делаем доступным переменную user во view index в функции
    }
}
