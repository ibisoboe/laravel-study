<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Redirect;
use Session;
use Input;
use Validator;
use File;
use App\Post;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    /**
     * Get(ページ移行系)
     * 
     */
    //新規投稿ページ移行
    public function getProfile($id)
    {
        $profile = Profile::where('user_id', '=', "$id")->first();
        $title   = 'プロフィール';
        $user    = User::find($id);
        return view('profile/profile', [
            'title'   => $title,
            'profile' => $profile,
            'user'    => $user,
        ]);
    }

    public function postProfile($id)
    {
        
    }

    public function postUpload($id)
    {
        //imageの取得
        $image     = Input::file('image');
        //バリデータ
        $validator = Validator::make(Input::all(), [
            'image' => 'required|image'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }

        //格納先のpath
        $path = public_path("img/$id");

        //ファイル名の拡張子取得
        $fileexe = File::extension($image->getClientOriginalName());
        //ファイル名用のランダム文字列
        $newname = str_random() . '.' . $fileexe;
        //ファイルの移動及びリネーム
        $image->move($path, $newname);

        $profile = Profile::where('user_id', '=', "$id")->first();
        //DB格納処理
        if (is_null($profile)) {
            //profilesテーブルに該当ユーザのid(レコード)がない場合
            Profile::create([
                'user_id'    => $id,
                'image_path' => "img/{$id}/{$newname}"
            ]);
            //レコードはあるが、image_pathがnullなどの場合
        } else {
            $oldprofile             = Profile::find($id);
            $oldprofile->image_path = "img/{$id}/{$newname}";
            $oldprofile->save();
        }
        Session::flash('info', '終わり');
        return Redirect::back();
    }

}
