<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = 'posts';// привязываем модель к таблице явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту

    protected $withCount = ['likedUsers']; //для подсчета лайков в постах и выводим в IndexController

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function category()// Один ко многим (обратное отношение), создаем отношение постов к категориям. Модель Пост, таблица пост, чужой ключ category_id
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function likedUsers()// Многие ко многим отношение с пользователями User и  лайками, связь с таблицей post_user_likes
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function comments()// один ко многим, связываем комментарии с постами для вывода на страницу шоу с одним постом
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');

    }



}
