<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    function show() {
        return view("post.show");
    }

    function add(){
        return view("post.add");
    }
}
