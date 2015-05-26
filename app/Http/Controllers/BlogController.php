<?php

namespace App\Http\Controllers;

class BlogController extends Controller {

    public function getNewposts() {
         return view('blog/newposts');
    }


}
