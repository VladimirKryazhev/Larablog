<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $password = Str::random(10); //Генератор пароля, внимание, дбыть use Illuminate\Support\Str;
        $data['password'] = Hash::make($password);//при помощи класса Хэш и метода мейк мы секретим наш пароль
        $user = User::firstOrCreate(['email' => $data['email']], $data);// в скобках проверка пользователя по переменной, т.е. по email

        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
        return redirect()->route('admin.user.index');
    }
}
