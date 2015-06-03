<?php

namespace App\Http\Controllers;

use Redirect;
use Session;
use Input;
use Validator;
use App\Post;
use App\User;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class BlogController extends Controller {

    /**
     * Get(ページ移行系)
     * 
     */
    //新規投稿ページ移行
    public function getCreate() {
        return view('blog/create')->withTitle('新規投稿');
    }

    //新着投稿一覧ページ移行
    public function getNews() {
        $title = '新着投稿一覧';
        $posts = Post::where('user_id', '<>', [Auth::user()->id])->orderby('updated_at', 'DESC')->take(10)->get();
        return view('blog/news', [
            'title' => $title,
            'posts' => $posts,
        ]);
    }

    //記事表示ページ移行
    public function getArticle($id) {
        $title = '投稿記事';
        $post = Post::findorfail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('blog/article', [
            'title' => $title,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    //投稿検索ページ移行
    public function getSearch() {
        return view('blog/search')->withTitle('投稿検索');
    }

    //投稿編集ページ移行
    public function getEdit($id) {
        $title = '記事編集';
        $post = Post::findorFail($id);
        return view('blog/edit', [
            'title' => $title,
            'post' => $post,
        ]);
    }

    /**
     * POST・PUT(処理系)
     * 
     */
    //新規投稿処理
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
        return redirect('home');
    }

    //コメント投稿処理
    public function postComment($id) {
        $input = Input::only('name', 'comment');
        $validator = Validator::make($input, [
                    'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        $post = Comment::create([
                    'post_id' => $id,
                    'name' => $input['name'],
                    'comment' => $input['comment'],
        ]);
        $post->save();
        Session::flash('info', 'コメントを保存しました');
        return redirect("blog/article/{$id}");
    }

    //編集更新処理
    public function putEdit(Request $request) {
        $input = $request->only(['id', 'title', 'body']);
        $validator = Validator::make($input, [
                    'title' => 'required',
                    'body' => 'required',
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        $oldpost = Post::find($id = $input['id']);
        $oldpost->title = $input['title'];
        $oldpost->body = $input['body'];
        $oldpost->save();
        Session::flash('info', '編集を保存しました');
        return redirect('home');
    }

}
