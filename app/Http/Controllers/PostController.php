<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return 'Delete success';
    }
}
