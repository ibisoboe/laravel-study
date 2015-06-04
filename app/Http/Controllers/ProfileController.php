<?php

namespace App\Http\Controllers;

use App\Profile;

class ProfileController extends Controller {

    /**
     * Get(ページ移行系)
     * 
     */
    //新規投稿ページ移行
    public function getProfile($id) {
        $profile = Profile::where('user_id', '=', "$id")->get();
        $title = 'プロフィール';
        return view('profile/profile', [
            'title' => $title,
            'profile' => $profile,
        ]);
    }

}
