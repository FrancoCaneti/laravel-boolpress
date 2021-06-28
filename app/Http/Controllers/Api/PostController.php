<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    // Get Blog Post

    public function index(){
        //$posts = Post::all();

        $posts = Post::paginate(2);

        return response()->json($posts);
    }
    //get post details by slug
    public function show($slug){
        dump($slug);
        $post = Post::where('slug', $slug)->with(['category','tags'])->first();
        return responce()->json($post);
    }
}
