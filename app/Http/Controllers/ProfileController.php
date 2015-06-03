<?php

namespace App\Http\Controllers;


class ProfileController extends Controller {

    /**
     * Get(ページ移行系)
     * 
     */
    //新規投稿ページ移行
    public function getProfile($id) {
        $title= 'プロフィール';
        return view('profile/profile',[
            'title' =>$title,
        ]);
    }

}
