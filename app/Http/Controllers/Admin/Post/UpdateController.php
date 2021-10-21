<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();//обрабатываем запрос


        //Получаем обновленный $post и передаем его дальше в вид
        $post = $this->service->update($data, $post);//взаимодействие с БД через BaseController и PostService

        return view('admin.post.show', compact('post'));
    }
}
