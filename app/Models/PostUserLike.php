<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostUserLike extends Model
{
    use HasFactory;

    protected $table = 'post_user_likes';// привязываем модель к таблице post_user_likes явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту

}
