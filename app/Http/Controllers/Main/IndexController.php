<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $posts = Post::orderBy('created_at', 'desc')->take(4)->get();
        return view('main.index', compact('posts'));
    }

    public function lte3(): void
    {
        abort(404);
    }

    public function show(Post $post): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('main.show', compact('post'));
    }
}
