<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // Get Blog Post

    public function index(){
        $posts = Post::all();

        return response()->json($posts);
    }
}
