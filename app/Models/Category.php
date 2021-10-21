<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';// привязываем модель к таблице явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту


    public function posts()//один ко многим, у категории много постов
    {
        return $this->hasMany(Post::class, 'category_id', 'id' );
    }


}
