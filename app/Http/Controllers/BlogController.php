<?php

namespace App\Http\Controllers;

use Redirect;
use Session;
use Input;
use Validator;
use App\Post;
use Auth;

class BlogController extends Controller {

    public function getCreate() {
        return view('blog/create')->withTitle('新規投稿');
    }

    public function getNews() {
        $title = '新着投稿';
        $posts = Post::whereNotIn('user_id', [Auth::user()->id])->orderby('created_at', 'DESC')->take(10)->get();
        return view('blog/news', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function getArticle($id) {
        $title = '投稿記事';
        $posts = Post::where('id', $id);
        return view('blog/article', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

    public function getSearch() {
        return view('blog/search')->withTitle('投稿検索');
    }

    public function postCreate() {
        $input = Input::only('user_id', 'title', 'body');
        $validator = Validator::make($input, [
                    'title' => 'required',
                    'body' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        $post = Post::create([
                    'user_id' => $input['user_id'],
                    'title' => $input['title'],
                    'body' => $input['body'],
        ]);
        $post->save();
        Session::flash('info', '投稿を保存しました');

        $title = 'ブロつく';
        $posts = Post::where('user_id', [Auth::user()->id])->orderby('created_at', 'DESC')->take(10)->get();
        return view('userhome', [
            'title' => $title,
            'posts' => $posts
        ]);
    }

}
