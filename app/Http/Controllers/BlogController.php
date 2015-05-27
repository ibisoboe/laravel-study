<?php

namespace App\Http\Controllers;

use Response;
use Request;
use Redirect;
use Session;
use Input;
use Validator;
use App\post;
use Illuminate\Contracts\Auth\Authenticatable;

class BlogController extends Controller {

    public function getArticle() {
        return view('blog/article')->withTitle('新規投稿');
    }

    public function getNews() {
        return view('blog/news')->withTitle('新着投稿');
    }

    public function getSearch() {
        return view('blog/search')->withTitle('投稿検索');
    }

    public function postPosts() {
        $input = Input::only('user_id', 'title', 'body');
        $validator = Validator::make($input, [
                    'title' => 'required',
                    'body' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        $post = post::create([
                    'user_id' => $input['user_id'],
                    'title' => $input['title'],
                    'body' => $input['body'],
        ]);
        $post->save();
        Session::flash('info', '投稿を保存しました');
        return view('blog.article')->withTitle('新規投稿');
    }
}
