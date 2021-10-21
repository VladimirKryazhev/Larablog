<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {

        $date = Carbon::parse($post->created_at); //для вывода даты на странице Шоу с одним постом
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)// убираем из вывода схожих постов тот пост в котором эти посты и показываются во вью Шоу
            ->get()
            ->take(3);//связываем схожие посты для вывода во вью шоу на странице с одним постом

        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
