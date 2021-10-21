<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';// привязываем модель к таблице явно
    protected $guarded = false;//прописываем для возможности внесения данных в таблицы, снимаем защиту

    public function user()// отношение один ко многим , связь комментариев к статьям на странице с отдельной статьей show.blade
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);


    }


}
