<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';// привязываем модель к таблице явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту
}
