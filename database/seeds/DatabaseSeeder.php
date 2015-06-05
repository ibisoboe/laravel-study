<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Comment;
use App\Profile;

class DatabaseSeeder extends Seeder
{

    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('CommentTableSeeder');
        $this->call('ProfileTableSeeder');
    }

}

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();
        User::create([
            'name'     => 'test1',
            'email'    => 'test1@h2system.jp',
            'password' => Hash::make('h2system'),
        ]);
        User::create([
            'name'     => '織田信長',
            'email'    => 'test2@h2system.jp',
            'password' => Hash::make('h2system'),
        ]);
    }

}

class PostTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('posts')->truncate();
        Post::create([
            'user_id' => '1',
            'title'   => 'テストタイトル1',
            'body'    => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '1',
            'title'   => 'テストタイトル2',
            'body'    => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '2',
            'title'   => 'テストタイトル3',
            'body'    => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '2',
            'title'   => 'テストタイトル4',
            'body'    => 'テスト本文',
        ]);
    }

}

class CommentTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('comments')->truncate();
        Comment::create([
            'post_id' => '1',
            'name'    => 'test2',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '1',
            'name'    => 'test1',
            'comment' => 'コメントテスト2',
        ]);
        Comment::create([
            'post_id' => '2',
            'name'    => 'test2',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '2',
            'name'    => 'test1',
            'comment' => 'コメントテスト2',
        ]);
        Comment::create([
            'post_id' => '3',
            'name'    => 'test1',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '3',
            'name'    => 'test2',
            'comment' => 'コメントテスト2',
        ]);
    }

}

class ProfileTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('profiles')->truncate();
        Profile::create([
            'user_id'        => '1',
            'profile'        => 'はじめましてーーーー'
            . 'はじめましたーーーー',
            'familyname'     => '福岡',
            'firstname'      => '太郎',
            'birthday'       => '19900101',
            'gender'         => '0',
            'street_address' => '福岡県福岡市○○',
        ]);
        Profile::create([
            'user_id'        => '2',
            'image_path'     => 'img/2/odanobunaga.jpg',
            'profile'        => 'いつの時代も変わり者が世の中を変える。異端者を受け入れる器量が武将には必要である。',
            'familyname'     => '織田',
            'firstname'      => '信長',
            'birthday'       => '15340512',
            'gender'         => '0',
            'street_address' => '尾張国愛知郡那古野（現愛知県名古屋市中区）',
        ]);
    }

}
