<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostApiController extends Controller
{
    //
    public function index() {
        return Post::all();
    }

    public function store(){
        
        $data = request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);
        if (Post::create($data)){
            return [
                "success"=>true
            ];
        }
    
    }

    public function show(Post $post){
        return $post;
    }

    public function update(Post $post) {
        $data = request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        if ($post->update($data)){
            return [
                "success"=>true
            ];
        }
    
    }

    public function destroy(Post $post) {
    
        $success = $post->delete();
    
        return ["success"=>$success];
    
    }




}
