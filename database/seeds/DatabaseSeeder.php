<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use App\Comment;

class DatabaseSeeder extends Seeder {

    /**
     * データベース初期値設定実行
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        $this->call('UserTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('CommentTableSeeder');
    }

}

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->truncate();
        User::create([
            'name' => 'test1',
            'email' => 'test1@h2system.jp',
            'password' => Hash::make('h2system'),
        ]);
        User::create([
            'name' => 'test2',
            'email' => 'test2@h2system.jp',
            'password' => Hash::make('h2system'),
        ]);
    }

}

class PostTableSeeder extends Seeder {

    public function run() {
        DB::table('posts')->truncate();
        Post::create([
            'user_id' => '1',
            'title' => 'テストタイトル1',
            'body' => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '1',
            'title' => 'テストタイトル2',
            'body' => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '2',
            'title' => 'テストタイトル3',
            'body' => 'テスト本文',
        ]);
        Post::create([
            'user_id' => '2',
            'title' => 'テストタイトル4',
            'body' => 'テスト本文',
        ]);
    }

}

class CommentTableSeeder extends Seeder {

    public function run() {
        DB::table('comments')->truncate();
        Comment::create([
            'post_id' => '1',
            'name' => 'test2',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '1',
            'name' => 'test1',
            'comment' => 'コメントテスト2',
        ]);
        Comment::create([
            'post_id' => '2',
            'name' => 'test2',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '2',
            'name' => 'test1',
            'comment' => 'コメントテスト2',
        ]);
        Comment::create([
            'post_id' => '3',
            'name' => 'test1',
            'comment' => 'コメントテスト1',
        ]);
        Comment::create([
            'post_id' => '3',
            'name' => 'test2',
            'comment' => 'コメントテスト2',
        ]);
    }

}
