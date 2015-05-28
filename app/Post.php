<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';

    /**
     * 複数代入を行う属性
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'body'];

    }

