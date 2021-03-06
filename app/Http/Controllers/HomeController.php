<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;

class HomeController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | ホームコントローラー
      |--------------------------------------------------------------------------
      |
      | このコントローラーは認証済みのユーザーのアプリケーション
      | 「ダッシュボード」をレンダーします。もちろん、希望に合わせ
      | コントローラーを変更したり削除したりしてください。ここからappがスタートします！
      |
     */

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * アプリケーションのダッシュボードをユーザーへ表示
     *
     * @return Response
     */

    /**
      public function index() {
      return view('home');
      }

      }

     */
    public function index() {
        $title = 'ブロつく';
        $posts = Post::where('user_id',Auth::user()->id)->orderby('created_at', 'DESC')->take(10)->get();
        return view('userhome', [
            'title' => $title,
            'posts' => $posts,
        ]);
    }
}
