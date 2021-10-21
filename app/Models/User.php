<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    // Делаем роли для пользователей через константы и статик метод
    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
//Прием мэппинг, это соответствие, на фронт придут не 0 или 1 а Админ или Читатель
    public static function getRoles()
    {
        return[
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Читатель',

        ];
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        $this->notify(new SendVerifyWithQueueNotification());
    }

    public function likedPosts()
    {

        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

    public function comments()
    {
        return$this->hasMany(Comment::class, 'user_id', 'id' );
    }






}
