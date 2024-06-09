<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function singlePost($id)
    {
        $user = auth()->user();
        $post = Post::find($id);

        if (Gate::denies('view-post', $post)) {
            abort(403);
        }

        return view('single_post', [
            'user' => $user,
            'post' => Post::find($id),
            'id' => $id,
        ]);
    }

    public function posts()
    {

    }
}
