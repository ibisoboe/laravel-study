<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;

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
        $image     = Input::file('image');
        $validator = Validator::make(Input::all(), [
            'image' => 'required|image'
        ]);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator->errors());
        }
        $user = Auth::user();
        $path = public_path("img/{$id}");
        $filename = getHash($image->getClientOriginalName());
        
        $image->move($path, $image->getClientOriginalName());

        App\Profile::create(['user_id' => $id, 'image_path' => "img/{$user->id}/{$image->getClientOriginalName()}"]);

        Session::flash('info', '終わり');
        return Redirect::back();
    }

}
