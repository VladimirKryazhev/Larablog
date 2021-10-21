<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'post_tags';// привязываем модель к таблице явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту
}
