<?php

namespace App\Http\Controllers;

use Response;
use Request;
use Redirect;
use Session;
use Input;
use Validator;
use App\posts;


class BlogController extends Controller {

    public function getNewposts() {
        return view('blog/newposts');
    }

    public function getNewblogs() {
        return view('blog/newblogs');
    }

    public function getFindblogs() {
        return view('blog/findblogs');
    }

        public function postPosts(){
        
        $input = Input::only('name', 'title', 'mainbody');
    		// 記事を DB に追加
		$post = posts::create([
			'name' => $input['name'],
			'title' => $input['title'],
			'mainbody' => $input['mainbody'],
		]);
		$post->save();
        return view('blog.newposts');
        }
    
}
